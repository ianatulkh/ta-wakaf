<?php

namespace App\Http\Controllers\Admin;

use App\BerkasWakif;
use App\DesStatusBerkas;
use App\Http\Controllers\Controller;
use App\Nadzir;
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
}
