@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
@if (count($wakif->berkasWakif ?? []) < 1)
<div class="alert alert-danger">
    Anda sama sekali belum membuat mengajukan wakaf, Segera membuat pengajuan wakaf baru, silahkan <a href="{{ route('wakif.pengajuan-wakaf.create') }}">klik disini</a>
</div>
@endif

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop