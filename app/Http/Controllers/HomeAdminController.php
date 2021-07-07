<?php

namespace App\Http\Controllers;

use App\BerkasWakif;
use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function index()
    {
        $butuhPersetujuan = BerkasWakif::where('id_status', 1)
                            ->count();

        $dalamProses = BerkasWakif::where('id_status', '!=', 1)
                            ->where('id_status', '!=', 5)
                            ->whereHas('desStatusBerkas', function($query){
                                $query->where('ket_review_data', '!=', null);
                                $query->where('ket_akta_ikrar', null);
                            })
                            ->count();

        $ditolak = BerkasWakif::where('id_status', 5)
                            ->count();

        $selesai = BerkasWakif::where('id_status', 4)
                            ->whereHas('desStatusBerkas', function($query){
                                $query->where('ket_akta_ikrar', '!=', null);
                            })
                            ->count();

        $pengajuanTerbaru = BerkasWakif::where('id_status', 1)
                            ->limit(6)
                            ->latest()
                            ->get();
                            
        $pengajuanDalamProses = BerkasWakif::where('id_status', '!=', 1)
                            ->where('id_status', '!=', 5)
                            ->whereHas('desStatusBerkas', function($query){
                                $query->where('ket_review_data', '!=', null);
                                $query->where('ket_akta_ikrar', null);
                            })
                            ->limit(6)
                            ->get();

        return view('admin.home', compact(
            'butuhPersetujuan',
            'dalamProses',
            'ditolak',
            'selesai',
            'pengajuanTerbaru',
            'pengajuanDalamProses'
        ));
    }
}
