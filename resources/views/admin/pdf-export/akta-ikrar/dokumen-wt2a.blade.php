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
    
    <p style='margin:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;line-height:140%;'><strong><span style="font-size:19px;line-height:140%;">WT.2a</span></strong></p>
    <p style='margin:0cm;font-size:15px;font-family:"Calibri",sans-serif;text-align:right;line-height:140%;'><strong><span style="font-size:16px;line-height:140%;">&nbsp;</span></strong></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:19px;line-height:140%;font-family:"Times New Roman",serif;'>SALINAN AKTA IKRAR WAKAF</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>Nomor : {{$berkasWakif->aktaIkrar->nomor}}</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>Pada hari ini, hari {{strftime('%A', strtotime($desStatusBerkasLast->tgl_ikrar))}} tanggal {{ \Alkoumi\LaravelHijriDate\Hijri::Date('d F Y', $desStatusBerkasLast->tgl_ikrar) }} H atau tanggal {{strftime('%m %B %Y', strtotime($desStatusBerkasLast->tgl_ikrar))}} M menghadap kepada kami sebagai Pejabat Pembuat Akta Ikrar Wakaf (PPAIW) Kecamatan Pulosari Kabupaten Pemalang Pasal 37 Peraturan Pemerintah Nomor 42 tahun 2006 tentang Pelaksanaan Undang-Undang Nomor 41 Tahun 2004 tentang Wakaf diangkat menjadi Pejabat Pembuat Akta Nazhir yang kami kenal/diperkenalkan kepada kami danakan disebutkan dalam Akta ini:</span></p>
    <table style="width:453.85pt;margin-left:-7.1pt;border-collapse:collapse;border:none;">
        <tbody>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>I. &nbsp; Nama Lengkap</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->wakif->nama}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>Nomor Induk Kependudukan</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->wakif->nik}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>Tempat dan Tanggal Lahir / Umur</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->wakif->tempat_lahir}}, {{date('d-m-Y', strtotime($berkasWakif->wakif->tanggal_lahir))}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>Agama</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->wakif->agama->agama}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>Pendidikan</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->wakif->pendidikanTerakhir->tingkat}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>Pekerjaan</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->wakif->pekerjaan}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>Kewarganegaraan</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->wakif->kewarganegaraan}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>Tempat Tinggal</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->wakif->desa->nama}} RT{{$berkasWakif->wakif->rt}}/{{$berkasWakif->wakif->rw}} {{$berkasWakif->wakif->kecamatan}} {{$berkasWakif->wakif->kabupaten}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>Jabatan (Wakif Organisasi / Badan Hukum)</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->aktaIkrar->wakif_jabatan}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>Bertindak untuk dan atas nama</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->aktaIkrar->wakif_bertindak}}</span></p>
                </td>
            </tr>
        </tbody>
    </table>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;text-indent:14.2pt;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>Selanjutnya disebut WAKIF</span></p>
    <table style="width:453.85pt;margin-left:-7.1pt;border-collapse:collapse;border:none;">
        <tbody>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>II. &nbsp;Nama Lengkap</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>: {{$nadzir->nama}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>Nomor Induk Kependudukan</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>: {{$nadzir->nik}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>Tempat dan Tanggal Lahir / Umur</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>: {{$nadzir->tempat_lahir}}, {{date('d-m-Y', strtotime($nadzir->tanggal_lahir))}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>Agama</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>: {{$nadzir->agama->agama}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>Pendidikan</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>: {{$nadzir->pendidikanTerakhir->tingkat}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>Pekerjaan</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>: {{$nadzir->pekerjaan}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>Kewarganegaraan</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>: {{$nadzir->kewarganegaraan}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>Tempat Tinggal</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>: {{$nadzir->desa->nama}} RT{{$nadzir->rt}}/{{$nadzir->rw}} {{$nadzir->kecamatan}} {{$nadzir->kabupaten}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>Jabatan (Nazhir Organisasi / Badan Hukum)</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->aktaIkrar->nadzir_jabatan}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.6pt;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>Bertindak untuk dan atas nama</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:130%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:130%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->aktaIkrar->nadzir_bertindak}}</span></p>
                </td>
            </tr>
        </tbody>
    </table>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;text-indent:14.2pt;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>Selanjutnya disebut NADHIR&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>Menerangkan bahwa wakif telah mengikrarkan wakaf kepada Nazhir berupa sebidang tanah:</span></p>
    <table style="width:453.85pt;border-collapse:collapse;border:none;">
        <tbody>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:-5.25pt;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>Status hak dan nomor</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->status_hak_nomor}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:-5.25pt;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>Atas hak dan nomor</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->atas_hak_nomor}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:-5.25pt;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>Atas hak / surat lain</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->atas_hak_lain}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:-5.25pt;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>(jika belum bersertifikat)</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'></span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:23.1pt;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>Luas</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->luas}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:-5.25pt;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>Batas-batas</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'></span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:23.1pt;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>Timur</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->batas_timur}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:23.1pt;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>Barat</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->batas_barat}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:23.1pt;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>Utara</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->batas_utara}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:22.9pt;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>Selatan</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->batas_selatan}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:-5.25pt;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>Letak</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'></span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:-5.25pt;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>Desa/Kelurahan</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->desa->nama}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:-5.25pt;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>Kecamatan</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->kecamatan}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:-5.25pt;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>Kabupaten / Kotamadya 2)</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->kabupaten}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:-5.25pt;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>Provinsi</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->provinsi}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:-5.25pt;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>Untuk keperluan 3)</span></p>
                </td>
                <td style="width: 255.4pt;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:120%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:120%;font-family:"Times New Roman",serif;'>: {{$berkasWakif->keperluan}}</span></p>
                </td>
            </tr>
        </tbody>
    </table>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;text-indent:14.2pt;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Dengan disaksikan oleh:</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-indent:14.2pt;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <table style="width:453.85pt;margin-left:7.1pt;border-collapse:collapse;border:none;">
        <tbody>
            <tr>
                <td style="width: 7cm;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>1. &nbsp;Nama lengkap&nbsp;</span></p>
                </td>
                <td style="width: 255.4pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>: {{$saksi1->nama}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.8pt;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>Nomor Induk Kependudukan</span></p>
                </td>
                <td style="width: 255.4pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>: {{$saksi1->nik}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.8pt;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>Tempat dan Tanggal Lahir / Umur</span></p>
                </td>
                <td style="width: 255.4pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>: {{$saksi1->tempat_lahir}} {{date('d-m-Y', strtotime($saksi1->tanggal_lahir))}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.8pt;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>Agama</span></p>
                </td>
                <td style="width: 255.4pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>: {{$saksi1->agama->agama}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.8pt;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>Pendidikan</span></p>
                </td>
                <td style="width: 255.4pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>: {{$saksi1->pendidikanTerakhir->tingkat}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.8pt;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>Pekerjaan</span></p>
                </td>
                <td style="width: 255.4pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>: {{$saksi1->pekerjaan}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.8pt;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>Kewarganegaraan</span></p>
                </td>
                <td style="width: 255.4pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>: {{$saksi1->kewarganegaraan}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.8pt;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>Tempat Tinggal</span></p>
                </td>
                <td style="width: 255.4pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>: {{$saksi1->desa->nama}} RT{{$saksi1->rt}}/{{$saksi1->rw}} {{$saksi1->kecamatan}} {{$saksi1->kabupaten}}</span></p>
                </td>
            </tr>
        </tbody>
    </table>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-indent:14.2pt;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <table style="width:453.85pt;margin-left:7.1pt;border-collapse:collapse;border:none;">
        <tbody>
            <tr>
                <td style="width: 7cm;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>2. &nbsp;Nama lengkap&nbsp;</span></p>
                </td>
                <td style="width: 255.4pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>: {{$saksi2->nama}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.8pt;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>Nomor Induk Kependudukan</span></p>
                </td>
                <td style="width: 255.4pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>: {{$saksi2->nik}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.8pt;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>Tempat dan Tanggal Lahir / Umur</span></p>
                </td>
                <td style="width: 255.4pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>: {{$saksi2->tempat_lahir}} {{date('d-m-Y', strtotime($saksi2->tanggal_lahir))}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.8pt;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>Agama</span></p>
                </td>
                <td style="width: 255.4pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>: {{$saksi2->agama->agama}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.8pt;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>Pendidikan</span></p>
                </td>
                <td style="width: 255.4pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>: {{$saksi2->pendidikanTerakhir->tingkat}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.8pt;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>Pekerjaan</span></p>
                </td>
                <td style="width: 255.4pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>: {{$saksi2->pekerjaan}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.8pt;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>Kewarganegaraan</span></p>
                </td>
                <td style="width: 255.4pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>: {{$saksi2->kewarganegaraan}}</span></p>
                </td>
            </tr>
            <tr>
                <td style="width: 7cm;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:15.8pt;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>Tempat Tinggal</span></p>
                </td>
                <td style="width: 255.4pt;border: none;padding: 0cm 5.4pt;vertical-align: top;">
                    <p style='margin-top:  0cm;margin-right:0cm;margin-bottom:0cm;margin-left:0cm;line-height:140%;font-size:15px;font-family:"Calibri",sans-serif;'><span style='font-size:16px;line-height:140%;font-family:"Times New Roman",serif;'>: {{$saksi2->desa->nama}} RT{{$saksi2->rt}}/{{$saksi2->rw}} {{$saksi2->kecamatan}} {{$saksi2->kabupaten}}</span></p>
                </td>
            </tr>
        </tbody>
    </table>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:36.0pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;margin:0cm;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:0cm;margin-left:36.0pt;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;margin:0cm;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Ikrar wakaf ini dibuat dalam rangkap 7 (tujuh):</span></p>
    <ol style="list-style-type: decimal;margin-left:11.3px;">
        <li><span style='line-height:115%;font-family:"Times New Roman",serif;'>Lembar pertama untuk Wakif</span></li>
        <li><span style='line-height:115%;font-family:"Times New Roman",serif;'>Lembar kedua untuk Nadhir</span></li>
        <li><span style='line-height:115%;font-family:"Times New Roman",serif;'>Lembar ketiga untuk Mauquf alaih</span></li>
        <li><span style='line-height:115%;font-family:"Times New Roman",serif;'>Lembar keempat untuk Kepala Kantor Kementerian Agama Kabupaten / Kota</span></li>
        <li><span style='line-height:115%;font-family:"Times New Roman",serif;'>Lembar kelima untuk Kantor Pertahanan Kabupaten dalam hal benda wakaf berupa tanah</span></li>
        <li><span style='line-height:115%;font-family:"Times New Roman",serif;'>Lembar keenam untuk Badan Wakif Indonesia</span></li>
        <li><span style='line-height:115%;font-family:"Times New Roman",serif;'>Lembar ketujuh untuk instansi berwenang.</span></li>
    </ol>
    <table style="border-collapse:collapse;border:none;">
        <tbody>
            <tr>
                <td style="width: 223.15pt;padding: 0cm 5.4pt;height: 134.5pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:12.75pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                </td>
                <td style="width: 228.2pt;padding: 0cm 5.4pt;height: 134.5pt;vertical-align: top;">
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Pulosari, {{strftime('%m %B %Y', strtotime($berkasWakif->aktaIkrar->created_at))}}</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Disalin sesuai dengan aslinya;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Pejabat Pembuat Akta Ikrar Wakaf</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>Drs. MOH.FAILASUP B.</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>NIP. 19681017.199803.1001</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                    <p style='margin-top:0cm;margin-right:0cm;margin-bottom:8.0pt;margin-left:0cm;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'><span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span></p>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>