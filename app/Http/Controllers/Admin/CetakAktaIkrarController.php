<?php

namespace App\Http\Controllers\Admin;

use App\AktaIkrar;
use App\BerkasWakif;
use App\DesStatusBerkas;
use App\Http\Controllers\Controller;
use App\Nadzir;
use App\SaksiIkrar;
use App\Traits\UploadFile;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CetakAktaIkrarController extends Controller
{
    use UploadFile;

    public function store(Request $request)
    {
        $this->validator($request);

        // UPLOAD FILE
        $arrayKtp = $this->multipleUploadFileDisk($request, 'public', 'saksi.*.ktp', 'berkas/ktp_saksi');

        // SIMPAN DATA
        $aktaIkrar = AktaIkrar::create((array) $request->all());

        $requestSaksi = (array) $request->saksi;

        for($i = 1; $i <= 2; $i++){
            $requestSaksi[$i]['id_akta_ikrar'] = $aktaIkrar->id;
            $requestSaksi[$i]['ktp'] = $arrayKtp[$i-1];
        }

        SaksiIkrar::insert($requestSaksi);
        return redirect()->route('admin.akta-ikrar.show', $request->id_berkas_wakif)->withSuccess('berhasil disimpan!');
    }

    public function update(Request $request, AktaIkrar $aktaIkrar)
    {
        $this->validator($request);
        $data = (object) $request->all();
        $data = $this->filteredNull($data);

        // SIMPAN DATA
        $aktaIkrar->update((array) $data);

        $num = 0;
        foreach($data->saksi as $item){
            if($item['ktp'] ?? false){
                $this->removeFileDisk('public', 'berkas/ktp_saksi', $aktaIkrar->saksiIrar[$num]->ktp);

                $fileName = Storage::disk('public')->put(
                    'berkas/ktp_saksi', $item['ktp']
                );

                $data->saksi[$num+1]['ktp'] = basename($fileName);
            }
            
            $num++;
        }

        $num = 1;
        foreach(SaksiIkrar::where('id_akta_ikrar', $aktaIkrar->id)->get() as $item){
            $item->update($data->saksi[$num]);
            $num++;
        }

        return redirect()->route('admin.akta-ikrar.show', $data->id_berkas_wakif)->withSuccess('berhasil disimpan!');
    }

    public function cetak_wt1(BerkasWakif $berkasWakif)
    {
        $nadzir = Nadzir::where('jabatan', 'Ketua')->where('id_berkas_wakif', $berkasWakif->id)->first();
        $desStatusBerkasLast = DesStatusBerkas::where('ket_ditolak', null)->where('id_berkas_wakif', $berkasWakif->id)->first();

        $pdf = PDF::loadview('admin.pdf-export.akta-ikrar.dokumen-wt1', [
            'berkasWakif' => $berkasWakif,
            'nadzir' => $nadzir,
            'desStatusBerkasLast' => $desStatusBerkasLast,
            'saksi1' => $berkasWakif->aktaIkrar->saksiIrar[0],
            'saksi2' => $berkasWakif->aktaIkrar->saksiIrar[1],
        ])->setPaper('f4', 'potrait');
        
        return $pdf->download('laporan-dokumen-wt1.pdf');
    }

    public function cetak_wt2(BerkasWakif $berkasWakif)
    {
        $nadzir = Nadzir::where('jabatan', 'Ketua')->where('id_berkas_wakif', $berkasWakif->id)->first();
        $desStatusBerkasLast = DesStatusBerkas::where('ket_ditolak', null)->where('id_berkas_wakif', $berkasWakif->id)->first();

        $pdf = PDF::loadview('admin.pdf-export.akta-ikrar.dokumen-wt2', [
            'berkasWakif' => $berkasWakif,
            'nadzir' => $nadzir,
            'desStatusBerkasLast' => $desStatusBerkasLast,
            'saksi1' => $berkasWakif->aktaIkrar->saksiIrar[0],
            'saksi2' => $berkasWakif->aktaIkrar->saksiIrar[1],
        ])->setPaper('f4', 'potrait');
        
        return $pdf->download('laporan-dokumen-wt2.pdf');
    }

    public function cetak_wt4(BerkasWakif $berkasWakif)
    {
        $nadzir = Nadzir::where('id_berkas_wakif', $berkasWakif->id)->get();
        $desStatusBerkasLast = DesStatusBerkas::where('ket_ditolak', null)->where('id_berkas_wakif', $berkasWakif->id)->first();

        $pdf = PDF::loadview('admin.pdf-export.akta-ikrar.dokumen-wt4', [
            'berkasWakif' => $berkasWakif,
            'desStatusBerkasLast' => $desStatusBerkasLast,
            'nadzir' => $nadzir,
        ])->setPaper('f4', 'potrait');
        
        return $pdf->download('laporan-dokumen-wt2.pdf');
    }

    public function validator(Request $request)
    {
        $validate = [
            'wakif_jabatan'                   => ['required'],
            'wakif_bertindak'                 => ['required'],
            'nadzir_jabatan'                  => ['required'],
            'nadzir_bertindak'                => ['required'],

            'status_hak_nomor'                => ['required'],
            'atas_hak_nomor'                  => ['required'],
            'atas_hak_nomor'                  => ['required'],
            'atas_hak_lain'                   => ['required'],
            'batas_timur'                     => ['required'],
            'batas_barat'                     => ['required'],
            'batas_utara'                     => ['required'],
            'batas_selatan'                   => ['required'],
            'id_desa'                         => ['required', 'numeric', 'digits:10'],
            'keperluan'                       => ['required'],

            'saksi.*.nama'                   => ['required', 'string', 'max:40', 'min:3'],
            'saksi.*.nik'                    => ['required', 'numeric', 'digits:16'],
            'saksi.*.tempat_lahir'           => ['required', 'string', 'max:35', 'min:3'],
            'saksi.*.tanggal_lahir'          => ['required', 'date'],
            'saksi.*.id_agama'               => ['required', 'numeric', 'digits:1'],
            'saksi.*.id_pendidikan_terakhir' => ['required', 'numeric', 'digits_between:1,2'],
            'saksi.*.pekerjaan'              => ['required', 'string', 'max:50', 'min:3'],
            'saksi.*.kewarganegaraan'        => ['required', 'string', 'max:50', 'min:3'],
            'saksi.*.rt'                     => ['required', 'numeric', 'digits:3'],
            'saksi.*.rw'                     => ['required', 'numeric', 'digits:3'],
            'saksi.*.id_desa'                => ['required', 'numeric', 'digits:10'],
            'saksi.*.ktp'                    => ['required', 'max:1024', 'mimes:png,jpg,jpeg,gif'],
        ];

        if (in_array($request->method(), ['PUT', 'PATCH'])) {
            $validate['saksi.*.ktp']           = ['nullable', 'max:1024', 'mimes:png,jpg,jpeg,gif'];
        }
        
        // UNTUK VALIDASI FORMULIR 
        return $this->validate($request, $validate);
    }

    function filteredNull($data, $except = [])
    {
        foreach ($data as $key => $item) {
            if (empty($item)){
                if ($except){
                    if (in_array($key, $except) == null){
                        unset($data->$key);
                    }
                }else {
                    unset($data->$key);
                }
            }
        }

        return $data;
    }
}
