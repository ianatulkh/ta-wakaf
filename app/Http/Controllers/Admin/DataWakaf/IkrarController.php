<?php

namespace App\Http\Controllers\Admin\DataWakaf;

use App\BerkasWakif;
use App\DesStatusBerkas;
use App\Http\Controllers\Controller;
use App\Notifications\SendAfterIkrarMessage;
use App\Notifications\SendIkrarDate;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class IkrarController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = BerkasWakif::where('id_status', 3)->oldest('updated_at')->get();
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
                        return date_format($data->updated_at, 'd-m-Y H:i');
                    })
                    ->editColumn('tgl_ikrar', function($data) {
                        $desStatusBerkas = DesStatusBerkas::where('id_berkas_wakif', $data->id)->where('ket_ditolak', null)->first();
                        return [
                            'id' => $data->id,
                            'tgl_ikrar' => $desStatusBerkas->tgl_ikrar ? date('d-m-Y H:i', strtotime($desStatusBerkas->tgl_ikrar)):null
                        ];
                    })
                    ->editColumn('ket_ikrar', function($data) {
                        $desStatusBerkas = DesStatusBerkas::where('id_berkas_wakif', $data->id)->where('ket_ditolak', null)->first();
                        return [
                            'id' => $data->id,
                            'tgl_ikrar' => $desStatusBerkas->tgl_ikrar,
                            'ket_ikrar' => $desStatusBerkas->ket_ikrar
                        ];
                    })
                    ->editColumn('action', function($data) {
                        return $data->id;
                    })
                    ->make(true);
        }
        
        return view('admin.data-wakaf.ikrar');
    }

    public function update(Request $request, BerkasWakif $berkasWakif)
    {
        $request->validate( ['type' => ['required'] ]);
        $desStatusBerkas = DesStatusBerkas::where('id_berkas_wakif', $berkasWakif->id)->where('ket_ditolak', null)->first();

        if($request->type == 'tgl_ikrar'){
            // VALIDASI FORM
            $request->validate([
                'date_tgl_ikrar' => ['required', 'date'],
                'time_tgl_ikrar' => ['required', 'date_format:H:i']
            ]);

            $dateTimeF = date('Y-m-d H:i:s', strtotime("$request->date_tgl_ikrar $request->time_tgl_ikrar"));

            // ARRAY UNTUK SIMPAN TANGGAL STATUS
            $desStatus = ['tgl_ikrar' => $dateTimeF];
            $desStatusBerkas->update($desStatus);

            // SEND EMAIL
            User::find($berkasWakif->wakif->id_user)->notify(new SendIkrarDate($berkasWakif, $dateTimeF));

            return redirect()->back()->withSuccess('Berhasil Disimpan !');
        }

        // VALIDASI FORM
        $request->validate([
            'id_status' => ['required', 'digits:1'],
            'pesan' => ['required', 'min:10']
        ]);

        // ARRAY UNTUK SIMPAN KETERANGAN STATUS
        $desStatus = ['ket_ikrar' => $request->pesan];
         
        $berkasWakif->update($request->all());
        $desStatusBerkas->update($desStatus);

        // SEND EMAIL
        User::find($berkasWakif->wakif->id_user)->notify(new SendAfterIkrarMessage($berkasWakif, $request->pesan));

        return redirect()->route('admin.akta-ikrar.index')->withSuccess('Berhasil Disimpan !');
    }
}
