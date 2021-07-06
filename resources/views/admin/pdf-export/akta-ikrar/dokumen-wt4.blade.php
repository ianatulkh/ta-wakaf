<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    
    <p style='margin:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;line-height:140%;'><strong><span style="font-size:13px;line-height:140%;">WT.4</span></strong></p>
    <p style='margin:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;line-height:140%;'><strong><span style="font-size:12px;line-height:140%;">&nbsp;</span></strong></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style="font-size:12px;line-height:140%;">PENGESAHAN NAZHIR PERSEORANGAN OLEH PPAIW</span></strong></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><strong><span style="font-size:12px;line-height:140%;">Nomor : {{$berkasWakif->aktaIkrar->nomor}}</span></strong></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style="font-size:12px;line-height:140%;">&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:1.0cm;'><span style="font-size:12px;line-height:140%;">Pada hari ini, hari {{strftime('%A', strtotime($desStatusBerkasLast->tgl_ikrar))}} tanggal {{ \Alkoumi\LaravelHijriDate\Hijri::Date('d F Y', $desStatusBerkasLast->tgl_ikrar) }} H atau tanggal {{strftime('%m %B %Y', strtotime($desStatusBerkasLast->tgl_ikrar))}} M Kami Pejabat Pembuat Akta Ikrar Wakaf (PPAIW) Kecamatan Pulosari Kabupaten Pemalang Pasal 37 Peraturan Pemerintah Nomor 42 tahun 2006 tentang Pelaksanaan Undang-Undang Nomor 41 Tahun 2004 tentang Wakaf diangkat menjadi Pejabat Pembuat Akta Ikrar Wakaf (PPAIW) setelah mengadakan penelitian seperlunya, mengesahkan:</span></p>
    <table style="width:453.85pt;margin-left:-7.1pt;border-collapse:collapse;border:none;">
        <tbody>
            @php $num = 1 @endphp
            @foreach ($nadzir as $item)
                <tr>
                    <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style="font-size:12px;line-height:130%;">{{$num++}}. &nbsp; Nama Lengkap</span></p>
                    </td>
                    <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style="font-size:12px;line-height:130%;">: {{$item->nama}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style="font-size:12px;line-height:130%;">Nomor Induk Kependudukan</span></p>
                    </td>
                    <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style="font-size:12px;line-height:130%;">: {{$item->nik}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style="font-size:12px;line-height:130%;">Tempat dan Tanggal Lahir / Umur</span></p>
                    </td>
                    <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style="font-size:12px;line-height:130%;">: {{$item->tempat_lahir}}, {{date('d-m-Y', strtotime($item->tanggal_lahir))}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style="font-size:12px;line-height:130%;">Agama</span></p>
                    </td>
                    <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style="font-size:12px;line-height:130%;">: {{$item->agama->agama}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style="font-size:12px;line-height:130%;">Pendidikan</span></p>
                    </td>
                    <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style="font-size:12px;line-height:130%;">: {{$item->pendidikanTerakhir->tingkat}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style="font-size:12px;line-height:130%;">Pekerjaan</span></p>
                    </td>
                    <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style="font-size:12px;line-height:130%;">: {{$item->pekerjaan}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style="font-size:12px;line-height:130%;">Kewarganegaraan</span></p>
                    </td>
                    <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style="font-size:12px;line-height:130%;">: {{$item->kewarganegaraan}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style="font-size:12px;line-height:130%;">Jabatan dalam nadhir sebagai</span></p>
                    </td>
                    <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style="font-size:12px;line-height:130%;">: {{$item->pivot->jabatan}}</span></p>
                    </td>
                </tr>
                <tr>
                    <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style="font-size:12px;line-height:130%;">Tempat Tinggal</span></p>
                    </td>
                    <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                        <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style="font-size:12px;line-height:130%;">: {{$item->desa->nama}} RT{{$item->rt}}/{{$item->rw}} {{$item->kecamatan}} {{$item->kabupaten}}</span></p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style="font-size:12px;line-height:140%;">&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;text-indent:14.2pt;'><span style="font-size:12px;line-height:140%;">Sebagai Nadhir atas tanah seluas : {{$berkasWakif->luas}} yang terletak di Desa {{$berkasWakif->desa->nama}} Kecamatan {{$berkasWakif->kecamatan}} {{$berkasWakif->kabupaten}}.</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;text-indent:14.2pt;'><span style="font-size:12px;line-height:140%;">Surat pengesahan ini berlaku sejak tanggal disahkan.</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'><span style="font-size:12px;line-height:115%;">&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;'><span style="font-size:12px;line-height:115%;">&nbsp;</span></p>
    <table style="border-collapse:collapse;border:none;">
        <tbody>
            <tr>
                <td style="width: 223.15pt;padding: 0cm 5.4pt;height: 102.2pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style="font-size:12px;line-height:115%;">&nbsp;</span></p>
                </td>
                <td style="width: 228.2pt;padding: 0cm 5.4pt;height: 102.2pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:33.65pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-indent:7.2pt;'><span style="font-size:12px;line-height:115%;">&nbsp; Disahkan &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : &nbsp; {{$berkasWakif->kecamatan}}</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:33.65pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-indent:7.2pt;'><span style="font-size:12px;line-height:115%;">&nbsp; Pada Tanggal &nbsp; &nbsp; &nbsp;: &nbsp;{{strftime('%d %B %Y', strtotime($berkasWakif->aktaIkrar->created_at))}}</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style="font-size:12px;line-height:115%;">&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style="font-size:12px;line-height:115%;">Pejabat Pembuat Akta Ikrar Wakaf</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style="font-size:12px;line-height:115%;">Materai 6.000</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style="font-size:12px;line-height:115%;">&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style="font-size:12px;line-height:115%;">&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style="font-size:12px;line-height:115%;">&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style="font-size:12px;line-height:115%;">&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style="font-size:12px;line-height:115%;">Drs. MOH.FAILASUP B.</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style="font-size:12px;line-height:115%;">NIP. 19681017.199803.1001</span></p>
                </td>
            </tr>
        </tbody>
    </table>

</body>
</html>