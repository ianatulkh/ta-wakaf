<?php

namespace App\Http\Controllers\Wakif;

use App\Agama;
use App\BerkasWakif;
use App\Desa;
use App\DesStatusBerkas;
use App\Http\Controllers\Controller;
use App\Nadzir;
use App\Notifications\SendNewRegistToAdmin;
use App\PendidikanTerakhir;
use App\Status;
use App\Traits\UploadFile;
use App\User;
use Illuminate\Http\Request;

class PengajuanWakafController extends Controller
{
    use UploadFile;
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = BerkasWakif::where('id_wakif', auth()->user()->wakif->id)->latest()->get();

            return datatables()::of($data)
                    ->addIndexColumn()
                    ->editColumn('created_at', function($data) {
                        return $data->created_at->diffForHumans();
                    })
                    ->editColumn('id_status', function($data) {
                        return $data->status->status;
                    })
                    ->editColumn('action', function($data) {
                        return [
                            'id' => $data->id,
                            'id_status' => $data->id_status
                        ];
                    })
                    ->make(true);
        }

        return view('wakif.pengajuan-anda.index');
    }

    public function create()
    {
        return view('wakif.ajukan-wakaf.create', [
            'pendidikanTerakhir' => PendidikanTerakhir::all(),
            'agama' => Agama::all(),
            'desa' => Desa::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->validator($request);
        $newRequest = (object) $request->all();

        $newRequest->id_wakif            = auth()->user()->wakif->id;
        $newRequest->sertifikat_tanah    = $this->uploadFileDisk($request, 'public', 'sertifikat_tanah', 'berkas/sertifikat_tanah/');
        $newRequest->sktts               = $this->uploadFileDisk($request, 'public', 'sktts', 'berkas/sktts/');
        $newRequest->sppt                = $this->uploadFileDisk($request, 'public', 'sppt', 'berkas/sppt/');

        // SIMPAN DATA
        BerkasWakif::create((array) $newRequest);

        // SEND EMAIL KE ADMIN MENGENAI PENGAJUAN BARU
        User::where('id_role', 1)->first()->notify(new SendNewRegistToAdmin);

        return redirect()->route('wakif.pengajuan-wakaf.index')->withSuccess('Berhasil Disimpan !');
    }

    public function show(BerkasWakif $berkasWakif)
    {
        return view('wakif.pengajuan-anda.detail', [
            'berkasWakif' => $berkasWakif,
            'status' => Status::all(),
            'desStatus' => DesStatusBerkas::select('ket_review_data', 'ket_survey', 'ket_ikrar', 'ket_akta_ikrar', 'ket_ditolak')->where('id_berkas_wakif', $berkasWakif->id)->where('ket_ditolak', null)->first(),
        ]);
    }

    public function edit(BerkasWakif $berkasWakif)
    {
        return view('wakif.pengajuan-anda.edit', [
            'berkasWakif' => $berkasWakif,
            'agama' => Agama::all(),
            'pendidikanTerakhir' => PendidikanTerakhir::all(),
            'desa' => Desa::all()
        ]);
    }

    public function update(Request $request, BerkasWakif $berkasWakif)
    {
        $this->validator($request);

        $newRequest = (object) $request->all();
        
        // UPLOAD FILE
        $newRequest->sertifikat_tanah = $this->uploadFileDisk($request, 'public', 'sertifikat_tanah', 'berkas/sertifikat_tanah/', $berkasWakif->sertifikat_tanah);
        $newRequest->sktts = $this->uploadFileDisk($request, 'public', 'sktts', 'berkas/sktts/', $berkasWakif->sktts);
        $newRequest->sppt = $this->uploadFileDisk($request, 'public', 'sppt', 'berkas/sppt/', $berkasWakif->sppt);

        $newRequest = $this->filteredNull($newRequest);
        $newRequest->id_status = 1;
        
        // SIMPAN DATA
        $berkasWakif->update((array) $newRequest);

        return redirect()->route('wakif.pengajuan-wakaf.index')->withSuccess('Berhasil Disimpan !');
    }

    public function destroy(BerkasWakif $berkasWakif)
    {
        $this->removeFileDisk('public', 'berkas/sertifikat_tanah/', $berkasWakif->sertifikat_tanah);
        $this->removeFileDisk('public', 'berkas/sktts/', $berkasWakif->sktts);
        $this->removeFileDisk('public', 'berkas/sppt/', $berkasWakif->sppt);

        //HAPUS DATA BERKAS WAKIF
        DesStatusBerkas::where('id_berkas_wakif', $berkasWakif->id)->delete();
        $berkasWakif->delete();

        // TAMPILKAN PESAN BERHASIL
        return true;
    }

    public function validator(Request $request)
    {
        $validate = [
            'sertifikat_tanah'       => ['required', 'max:10000', 'mimes:pdf'],
            'sktts'                  => ['required', 'max:5000', 'mimes:png,jpg,jpeg'],
            'sppt'                   => ['required', 'max:5000', 'mimes:png,jpg,jpeg'],

            'status_hak_nomor'                => ['required', 'min:5', 'max:50'],
            'atas_hak_nomor'                  => ['required', 'min:15', 'max:50'],
            'atas_hak_nomor'                  => ['required', 'min:5', 'max:50'],
            'atas_hak_lain'                   => ['nullable', 'min:3', 'max:50'],
            'batas_timur'                     => ['required', 'min:3', 'max:50'],
            'batas_barat'                     => ['required', 'min:3', 'max:50'],
            'batas_utara'                     => ['required', 'min:3', 'max:50'],
            'batas_selatan'                   => ['required', 'min:3', 'max:50'],
            'id_desa'                         => ['required', 'numeric', 'digits:10'],
            'rt'                              => ['required', 'numeric', 'digits:3'],
            'rw'                              => ['required', 'numeric', 'digits:3'],
            'nama_pewasiat'                   => ['nullable', 'string', 'max:40', 'min:3', 'regex:/^[a-zA-ZÑñ\s]+$/'],
            'tahun_diwakafkan'                => ['nullable', 'numeric', 'digits:4', 'min:1950', 'max:'.(date('Y'))],
            'keperluan'                       => ['required', 'min:10', 'max:100'],
        ];

        if($request->nama_pewasiat != null){
            $validate['tahun_diwakafkan']       = ['required', 'numeric', 'digits:4', 'min:1950', 'max:'.(date('Y'))];
        } 

        if($request->tahun_diwakafkan != null){
            $validate['nama_pewasiat']          = ['required', 'string', 'max:40', 'min:3', 'regex:/^[a-zA-ZÑñ\s]+$/'];
        } 

        if (in_array($request->method(), ['PUT', 'PATCH'])) {
            $validate['sertifikat_tanah']       = ['nullable', 'max:10000', 'mimes:pdf'];
            $validate['sktts']                  = ['nullable', 'max:5000', 'mimes:png,jpg,jpeg'];
            $validate['sppt']                   = ['nullable', 'max:5000', 'mimes:png,jpg,jpeg'];
        }
        
        // UNTUK VALIDASI FORMULIR 
        return $this->validate($request, $validate);
    }
}
