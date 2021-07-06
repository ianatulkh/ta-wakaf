<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dokumen WT4a</title>
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

    <p style='margin:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;line-height:140%;'><strong><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>WT.4a</span></strong></p>
    <p style='margin:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;line-height:140%;'><strong><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>&nbsp;</span></strong></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:35.45pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;text-indent:-35.45pt;'><strong><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>PENGESAHAN NAZHIR ORGANISASI/BADAN HUKUM</span></strong></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:35.45pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;text-indent:-35.45pt;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Nomor &nbsp; : &nbsp;{{$berkasWakif->aktaIkrar->nomor}}</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:35.45pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;text-indent:-35.45pt;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Pada hari ini, hari {{strftime('%A', strtotime($desStatusBerkasLast->tgl_ikrar))}} tanggal {{ \Alkoumi\LaravelHijriDate\Hijri::Date('d F Y', $desStatusBerkasLast->tgl_ikrar) }} H atau tanggal {{strftime('%m %B %Y', strtotime($desStatusBerkasLast->tgl_ikrar))}} M  Kami &nbsp; Pejabat Pembuat Akta Ikrar Wakaf (PPAIW) &nbsp; Kecamatan Pulosari &nbsp;Kabupaten &nbsp;Pemalang.yang berdasarkan Pasal 37 Peraturan Pemerintah Nomor 42 tahun 2006 tentang Pelaksanaan Undang-Undang Nomor 41 Tahun 2004 tentang Wakaf diangkat menjadi Pejabat Pembuat Akta Ikrar Wakaf (PPAIW) ,setelah mengadakan penelitian seperlunya,mengesahkan:</span></p>
    
    <div style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>
        <ol style="margin-bottom:0cm;list-style-type: decimal;margin-left:10.25px;">
            <li style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='line-height:115%;font-family:"Times New Roman",serif;'>Nama Organisasi /Badan Hukum&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;: &nbsp;{{$nadzir->nama_badan_hukum_organisasi}}</span></li>
            <li style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='line-height:115%;font-family:"Times New Roman",serif;'>Nomor Akta Notaris&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; : &nbsp;{{$nadzir->no_akta_notaris}}</span></li>
            <li style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='line-height:115%;font-family:"Times New Roman",serif;'>Pimpinan Pusat Berkedudukan di&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; : &nbsp;{{$berkasWakif->desa->nama}} {{$berkasWakif->kecamatan}} {{$berkasWakif->kabupaten}}</span></li>
            <li style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='line-height:115%;font-family:"Times New Roman",serif;'>Susunan Pengurus&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp;</span></li>
        </ol>
    </div>
    <ol start="1" style="list-style-type: lower-alpha;margin-left:10.25px;margin-left:30px">
        <li><span style='line-height:115%;font-family:"Times New Roman",serif;'>Ketua&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; {{$berkasWakif->nadzir()->first()->nama}}</span></li>
        <li><span style='line-height:115%;font-family:"Times New Roman",serif;'>Sekretaris&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; {{$nadzir->sekretaris}}</span></li>
        <li><span style='line-height:115%;font-family:"Times New Roman",serif;'>Bendahara&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; {{$nadzir->bendahara}}</span></li>
    </ol>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Kegiatan Organisasi:</span></p>
    <ol style="list-style-type: decimal;margin-left:25.450000000000003px;">
        <li><span style='line-height:150%;font-family:"Times New Roman",serif;'>Pendidikan dan sosial lainya</span></li>
        <li><span style='line-height:150%;font-family:"Times New Roman",serif;'>..........................................</span></li>
        <li><span style='line-height:150%;font-family:"Times New Roman",serif;'>..........................................</span></li>
    </ol>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Sebagai Nazhir atas tanah wakaf seluas&nbsp;&nbsp; &nbsp; &nbsp; : {{$berkasWakif->luas}}</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Yang terletak di:</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; RT/RW,Desa /Kelurahan&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; : RT.{{$berkasWakif->rt}} RW.{{$berkasWakif->rw}} {{$berkasWakif->desa->nama}}</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp; &nbsp; &nbsp; Kec,Kab./Kota,Prov&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; : Kecamatan Pulosari Kab. Pemalang Jawa Tengah</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Surat pengesahan ini berlaku sejak tanggal disahkan.</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <div align="center" style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:107%;font-size:15px;font-family:"Calibri",sans-serif;'>
        <table style="border-collapse:collapse;border:none;">
            <tbody>
                <tr>
                    <td style="width:450.85pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:249.9pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Disahkan di &nbsp; &nbsp; : Pulosari</span></p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:249.9pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Pada tanggal &nbsp; &nbsp;: {{strftime('%d %B %Y', strtotime($berkasWakif->aktaIkrar->created_at))}}</span></p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:249.9pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:249.9pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Pejabat Pembuat Akta Ikrar Wakaf</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:450.85pt;padding:0cm 5.4pt 0cm 5.4pt;height:63.2pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width:450.85pt;padding:0cm 5.4pt 0cm 5.4pt;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:249.9pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style='font-size:16px;line-height:  115%;font-family:"Times New Roman",serif;'>Drs.MOH.FAILASUP B.</span></strong></p>
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:249.9pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'><strong><span style='font-size:16px;line-height:  115%;font-family:"Times New Roman",serif;'>NIP. &nbsp;19681017.199803.1001</span></strong></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><strong><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></strong></p>
</body>
</html>