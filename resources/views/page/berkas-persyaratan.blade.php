@extends('layouts.app')

@section('content')
 <!-- Hosting -->
 <div class="hosting">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Persyaratan Pengajuan Tanah Wakaf Online</h2>
             </div>
          </div>
       </div>
       <div class="row">
            <div class="col-md-12">
                <p style="font-size: 18px">
                    <h3>Sebelum anda mendaftar, anda harus menyiapkan berkas sebagai berikut: <br> <br></h3>

                    <strong>Berkas Digital (scan)</strong> <br>
                    1.    SPPT / Pajak Tanah Terakhir <br>
                    2.    Sertifikat Tanah / Blangko Konversi dari BPN atau Warkah (jika belum punya sertifikat)<br>
                    3.    Surat Keterangan tanah tidak Sengketa dari kepala desa<br> 
                    4.    Menyiapkan data 5 Nadzir beserta Foto KTP<br><br>

                    <strong>Berkas Fisik</strong> <br>
                    5.    Materai 6000 sebanyak 6 lembar <br>
                    6.    Fotocopy KTP Wakif 3 Lembar Dilegalisir Desa <br>
                    7.    Fotocopy KTP 5 orang nadzir (perorangan) masing-masing 3 lembar dilegalisir desa <br>
                          Stempel Badan Hukum dan dilampiri Akte Pendirian (Jika Yayasan) <br>
                </p>

                <br>

                <p style="font-size: 16px">
                    Keterangan <br>
                    NADZIR -> pihak yang menerima harta benda wakaf dari wakif untuk dikelola dan dikembangkan sesuai dengan peruntukannya <br>
                    WAKIF -> pihak yang mewakafkan tanah
                </p>

                <br>
                <hr>
                <br>
                
                <h3>Tata cara perwakafan tanah milik secara online diuraikan sebagai berikut:</h3>
                <p style="font-size: 18px">
                    <table>
                        <tbody>
                                <tr>
                                    <td width="30" valign="top" style="font-size: 16px">1</td>
                                    <td style="font-size: 16px">
                                        <strong>Isi Data Diri Wakif melalui link <a href="/registrasi">disini</a></strong> <br>
                                        Kemudian sistem akan mengirimkan email untuk verifikasi, silahkan cek email dan klik tombol verifikasi lalu login dengan akun yang telah anda buat sebelumnya<br>
                                    </td>
                                </tr> 
                                <tr>
                                    <td width="30" valign="top" style="font-size: 16px">2</td>
                                    <td style="font-size: 16px">
                                        <strong>Ajukan Wakaf</strong> <br>
                                        Setelah nomor 1 selesai, anda akan diarahkan pada halaman awal dashboard, terdapat tombol untuk mengajukan wakaf kemudian klik "Ajukan Wakaf Tanah" dan anda akan diarahkan ke formulir untuk upload berkas persyaratan wakaf <br>
                                        Berkas yang harus dilampirkan sesuai dengan <strong>Berkas Digital</strong> yang telah disebutkan diatas, kemudian klik "Kirim ke Petugas KUA"<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30" valign="top" style="font-size: 16px">3</td>
                                    <td style="font-size: 16px">
                                        <strong>Pengecekan Data</strong> <br>
                                        Pengajuan data untuk pendaftaran wakaf sedang diproses oleh petugas KUA, Petugas KUA dapat mengkonfirmasi jika data sesuai dengan persaratan / menolak pengajuan anda jika tidak valid
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30" valign="top" style="font-size: 16px">3</td>
                                    <td style="font-size: 16px">
                                        <strong>Survei Tempat</strong> <br>
                                        Saat setelah data selesai dicek dan valid datanya, dilakukannya survey ke lokasi tempat wakaf, anda akan diberitahukan oleh petugas mengenai jadwal survei, dalam survey wakif harus bertemu dengan wakif dan harus membawa <strong>Berkas Fisik</strong> yang telah disebutkan diatas
                                        <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30" valign="top" style="font-size: 16px">3</td>
                                    <td style="font-size: 16px">
                                        <strong>Pelaksanaan Ikrar</strong> <br>
                                        Setelah survey selesai anda harus menunggu jadwal ikrar yang akan diberitahukan oleh petugas KUA, dan melakukan ikrar wakaf sesuai jadwal<br>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30" valign="top" style="font-size: 16px">3</td>
                                    <td style="font-size: 16px">
                                        <strong>Akta Ikrar</strong> <br>
                                        Setelah pelaksanaan ikrar, anda juga akan mendapatkan pemberitahuan dari petugas KUA bahwa Akta Ikrar telah selesai dibuat dan anda dan nadzir harus segera mengesahkan Akta Ikrar (ditandatangani) di kantor KUA <br>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </p>
                <div class="mb-5"></div>
            </div>
       </div>
    </div>
 </div>
 <!-- end Hosting -->
@endsection