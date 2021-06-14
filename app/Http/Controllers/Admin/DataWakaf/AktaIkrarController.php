<?php

namespace App\Http\Controllers\Admin\DataWakaf;

use App\Agama;
use App\BerkasWakif;
use App\Desa;
use App\DesStatusBerkas;
use App\Http\Controllers\Controller;
use App\PendidikanTerakhir;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AktaIkrarController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = BerkasWakif::where('id_status', 4)->oldest('updated_at')->get();
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('nama', function($data) {
                        return $data->wakif->nama;
                    })
                    ->editColumn('nik', function($data) {
                        return $data->wakif->nik;
                    })
                    ->editColumn('desa', function($data) {
                        return $data->wakif->desa->nama;
                    })
                    ->editColumn('updated_at', function($data) {
                        return date_format($data->updated_at, 'd-m-Y H:m');
                    })
                    ->editColumn('ket_akta_ikrar', function($data) {
                        $desStatusBerkas = DesStatusBerkas::where('id_berkas_wakif', $data->id)->where('ket_ditolak', null)->first();
                        return [
                            'id' => $data->id,
                            'akta_ikrar' => $data->aktaIkrar,
                            'ket_akta_ikrar' => $desStatusBerkas->ket_akta_ikrar
                        ];
                    })
                    ->editColumn('action', function($data) {
                        return $data->id;
                    })
                    ->make(true);
        }
    
        return view('admin.data-wakaf.akta-ikrar');
    }

    public function update(Request $request, BerkasWakif $berkasWakif)
    {
        $desStatusBerkas = DesStatusBerkas::where('id_berkas_wakif', $berkasWakif->id)->where('ket_ditolak', null)->first();

        // VALIDASI FORM
        $request->validate([
            'pesan' => ['required', 'min:10']
        ]);

        // ARRAY UNTUK SIMPAN KETERANGAN STATUS
        $desStatus = ['ket_akta_ikrar' => $request->pesan];
        $desStatusBerkas->update($desStatus);

        // HARUSNYA SEND EMAIL

        return redirect()->route('admin.akta-ikrar.index')->withSuccess('Berhasil Disimpan!');
    }

    public function show(BerkasWakif $berkasWakif)
    {
        return view('admin.data-wakaf.akta-ikrar-form', [
            'berkasWakif' => $berkasWakif,
            'aktaIkrar' => $berkasWakif->aktaIkrar,
            'pendidikanTerakhir' => PendidikanTerakhir::all(),
            'agama' => Agama::all(),
            'desa' => Desa::all()
        ]);
    }
}
