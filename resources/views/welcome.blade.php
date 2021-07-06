@extends('layouts.app')

@section('content')
<!-- banner -->
<section class="banner_main">
    <div class="container">
       <div class="row d_flex">
          <div class="col-md-5">
             <div class="text-bg">
                <h1>Aplikasi<br>Wakaf Online</h1>
                <span>Kecamatan Pulosari</span>
                <p>Tidak perlu ke mana mana, tidak perlu menunggu antri untuk giliran dilayani, cukup isi data identitas, ikuti alur, dan upload berkas sesuai dengan persyaratan tata cara pendaftaran wakaf, pengajuan wakaf anda akan segera diproses</p>
                <a href="{{ route('register') }}">Daftar Sekarang</a>
             </div>
          </div>
          <div class="col-md-7">
             <div class="text-img mt-5">
               <center><img src="{{ asset('homepage/images/logo_kua.png') }}" style="height: 350px; width: auto"/></center>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- end banner -->
 <!-- Hosting -->
 <div id="tentang-wakaf" class="hosting">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Apa itu Wakaf ?</h2>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-md-12">
             <div class="web_hosting">
                <figure><img  src="{{ asset('homepage/images/tentang-wakaf.png') }}" alt="#"/></figure>
                <p>
                    Berdasarkan Undang-undang nomor 41 tahun 2004 tentang Wakaf adalah perbuatan hukum wakif untuk memisahkan dan atau menyerahkan sebagian harta benda miliknya untuk dimanfaatkan selamanya dan untuk jangka waktu tertentu sesuai dengan kepentingannya guna keperluan ibadah dan atau kesejahteraan umum menurut syariah.
                    <br><br><br>
                    <span style="font-size: 25px">يٰٓاَيُّهَا الَّذِيْنَ اٰمَنُوْٓا اَنْفِقُوْا مِنْ طَيِّبٰتِ مَا كَسَبْتُمْ وَمِمَّآ اَخْرَجْنَا لَكُمْ مِّنَ الْاَرْضِ ۗ وَلَا تَيَمَّمُوا الْخَبِيْثَ مِنْهُ تُنْفِقُوْنَ وَلَسْتُمْ بِاٰخِذِيْهِ اِلَّآ اَنْ تُغْمِضُوْا فِيْهِ ۗ وَاعْلَمُوْٓا اَنَّ اللّٰهَ غَنِيٌّ حَمِيْدٌ - ٢٦٧</span>
                    <br>
                    Wahai orang-orang yang beriman! Infakkanlah sebagian dari hasil usahamu yang baik-baik dan sebagian dari apa yang Kami keluarkan dari bumi untukmu. Janganlah kamu memilih yang buruk untuk kamu keluarkan, padahal kamu sendiri tidak mau mengambilnya melainkan dengan memicingkan mata (enggan) terhadapnya. Dan ketahuilah bahwa Allah Mahakaya, Maha Terpuji.
                </p>
             </div>
          </div>
       </div>
    </div>
 </div>
 <!-- end Hosting -->
 <!-- Services  -->
 <div id="tatacara" class="Services">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Tata Cara Wakaf Online</h2>
                <p>Ikuti alur tata cara wakaf online dari kenan hingga ke kiri sesuai nomor urutan
                </p>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
             <div class="Services-box">
                <i class="p-0"><img src="{{ asset('homepage/images/1.png') }}" alt="#"/></i>
                <h3>#1 Isi Data Diri</h3>
                <p>Isi data diri calon wakif dan isi bagian akun anda melalui link /register kemudian cek dan verifikasi Email anda </p>
             </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
             <div class="Services-box">
                <i class="p-0"><img src="{{ asset('homepage/images/2.png') }}" alt="#"/></i>
                <h3>#2 Ajukan Wakaf</h3>
                <p>Setelah masuk, Klik Ajukan wakaf untuk upload berkas persyaratan wakaf yang telah disebutkan sebelumnya</p>
             </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
             <div class="Services-box">
                <i class="p-0"><img src="{{ asset('homepage/images/3.png') }}" alt="#"/></i>
                <h3>#3 Pengecekan Data</h3>
                <p>Petugas KUA akan mengkonfirmasi selanjutnya, jika data yang diupload valid sesuai dengan persyaratan </p>
             </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
             <div class="Services-box">
                <i class="p-0"><img src="{{ asset('homepage/images/4.png') }}" alt="#"/></i>
                <h3>#4 Survei Tempat</h3>
                <p>Petugas juga akan mengirimkan notifikasi berupa email jadwal survei, dan melakukan survei sesuai jadwal</p>
             </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
             <div class="Services-box">
                <i class="p-0"><img src="{{ asset('homepage/images/5.png') }}" alt="#"/></i>
                <h3>#5 Ikrar</h3>
                <p>Petugas juga akan mengirimkan notifikasi beurpa email jadwal ikrar, dan melakukan ikrar sesuai jadwal</p>
             </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
            <div class="Services-box">
               <i class="p-0"><img src="{{ asset('homepage/images/6.png') }}" alt="#"/></i>
               <h3>#6 Akta Ikrar</h3>
               <p>Petugas juga mengirimkan pemberitahuan mengenai akta ikrar yang siap untuk ditanda tangani oleh Wakif</p>
            </div>
         </div>
       </div>
    </div>
 </div>
 <!-- end Servicess -->
 <!-- why -->
 <div id="why" class="why">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="titlepage">
                <h2>Tunggu apa lagi ?</h2>
                <p>
                   Jangan ragu, segera ajukan wakaf melalui aplikasi wakaf online untuk proses yang lebih mudah, terstruktur, dan tentunya tidak memakan banyak waktu
                   selagi menunggu antrian datang. Anda hanya perlu menunggu pemberitahuan mengenai status pengajuan dari petugas selanjutnya anda akan mendapatkan akta wakaf
                </p>
             </div>
          </div>
       </div>
    </div>
 </div>
 <!-- end why -->
@endsection