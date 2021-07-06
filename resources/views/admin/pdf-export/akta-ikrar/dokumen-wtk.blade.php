<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dokumen WT.K</title>
    <style>
        @page { size: 21cm 33cm portrait; }
        @page { margin: 0.7cm 2cm 2cm 2cm; }
    </style>
</head>
<body>
    @php 
        $locale = 'id.utf8'; 
        setlocale(LC_ALL, $locale); 
        \Alkoumi\LaravelHijriDate\Hijri::setLang('en');
    @endphp
    
    <p style='margin:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;line-height:140%;'><strong><span style="font-size:19px;line-height:140%;">WT.K</span></strong></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong>&nbsp;</strong></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:16px;line-height:107%;font-family:"Times New Roman",serif;'>PEMERINTAH DAERAH KABUPATEN PEMALANG</span></strong></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:16px;line-height:107%;font-family:"Times New Roman",serif;'>KECAMATAN PULOSARI DESA/KELURAHAN &nbsp;{{strtoupper($berkasWakif->desa->nama)}}</span></strong></p>
    <hr>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:107%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:107%;font-family:"Times New Roman",serif;'>KETERANGAN KEPALA DESA/LURAH</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:107%;font-family:"Times New Roman",serif;'>TENTANG TANAH WAKAF</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:107%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:107%;font-family:"Times New Roman",serif;'>Nomor: {{$berkasWakif->aktaIkrar->nomor_wtk}}</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:107%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:107%;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Dengan ini, saya Kepala Desa/Lurah Pulosari menerangkan bahwa tanah berupa sawah, pekarangan, kebun dan lain-lain:</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:200%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:200%;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Status&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;: {{$berkasWakif->status_hak_nomor}}</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:200%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:200%;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Luas&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;: {{$berkasWakif->luas}}</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:200%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:200%;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Surat-surat&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: {{$berkasWakif->atas_hak_lain ?? 'Sertifikat Tanah'}}</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:200%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:200%;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Batas-batas&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: <span style='line-height:200%;font-family:"Times New Roman",serif;'>&nbsp; - Sebelah Barat&nbsp; &nbsp; &nbsp; &nbsp;: {{$berkasWakif->batas_barat}}</span></span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:200%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:200%;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span style="color: white">Batas-batas</span>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; <span style='line-height:200%;font-family:"Times New Roman",serif;'>&nbsp; - Sebelah Timur&nbsp; &nbsp; &nbsp; : {{$berkasWakif->batas_timur}}</span></span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:200%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:200%;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span style="color: white">Batas-batas</span>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; <span style='line-height:200%;font-family:"Times New Roman",serif;'>&nbsp; - Sebelah Utara&nbsp; &nbsp; &nbsp; &nbsp;: {{$berkasWakif->batas_utara}}</span></span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:200%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:200%;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<span style="color: white">Batas-batas</span>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; <span style='line-height:200%;font-family:"Times New Roman",serif;'>&nbsp; - Sebelah Selatan&nbsp; &nbsp;&nbsp;: {{$berkasWakif->batas_selatan}}</span></span></p>

    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:36.0pt;line-height:200%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:200%;font-family:"Times New Roman",serif;'>Alamat&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;: {{$berkasWakif->desa->nama}} RT.{{$berkasWakif->rt}} RW.{{$berkasWakif->rw}} Kec. Pulosari Kab. Pemalang</span></p>
    <br>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:36.0pt;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:107%;font-family:"Times New Roman",serif;'>Demikian,agar menjadi maklum bagi yang berkepentingan.</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:36.0pt;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:107%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <table style="border-collapse:collapse;border:none;">
        <tbody>
            <tr>
                <td style="width: 225.85pt;padding: 0cm 5.4pt;height: 134.5pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Kepala Desa/Lurah,</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>...................................................</span></p>
                </td>
                <td style="width: 225.5pt;padding: 0cm 5.4pt;height: 134.5pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Pejabat Pembuat Akta Ikrar Wakaf&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Drs.MOH.FAILASUP B.</span></strong></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>NIP. &nbsp;19681017.199803.1001</span></strong></p>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>