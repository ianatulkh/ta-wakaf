<?php

namespace App\Http\Controllers\Admin;

use App\Agama;
use App\Desa;
use App\Http\Controllers\Controller;
use App\PendidikanTerakhir;
use App\Wakif;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class WakifController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Wakif::latest()->get();
            return Datatables::of($data)
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
                            'countBerkas' => count($data->berkasWakif)
                        ];
                    })
                    ->make(true);
        }

        return view('admin.data-wakif.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Wakif $wakif)
    {
        //
    }

    public function edit(Wakif $wakif)
    {
        return view('admin.data-wakif.edit', [
            'wakif' => $wakif,
            'agama' => Agama::all(),
            'pendidikanTerakhir' => PendidikanTerakhir::all(),
            'desa' => Desa::all()
        ]);
    }

    public function update(Request $request, Wakif $wakif)
    {
        $this->validator($request, $wakif);

        $wakif->user->update([
            'nama'                   => $request->name,
            'email'                  => $request->email
        ]);
    
        $wakif->update([
            'nama'                   => $request->name,
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
            'id_desa'                => $request->id_desa
        ]);

        return redirect()->back()->withSuccess('berhasil disimpan!');
    }

    public function destroy(Wakif $wakif)
    {
        return Wakif::destroy($wakif->id);
    }

    private function validator($request, $wakif)
    {
        return $request->validate([
            'nik'                    => ['required', 'numeric', 'digits:16', 'unique:wakif,nik,'.$wakif->id],
            'tempat_lahir'           => ['required', 'string', 'max:35', 'min:3'],
            'tanggal_lahir'          => ['required', 'date'],
            'id_agama'               => ['required', 'numeric', 'digits:1'],
            'id_pendidikan_terakhir' => ['required', 'numeric', 'digits_between:1,2'],
            'pekerjaan'              => ['required', 'string', 'max:50', 'min:3'],
            'kewarganegaraan'        => ['required', 'string', 'max:50', 'min:3'],
            'alamat_singkat'         => ['required', 'string', 'max:100', 'min:5'],
            'rt'                     => ['required', 'numeric', 'digits:3'],
            'rw'                     => ['required', 'numeric', 'digits:3'],
            'id_desa'                => ['required', 'numeric', 'digits:10'],
            'name'                   => ['required', 'string', 'max:40', 'min:3'],
            'email'                  => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$wakif->id_user],
        ]);
    }
}
