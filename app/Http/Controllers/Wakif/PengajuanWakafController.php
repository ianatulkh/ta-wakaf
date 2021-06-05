<?php

namespace App\Http\Controllers\Wakif;

use App\Agama;
use App\BerkasWakif;
use App\Desa;
use App\DesStatusBerkas;
use App\Http\Controllers\Controller;
use App\Nadzir;
use App\PendidikanTerakhir;
use App\Status;
use App\Traits\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengajuanWakafController extends Controller
{
    use UploadFile;
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = BerkasWakif::latest()->get();

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

        // // UPLOAD FILE
        $sertifikat_tanah = $this->uploadFileDisk($request, 'public', 'sertifikat_tanah', 'berkas/sertifikat_tanah');
        $surat_ukur = $this->uploadFileDisk($request, 'public', 'surat_ukur', 'berkas/surat_ukur');
        $sktts = $this->uploadFileDisk($request, 'public', 'sktts', 'berkas/sktts');
        $sppt = $this->uploadFileDisk($request, 'public', 'sppt', 'berkas/sppt');
        $arrayKtp = $this->multipleUploadFileDisk($request, 'public', 'nadzir.*.ktp', 'berkas/ktp_nadzir');

        // // SIMPAN DATA
        $berkasWakif = BerkasWakif::create([
            'id_wakif' => auth()->user()->wakif->id,
            'sertifikat_tanah' => $sertifikat_tanah,
            'surat_ukur' => $surat_ukur,
            'sktts' => $sktts,
            'sppt' => $sppt,
            'id_status' => 1,    
        ]);

        $requestNadzir = (array) $request->nadzir;

        for($i = 1; $i <= 5; $i++){
            $requestNadzir[$i]['id_berkas_wakif'] = $berkasWakif->id;
            $requestNadzir[$i]['ktp'] = $arrayKtp[$i-1];
        }

        Nadzir::insert($requestNadzir);
        return redirect()->route('wakif.pengajuan-wakaf.index')->withSuccess('berhasil disimpan!');
    }

    public function show(Request $request, BerkasWakif $berkasWakif)
    {
        if ($request->ajax()) {
            $data = Nadzir::where('id_berkas_wakif', $berkasWakif->id)->latest()->get();

            return datatables()::of($data)
                    ->addIndexColumn()
                    ->editColumn('ttl', function($data) {
                        return $data->tempat_lahir . ', ' . $data->tanggal_lahir;
                    })
                    ->editColumn('pendidikan', function($data) {
                        return $data->pendidikanTerakhir->tingkat;
                    })
                    ->editColumn('desa', function($data) {
                        return $data->desa->nama;
                    })
                    ->make(true);
        }

        return view('wakif.pengajuan-anda.detail', [
            'berkasWakif' => $berkasWakif,
            'status' => Status::all(),
            'desStatus' => DesStatusBerkas::select('ket_review_data', 'tgl_survey', 'tgl_ikrar', 'ket_akta_ikrar', 'ket_ditolak')->where('id_berkas_wakif', $berkasWakif->id)->first(),
        ]);
    }

    public function edit(BerkasWakif $berkasWakif)
    {
        return view('wakif.pengajuan-anda.edit', [
            'berkasWakif' => $berkasWakif,
            'nadzir0' => $berkasWakif->nadzir[0],
            'nadzir1' => $berkasWakif->nadzir[1],
            'nadzir2' => $berkasWakif->nadzir[2],
            'nadzir3' => $berkasWakif->nadzir[3],
            'nadzir4' => $berkasWakif->nadzir[4],
            'agama' => Agama::all(),
            'pendidikanTerakhir' => PendidikanTerakhir::all(),
            'desa' => Desa::all()
        ]);
    }

    public function update(Request $request, BerkasWakif $berkasWakif)
    {
        $this->validator($request);

        $data = (object) $request->all();
        
        // // UPLOAD FILE
        $data->sertifikat_tanah = $this->uploadFileDisk($request, 'public', 'sertifikat_tanah', 'berkas/sertifikat_tanah');
        $data->surat_ukur = $this->uploadFileDisk($request, 'public', 'surat_ukur', 'berkas/surat_ukur');
        $data->sktts = $this->uploadFileDisk($request, 'public', 'sktts', 'berkas/sktts');
        $data->sppt = $this->uploadFileDisk($request, 'public', 'sppt', 'berkas/sppt');
        // $arrayKtp = $this->multipleUploadFileDisk($request, 'public', 'nadzir.*.ktp', 'berkas/ktp_nadzir');

        $data = $this->filteredNull($data);
        
        // // SIMPAN DATA
        $berkasWakif->update((array) $data);

        $num = 0;
        foreach($data->nadzir as $item){
            if($item['ktp'] ?? false){
                $this->removeFileDisk('public', 'berkas/ktp_nadzir', $berkasWakif->nadzir[$num]->ktp);

                $fileName = Storage::disk('public')->put(
                    'berkas/ktp_nadzir', $item['ktp']
                );

                $data->nadzir[$num+1]['ktp'] = basename($fileName);
            }
            
            $num++;
        }

        $num = 1;
        foreach(Nadzir::where('id_berkas_wakif', $berkasWakif->id)->get() as $item){
            $item->update($data->nadzir[$num]);
            $num++;
        }

        return redirect()->route('wakif.pengajuan-wakaf.index')->withSuccess('berhasil disimpan!');
    }

    public function destroy(BerkasWakif $berkasWakif)
    {
        $nadzir = Nadzir::where('id_berkas_wakif', $berkasWakif->id);
        
        $arrayKtp = [];
        foreach($nadzir->get() as $item){ 
            $arrayKtp[] = $item->ktp; 
        }

        $this->removeFileDisk('public', 'berkas/sertifikat_tanah/', $berkasWakif->sertifikat_tanah);
        $this->removeFileDisk('public', 'berkas/surat_ukur/', $berkasWakif->surat_ukur);
        $this->removeFileDisk('public', 'berkas/sktts/', $berkasWakif->sktts);
        $this->removeFileDisk('public', 'berkas/sppt/', $berkasWakif->sppt);
        $this->multipleRemoveFileDisk('public', 'berkas/ktp_nadzir/', $arrayKtp);

        //HAPUS DATA NADZIR
        $nadzir->delete();

        //HAPUS DATA Des Status Berkas
        $berkasWakif->desStatusBerkas->delete();

        //HAPUS DATA BERKAS WAKIF
        $berkasWakif->delete();

        // TAMPILKAN PESAN BERHASIL
        return true;
    }

    public function validator(Request $request)
    {
        $validate = [
            'sertifikat_tanah'       => ['required', 'max:1024', 'mimes:pdf,png,jpg,jpeg,gif'],
            'surat_ukur'             => ['required', 'max:1024', 'mimes:pdf,png,jpg,jpeg,gif'],
            'sktts'                  => ['required', 'max:1024', 'mimes:pdf,png,jpg,jpeg,gif'],
            'sppt'                   => ['required', 'max:1024', 'mimes:pdf,png,jpg,jpeg,gif'],

            'nadzir.*.nama'                   => ['required', 'string', 'max:40', 'min:3'],
            'nadzir.*.nik'                    => ['required', 'numeric', 'digits:16'],
            'nadzir.*.tempat_lahir'           => ['required', 'string', 'max:35', 'min:3'],
            'nadzir.*.tanggal_lahir'          => ['required', 'date'],
            'nadzir.*.id_agama'               => ['required', 'numeric', 'digits:1'],
            'nadzir.*.id_pendidikan_terakhir' => ['required', 'numeric', 'digits_between:1,2'],
            'nadzir.*.pekerjaan'              => ['required', 'string', 'max:50', 'min:3'],
            'nadzir.*.kewarganegaraan'        => ['required', 'string', 'max:50', 'min:3'],
            'nadzir.*.rt'                     => ['required', 'numeric', 'digits:3'],
            'nadzir.*.rw'                     => ['required', 'numeric', 'digits:3'],
            'nadzir.*.id_desa'                => ['required', 'numeric', 'digits:10'],
            'nadzir.*.ktp'                    => ['required', 'max:1024', 'mimes:png,jpg,jpeg,gif'],
        ];

        if (in_array($request->method(), ['PUT', 'PATCH'])) {
            $validate['sertifikat_tanah']       = ['nullable', 'max:1024', 'mimes:pdf,png,jpg,jpeg,gif'];
            $validate['surat_ukur']             = ['nullable', 'max:1024', 'mimes:pdf,png,jpg,jpeg,gif'];
            $validate['sktts']                  = ['nullable', 'max:1024', 'mimes:pdf,png,jpg,jpeg,gif'];
            $validate['sppt']                   = ['nullable', 'max:1024', 'mimes:pdf,png,jpg,jpeg,gif'];
            $validate['nadzir.*.ktp']           = ['nullable', 'max:1024', 'mimes:png,jpg,jpeg,gif'];
        }
        
        // UNTUK VALIDASI FORMULIR 
        return $this->validate($request, $validate);
    }

    function filteredNull($data, $except = [])
    {
        foreach ($data as $key => $item) {
            if (empty($item)){
                if ($except){
                    if (in_array($key, $except) == null){
                        unset($data->$key);
                    }
                }else {
                    unset($data->$key);
                }
            }
        }

        return $data;
    }
}
