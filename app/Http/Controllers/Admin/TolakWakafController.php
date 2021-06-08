<?php

namespace App\Http\Controllers\Admin;

use App\BerkasWakif;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TolakWakafController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = BerkasWakif::where('id_status', 5)->latest()->get();
            
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
        return view('admin.pengajuan-ditolak.index');
    }
}
