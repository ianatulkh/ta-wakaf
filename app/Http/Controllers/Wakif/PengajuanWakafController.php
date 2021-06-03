<?php

namespace App\Http\Controllers\Wakif;

use App\Agama;
use App\BerkasWakif;
use App\Desa;
use App\Http\Controllers\Controller;
use App\Nadzir;
use App\PendidikanTerakhir;
use App\Traits\UploadFile;
use Illuminate\Http\Request;

class PengajuanWakafController extends Controller
{
    use UploadFile;
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = BerkasWakif::where('id_status', 1)->latest()->get();

            return datatables()::of($data)
                    ->addIndexColumn()
                    ->editColumn('created_at', function($data) {
                        return $data->created_at->diffForHumans();
                    })
                    ->editColumn('action', function($data) {
                        return $data->id;
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

        return view('wakif.pengajuan-anda.detail', compact('berkasWakif'));
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
        //
    }

    public function destroy(BerkasWakif $berkasWakif)
    {
        
        $nadzir = Nadzir::where('id_berkas_wakif', $berkasWakif->id);
        $arrayKtp = [];
        foreach($nadzir->get() as $item){ $arrayKtp[] = $item->ktp; }

        $this->removeFileDisk('public', 'berkas/sertifikat_tanah/', $berkasWakif->sertifikat_tanah);
        $this->removeFileDisk('public', 'berkas/surat_ukur/', $berkasWakif->surat_ukur);
        $this->removeFileDisk('public', 'berkas/sktts/', $berkasWakif->sktts);
        $this->removeFileDisk('public', 'berkas/sppt/', $berkasWakif->sppt);
        $this->multipleRemoveFileDisk('public', 'berkas/ktp_nadzir/', $arrayKtp);

        //HAPUS DATA NADZIR
        $nadzir->delete();

        //HAPUS DATA BERKAS WAKIF
        $berkasWakif->delete();

        // TAMPILKAN PESAN BERHASIL
        return true;
    }

    public function validator(Request $request)
    {
        // UNTUK VALIDASI FORMULIR 
        return $this->validate($request, [
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
        ]);
    }
}
