<?php

namespace App\Http\Controllers\Admin;

use App\Agama;
use App\Desa;
use App\Http\Controllers\Controller;
use App\PendidikanTerakhir;
use App\Saksi;
use App\Traits\UploadFile;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SaksiController extends Controller
{
    use UploadFile;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Saksi::latest()->get();
            return DataTables::of($data)
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
                    ->editColumn('action', function($data) {
                        return [
                            'id' => $data->id,
                            'countBerkasWakif' => count($data->berkasWakif)
                        ];
                    })
                    ->make(true);
        }

        return view('admin.data-saksi.index');
    }

    public function create()
    {
        return view('admin.data-saksi.create')->with([
            'agama' => Agama::all(),
            'pendidikanTerakhir' => PendidikanTerakhir::all(),
            'desa' => Desa::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->validator($request);   
    
        Saksi::create([
            'nama'                   => $request->nama,
            'nik'                    => $request->nik,
            'tempat_lahir'           => $request->tempat_lahir,
            'tanggal_lahir'          => $request->tanggal_lahir,
            'id_agama'               => $request->id_agama,
            'id_pendidikan_terakhir' => $request->id_pendidikan_terakhir,
            'pekerjaan'              => $request->pekerjaan,
            'kewarganegaraan'        => $request->kewarganegaraan,
            'alamat_singkat'         => $request->alamat_singkat,
            'rt'                     => $request->rt,
            'rw'                     => $request->rw,
            'id_desa'                => $request->id_desa,
            'ktp'                    => $this->uploadFileDisk($request, 'public', 'ktp', 'berkas/ktp_saksi/')
        ]);

        return redirect()->route('admin.data-saksi.index')->withSuccess('Berhasil Disimpan !');
    }

    public function show(Saksi $saksi)
    {
        return view('admin.data-saksi.show', [
            'saksi' => $saksi,
            'agama' => Agama::all(),
            'pendidikanTerakhir' => PendidikanTerakhir::all(),
            'desa' => Desa::all()
        ]);
    }

    public function edit(Saksi $saksi)
    {
        return view('admin.data-saksi.edit', [
            'saksi' => $saksi,
            'agama' => Agama::all(),
            'pendidikanTerakhir' => PendidikanTerakhir::all(),
            'desa' => Desa::all()
        ]);
    }

    public function update(Request $request, Saksi $saksi)
    {
        $this->validator($request, $saksi);

        $newRequest = (object) $request;

        if($request->ktp != null){
            $newRequest->ktp = $this->uploadFileDisk($request, 'public', 'ktp', 'berkas/ktp_saksi/', $saksi->ktp);
        }

        $saksi->update((array) $newRequest);

        return redirect()->back()->withSuccess('Berhasil Disimpan !');
    }

    public function destroy(Saksi $saksi)
    {
        $this->removeFileDisk('public', 'berkas/ktp_saksi/', $saksi->ktp);
        return Saksi::destroy($saksi->id);
    }

    private function validator($request, $saksi = null)
    {
        $validation = [
            'nik'                    => ['required', 'numeric', 'digits:16', 'unique:saksi,nik'],
            'tempat_lahir'           => ['required', 'string', 'max:35', 'min:3', 'regex:/^[a-zA-ZÑñ\s]+$/'],
            'tanggal_lahir'          => ['required', 'date'],
            'id_agama'               => ['required', 'numeric', 'digits:1'],
            'id_pendidikan_terakhir' => ['required', 'numeric', 'digits_between:1,2'],
            'pekerjaan'              => ['required', 'string', 'max:50', 'min:3', 'regex:/^[a-zA-ZÑñ\s]+$/'],
            'kewarganegaraan'        => ['required', 'string', 'max:50', 'min:3'],
            'rt'                     => ['required', 'numeric', 'digits:3'],
            'rw'                     => ['required', 'numeric', 'digits:3'],
            'id_desa'                => ['required', 'numeric', 'digits:10'],
            'nama'                   => ['required', 'string', 'max:40', 'min:3', 'regex:/^[a-zA-ZÑñ\s]+$/'],
            'ktp'                    => ['required', 'max:5000', 'mimes:png,jpg,jpeg'],
        ];

        if($saksi != null){
            $validation['nik']          = ['required', 'numeric', 'digits:16', 'unique:saksi,nik,'.$saksi->id];
            $validation['ktp']          = ['nullable', 'max:5000', 'mimes:png,jpg,jpeg'];
        }
        
        return $request->validate($validation, [
            'tempat_lahir.regex' => 'Isian harus berupa karakter huruf',
            'pekerjaan.regex' => 'Isian harus berupa karakter huruf',
            'nama.regex' => 'Isian harus berupa karakter huruf'
        ]);
    }
}
