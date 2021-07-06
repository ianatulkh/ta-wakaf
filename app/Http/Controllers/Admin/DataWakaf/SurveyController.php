<?php

namespace App\Http\Controllers\Admin\DataWakaf;

use App\BerkasWakif;
use App\DesStatusBerkas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SurveyController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = BerkasWakif::where('id_status', 2)->oldest('updated_at')->get();
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
                    ->editColumn('tgl_survey', function($data) {
                        $desStatusBerkas = DesStatusBerkas::where('id_berkas_wakif', $data->id)->where('ket_ditolak', null)->first();
                        return [
                            'id' => $data->id,
                            'tgl_survey' => $desStatusBerkas->tgl_survey ? date('d-m-Y H:i', strtotime($desStatusBerkas->tgl_survey)):null
                        ];
                    })
                    ->editColumn('ket_survey', function($data) {
                        $desStatusBerkas = DesStatusBerkas::where('id_berkas_wakif', $data->id)->where('ket_ditolak', null)->first();
                        return [
                            'id' => $data->id,
                            'tgl_survey' => $desStatusBerkas->tgl_survey,
                            'ket_survey' => $desStatusBerkas->ket_survey
                        ];
                    })
                    ->editColumn('action', function($data) {
                        return $data->id;
                    })
                    ->make(true);
        }
        
        return view('admin.data-wakaf.survey');
    }

    public function update(Request $request, BerkasWakif $berkasWakif)
    {
        $request->validate( ['type' => ['required'] ]);
        $desStatusBerkas = DesStatusBerkas::where('id_berkas_wakif', $berkasWakif->id)->where('ket_ditolak', null)->first();

        if($request->type == 'tgl_survey'){
            // VALIDASI FORM
            $request->validate([
                'date_tgl_survey' => ['required', 'date'],
                'time_tgl_survey' => ['required', 'date_format:H:i']
            ]);

            // ARRAY UNTUK SIMPAN TANGGAL STATUS
            $desStatus = ['tgl_survey' => date('Y-m-d H:i:s', strtotime("$request->date_tgl_survey $request->time_tgl_survey"))];
            $desStatusBerkas->update($desStatus);

            // HARUSNYA SEND EMAIL

            return redirect()->back()->withSuccess('Berhasil Disimpan!');
        }

        // VALIDASI FORM
        $request->validate([
            'id_status' => ['required', 'digits:1'],
            'pesan' => ['required', 'min:10']
        ]);

        // ARRAY UNTUK SIMPAN KETERANGAN STATUS
        $desStatus = ['ket_survey' => $request->pesan];
         
        $berkasWakif->update($request->all());
        $desStatusBerkas->update($desStatus);

        // HARUSNYA SEND EMAIL

        return redirect()->route('admin.ikrar.index')->withSuccess('Berhasil Disimpan!');
    }
}
