<?php

namespace App\Http\Controllers\Admin;

use App\BerkasWakif;
use App\DesStatusBerkas;
use App\Http\Controllers\Controller;
use App\Wakif;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SetujuiWakafController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = BerkasWakif::where('id_status', 1)->latest()->get();
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
                    ->editColumn('action', function($data) {
                        return $data->id;
                    })
                    ->make(true);
        }
        
        return view('admin.setujui-wakaf.index');
    }

    public function show(BerkasWakif $berkasWakif)
    {
        return view('admin.setujui-wakaf.show', compact('berkasWakif'));
    }

    public function update(Request $request, BerkasWakif $berkasWakif)
    {
        // VALIDASI FORM
        $request->validate([
            'id_status' => ['required', 'digits:1'],
            'pesan' => ['required', 'min:10']
        ]);

        // ARRAY UNTUK SIMPAN KETERANGAN STATUS
        $desStatus = ['id_berkas_wakif' => $berkasWakif->id];
        $desStatus += ($request->id_status == 5) 
                    ? ['ket_ditolak' => $request->pesan] 
                    : ['ket_review_data' => $request->pesan];
         
        $berkasWakif->update($request->all());
        DesStatusBerkas::create($desStatus);

        return redirect()->route('admin.setujui-wakaf.index')->withSuccess('Berhasil Disimpan!');
    }
}
