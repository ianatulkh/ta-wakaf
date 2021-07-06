<?php

namespace App\Http\Controllers\Admin;

use App\AktaIkrar;
use App\BerkasWakif;
use App\BerkasWakifNadzir;
use App\DesStatusBerkas;
use App\Http\Controllers\Controller;
use App\Nadzir;
use App\Saksi;
use App\Traits\UploadFile;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class CetakAktaIkrarController extends Controller
{
    use UploadFile;

    public function store(Request $request)
    {
        $this->validator($request);
        $newRequest  = (object) $request->all();

        $arrJabatan = [
            'Ketua', 
            'Sekretaris', 
            'Bendahara', 
            'Anggota', 
            'Anggota'
        ];

        $aktaIkrar = AktaIkrar::create((array) $newRequest);

        if($request->type_nazhir == 1){
            // NAZHIR PERSEORANGAN
            $arrayP = []; 
            foreach($newRequest->nadzir_prs as $key => $item){
                $arrayP += [$item => [
                    'jabatan' => $arrJabatan[$key],
                    'nama_badan_hukum_organisasi' => null,
                    'no_akta_notaris'             => null,
                    'sekretaris'                  => null,
                    'bendahara'                   => null,
                ]];
            }

            $aktaIkrar->berkasWakif->nadzir()->sync($arrayP);
        } else {
            // NAZHIR BADAN HUKUM / ORGANISASI
            $aktaIkrar->berkasWakif->nadzir()->sync([$newRequest->nadzir => [
                'jabatan'                     => 'Ketua',
                'nama_badan_hukum_organisasi' => $newRequest->nama_badan_hukum_organisasi,
                'no_akta_notaris'             => $newRequest->no_akta_notaris,
                'sekretaris'                  => $newRequest->sekretaris,
                'bendahara'                   => $newRequest->bendahara,
            ]]);
        }
        
        $aktaIkrar->berkasWakif->saksi()->sync($newRequest->saksi);
        
        return redirect()->route('admin.akta-ikrar.show', $request->id_berkas_wakif)->withSuccess('berhasil disimpan!');
    }

    public function update(Request $request, AktaIkrar $aktaIkrar)
    {
        $this->validator($request);
        $data = (object) $request->all();
        $data = $this->filteredNull($data);

        $arrJabatan = [
            'Ketua', 
            'Sekretaris', 
            'Bendahara', 
            'Anggota', 
            'Anggota'
        ];

        // SIMPAN DATA
        if($request->type_nazhir == 1){
            // NAZHIR PERSEORANGAN
            $arrayP = []; 
            foreach($request->nadzir_prs as $key => $item){
                $arrayP += [$item => [
                    'jabatan' => $arrJabatan[$key],
                    'nama_badan_hukum_organisasi' => null,
                    'no_akta_notaris'             => null,
                    'sekretaris'                  => null,
                    'bendahara'                   => null,
                ]];
            }

            $aktaIkrar->berkasWakif->nadzir()->sync($arrayP);
        } else {
            // NAZHIR BADAN HUKUM / ORGANISASI
            $aktaIkrar->berkasWakif->nadzir()->sync([$request->nadzir => [
                'jabatan'                     => 'Ketua',
                'nama_badan_hukum_organisasi' => $request->nama_badan_hukum_organisasi,
                'no_akta_notaris'             => $request->no_akta_notaris,
                'sekretaris'                  => $request->sekretaris,
                'bendahara'                   => $request->bendahara,
            ]]);
        }
        
        $aktaIkrar->update((array) $data);
        $aktaIkrar->berkasWakif->saksi()->sync($data->saksi);

        return redirect()->route('admin.akta-ikrar.show', $data->id_berkas_wakif)->withSuccess('berhasil disimpan!');
    }

    /**
     * Untuk Cetak WT (Persyaratan Pendaftaran Tanah Wakaf)
     * 
     */
    public function cetak_wt1(BerkasWakif $berkasWakif)
    {
        $nadzir = $berkasWakif->nadzir()->wherePivot('jabatan', 'Ketua')->first();
        $desStatusBerkasLast = DesStatusBerkas::where('ket_ditolak', null)->where('id_berkas_wakif', $berkasWakif->id)->first();

        $pdf = PDF::loadview('admin.pdf-export.akta-ikrar.dokumen-wt1', [
            'berkasWakif' => $berkasWakif,
            'nadzir' => $nadzir,
            'desStatusBerkasLast' => $desStatusBerkasLast,
            'saksi1' => $berkasWakif->saksi()->get()[0],
            'saksi2' => $berkasWakif->saksi()->get()[1],
        ])->setPaper('f4', 'potrait');
        
        return $pdf->download('laporan-dokumen-wt1.pdf');
    }

    public function cetak_wt2(BerkasWakif $berkasWakif)
    {
        $nadzir = $berkasWakif->nadzir()->wherePivot('jabatan', 'Ketua')->first();
        $desStatusBerkasLast = DesStatusBerkas::where('ket_ditolak', null)->where('id_berkas_wakif', $berkasWakif->id)->first();

        $pdf = PDF::loadview('admin.pdf-export.akta-ikrar.dokumen-wt2', [
            'berkasWakif' => $berkasWakif,
            'nadzir' => $nadzir,
            'desStatusBerkasLast' => $desStatusBerkasLast,
            'saksi1' => $berkasWakif->saksi()->get()[0],
            'saksi2' => $berkasWakif->saksi()->get()[1],
        ])->setPaper('f4', 'potrait');
        
        return $pdf->download('laporan-dokumen-wt2.pdf');
    }

    public function cetak_wt2a(BerkasWakif $berkasWakif)
    {
        $nadzir = $berkasWakif->nadzir()->wherePivot('jabatan', 'Ketua')->first();
        $desStatusBerkasLast = DesStatusBerkas::where('ket_ditolak', null)->where('id_berkas_wakif', $berkasWakif->id)->first();

        $pdf = PDF::loadview('admin.pdf-export.akta-ikrar.dokumen-wt2a', [
            'berkasWakif' => $berkasWakif,
            'nadzir' => $nadzir,
            'desStatusBerkasLast' => $desStatusBerkasLast,
            'saksi1' => $berkasWakif->saksi()->get()[0],
            'saksi2' => $berkasWakif->saksi()->get()[1],
        ])->setPaper('f4', 'potrait');
        
        return $pdf->download('laporan-dokumen-wt2a.pdf');
    }

    public function cetak_wt3(BerkasWakif $berkasWakif)
    {
        $nadzir = $berkasWakif->nadzir()->wherePivot('jabatan', 'Ketua')->first();
        $desStatusBerkasLast = DesStatusBerkas::where('ket_ditolak', null)->where('id_berkas_wakif', $berkasWakif->id)->first();

        $pdf = PDF::loadview('admin.pdf-export.akta-ikrar.dokumen-wt3', [
            'berkasWakif' => $berkasWakif,
            'nadzir' => $nadzir,
            'desStatusBerkasLast' => $desStatusBerkasLast,
            'saksi1' => $berkasWakif->saksi()->get()[0],
            'saksi2' => $berkasWakif->saksi()->get()[1],
        ])->setPaper('f4', 'potrait');
        
        return $pdf->download('laporan-dokumen-wt3.pdf');
    }

    public function cetak_wt3a(BerkasWakif $berkasWakif)
    {
        $nadzir = $berkasWakif->nadzir()->wherePivot('jabatan', 'Ketua')->first();
        $desStatusBerkasLast = DesStatusBerkas::where('ket_ditolak', null)->where('id_berkas_wakif', $berkasWakif->id)->first();

        $pdf = PDF::loadview('admin.pdf-export.akta-ikrar.dokumen-wt3a', [
            'berkasWakif' => $berkasWakif,
            'nadzir' => $nadzir,
            'desStatusBerkasLast' => $desStatusBerkasLast,
            'saksi1' => $berkasWakif->saksi()->get()[0],
            'saksi2' => $berkasWakif->saksi()->get()[1],
        ])->setPaper('f4', 'potrait');
        
        return $pdf->download('laporan-dokumen-wt3a.pdf');
    }

    public function cetak_wt4(BerkasWakif $berkasWakif)
    {
        $nadzir = $berkasWakif->nadzir()->get();
        $desStatusBerkasLast = DesStatusBerkas::where('ket_ditolak', null)->where('id_berkas_wakif', $berkasWakif->id)->first();

        $pdf = PDF::loadview('admin.pdf-export.akta-ikrar.dokumen-wt4', [
            'berkasWakif' => $berkasWakif,
            'desStatusBerkasLast' => $desStatusBerkasLast,
            'nadzir' => $nadzir,
        ])->setPaper('f4', 'potrait');
        
        return $pdf->download('laporan-dokumen-wt2.pdf');
    }

    public function cetak_wt4a(BerkasWakif $berkasWakif)
    {
        $nadzir = $berkasWakif->nadzir()->first();
        $desStatusBerkasLast = DesStatusBerkas::where('ket_ditolak', null)->where('id_berkas_wakif', $berkasWakif->id)->first();

        $pdf = PDF::loadview('admin.pdf-export.akta-ikrar.dokumen-wt4a', [
            'berkasWakif' => $berkasWakif,
            'desStatusBerkasLast' => $desStatusBerkasLast,
            'nadzir' => $nadzir->pivot,
        ])->setPaper('f4', 'potrait');
        
        return $pdf->download('laporan-dokumen-wt4a.pdf');
    }

    public function cetak_wtk(BerkasWakif $berkasWakif)
    {
        $desStatusBerkasLast = DesStatusBerkas::where('ket_ditolak', null)->where('id_berkas_wakif', $berkasWakif->id)->first();

        $pdf = PDF::loadview('admin.pdf-export.akta-ikrar.dokumen-wtk', [
            'berkasWakif' => $berkasWakif,
            'desStatusBerkasLast' => $desStatusBerkasLast,
        ])->setPaper('f4', 'potrait');
        
        return $pdf->download('laporan-dokumen-wtk.pdf');
    }

    public function validator(Request $request)
    {
        $validate = [
            'wakif_jabatan'                   => ['nullable', 'regex:/^[a-zA-ZÑñ\s]+$/', 'max:50', 'min:5'],
            'wakif_bertindak'                 => ['required', 'regex:/^[a-zA-ZÑñ\s]+$/', 'max:50', 'min:5'],
            'nadzir_jabatan'                  => ['nullable', 'regex:/^[a-zA-ZÑñ\s]+$/', 'max:50', 'min:5'],
            'nadzir_bertindak'                => ['required', 'regex:/^[a-zA-ZÑñ\s]+$/', 'max:50', 'min:5'],
            'nomor'                           => ['required', 'max:50', 'min:10'],
            'nomor_wtk'                       => ['required', 'max:50', 'min:10'],
            'saksi'                           => ['required', 'array', 'min:2'],
        ];

        if($request->type_nazhir == 2){
            $validate['nama_badan_hukum_organisasi'] = ['required', 'max:50', 'min:10'];
            $validate['no_akta_notaris']             = ['required', 'max:50', 'min:5'];
            $validate['sekretaris']                  = ['required', 'max:40', 'min:3', 'regex:/^[a-zA-ZÑñ\s]+$/'];
            $validate['bendahara']                   = ['required', 'max:40', 'min:3', 'regex:/^[a-zA-ZÑñ\s]+$/'];
            $validate['nadzir']                      = ['required', 'numeric'];
        } else{
            $validate['nadzir_prs']                  = ['required', 'array', 'min:5'];
        }
        
        // UNTUK VALIDASI FORMULIR 
        return $this->validate($request, $validate, [
            'wakif_jabatan.regex' => 'Isian harus berupa karakter huruf',
            'wakif_bertindak.regex' => 'Isian harus berupa karakter huruf',
            'nadzir_jabatan.regex' => 'Isian harus berupa karakter huruf',
            'nadzir_bertindak.regex' => 'Isian harus berupa karakter huruf',
            'sekretaris.regex' => 'Isian harus berupa karakter huruf',
            'bendahara.regex' => 'Isian harus berupa karakter huruf',
        ]);
    }

    public function getSaksi(Request $request)
    {
        $data = Saksi::where('nik', 'like', '%' . ($request->get('q') ?? '') . '%')
                        ->orWhere('nama', 'like', '%' . ($request->get('q') ?? '') . '%');

        return response()->json($data->limit(10)->get());
    }
}
