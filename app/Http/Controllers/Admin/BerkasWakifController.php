<?php

namespace App\Http\Controllers\Admin;

use App\Agama;
use App\BerkasWakif;
use App\Desa;
use App\DesStatusBerkas;
use App\Http\Controllers\Controller;
use App\Nadzir;
use App\PendidikanTerakhir;
use App\Saksi;
use App\Status;
use Illuminate\Http\Request;

class BerkasWakifController extends Controller
{
    /**
     * Melihat Data Berkas Wakif Berdasarkan ID
     * 
     */
    public function show(BerkasWakif $berkasWakif)
    {
        $status = Status::all();
        $desStatus = DesStatusBerkas::select('ket_review_data', 'tgl_survey', 'ket_survey', 'tgl_ikrar', 'ket_ikrar', 'ket_akta_ikrar', 'ket_ditolak')->where('id_berkas_wakif', $berkasWakif->id)->where('ket_ditolak', null)->first();
        
        return view('admin.detail-berkas-wakif', compact('berkasWakif', 'status', 'desStatus'));
    }

    public function edit(BerkasWakif $berkasWakif)
    {
        return view('admin.edit-berkas-wakif', [
            'berkasWakif' => $berkasWakif,
            'agama' => Agama::all(),
            'pendidikanTerakhir' => PendidikanTerakhir::all(),
            'desa' => Desa::all()
        ]);
    }

    public function update(Request $request, BerkasWakif $berkasWakif)
    {
        $this->validator($request);

        // SIMPAN DATA
        $berkasWakif->update((array) $request->all());

        return redirect()->route('admin.berkas-wakif.edit', $berkasWakif->id)->withSuccess('Berhasil Disimpan !');
    }

    public function getSaksi(Request $request)
    {
        $data = Saksi::where('nik', 'like', '%' . ($request->get('q') ?? '') . '%')
                        ->orWhere('nama', 'like', '%' . ($request->get('q') ?? '') . '%');

        return response()->json($data->limit(10)->get());
    }

    public function getNadzir(Request $request)
    {
        $data = Nadzir::where('nik', 'like', '%' . ($request->get('q') ?? '') . '%')
                        ->orWhere('nama', 'like', '%' . ($request->get('q') ?? '') . '%');

        return response()->json($data->limit(10)->get());
    }

    public function validator(Request $request)
    {
        $validate = [
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
        
        // UNTUK VALIDASI FORMULIR 
        return $this->validate($request, $validate);
    }
}
