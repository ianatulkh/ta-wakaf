@extends('adminlte::page')

@section('title', 'Dashboard')

    @section('content_header')
    <h1>Dashboard</h1>
    @stop

    @section('content')
    @if (count($wakif->berkasWakif ?? []) < 1)
    <div class="alert alert-danger">
        Anda sama sekali belum mengajukan wakaf (pendaftaran wakaf), Segera membuat pengajuan wakaf baru, silahkan <a class="btn btn-dark text-decoration-none ml-2" href="{{ route('wakif.pengajuan-wakaf.create') }}">Ajukan Tanah Wakaf</a>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <img src="{{ asset('homepage/images/logo_kua.png') }}" alt="" width="100%">
                </div>
                <div class="mr-4"></div>
                <div class="col-md-9 my-auto">
                    <h2>Selamat datang Wakif</h2>
                    <span class="mr-3">
                         Aplikasi ini merupakan aplikasi management tanah wakaf yang dapat digunakan oleh penduduk Kecamatan Pulosari Kabupaten Pemalang Jawa Tengah untuk mempermudah mendaftar tanah wakaf tanah secara online, anda sebagai wakif (pihak yang mewakafkan tanah) dapat mengajukan tanah wakaf pada sistem online kami
                    </span>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop