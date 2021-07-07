@extends('adminlte::page')
@section('plugins.BootstrapPlugin', true)

@section('title', 'Edit Pengajuan Anda')

@section('content_header')
<h1>Edit Tanah Wakaf</h1>
@stop

@section('content')

<x-alert/>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Formulir Untuk Keterangan Data Tanah Milik Wakif</h3>
    </div>
    <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('admin.berkas-wakif.update', $berkasWakif->id) }}" method="post">
        @csrf
        @method('PUt')

        <div class="card-body">
            <div class="row">
                <div class="row col-md-12">
                    <div class="form-group col-md-6">
                        <label for="status_hak_nomor">Status Hak dan Nomor</label>
                        <input type="text" id="status_hak_nomor" name="status_hak_nomor" placeholder="Contonnya ( Tanah Darat )" class="form-control {{ $errors->has('status_hak_nomor') ? 'is-invalid' : '' }}" value="{{ old('status_hak_nomor') ?? $berkasWakif->status_hak_nomor ?? '' }}">
                        @if($errors->has('status_hak_nomor'))
                            <span id="status_hak_nomor-error" class="invalid-feedback">
                                <strong>{{ $errors->first('status_hak_nomor') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="atas_hak_nomor">Atas Hak dan Nomor</label>
                        <input type="text" id="atas_hak_nomor" name="atas_hak_nomor" placeholder="Contohnya ( Persil: 60 Milik Nomor: 1293 )" class="form-control {{ $errors->has('atas_hak_nomor') ? 'is-invalid' : '' }}" value="{{ old('atas_hak_nomor') ?? $berkasWakif->atas_hak_nomor ?? '' }}">
                        @if($errors->has('atas_hak_nomor'))
                            <span id="atas_hak_nomor-error" class="invalid-feedback">
                                <strong>{{ $errors->first('atas_hak_nomor') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="form-group col-md-6">
                        <label for="atas_hak_lain">Atas Hak/Surat Lain (Jika belum bersertifikat)</label>
                        <input type="text" id="atas_hak_lain" name="atas_hak_lain" class="form-control {{ $errors->has('atas_hak_lain') ? 'is-invalid' : '' }}" value="{{ old('atas_hak_lain') ?? $berkasWakif->atas_hak_lain ?? '' }}">
                        @if($errors->has('atas_hak_lain'))
                            <span id="atas_hak_lain-error" class="invalid-feedback">
                                <strong>{{ $errors->first('atas_hak_lain') }}</strong>
                            </span>
                        @endif
                        <small>Kosongkan jika tanah belum bersertifikat</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="luas">Luas Tanah</label>
                        <input type="text" id="luas" name="luas" placeholder="333 M2 ( P:14 L: 32 )" class="form-control {{ $errors->has('luas') ? 'is-invalid' : '' }}" value="{{ old('luas') ?? $berkasWakif->luas ?? '' }}">
                        @if($errors->has('luas'))
                            <span id="luas-error" class="invalid-feedback">
                                <strong>{{ $errors->first('luas') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="form-group col-md-6">
                        <label for="batas_timur">Batas Timur</label>
                        <input type="text" id="batas_timur" name="batas_timur" class="form-control {{ $errors->has('batas_timur') ? 'is-invalid' : '' }}" value="{{ old('batas_timur') ?? $berkasWakif->batas_timur ?? '' }}">
                        @if($errors->has('batas_timur'))
                            <span id="batas_timur-error" class="invalid-feedback">
                                <strong>{{ $errors->first('batas_timur') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="batas_barat">Batas Barat</label>
                        <input type="text" id="batas_barat" name="batas_barat" class="form-control {{ $errors->has('batas_barat') ? 'is-invalid' : '' }}" value="{{ old('batas_barat') ?? $berkasWakif->batas_barat ?? '' }}">
                        @if($errors->has('batas_barat'))
                            <span id="batas_barat-error" class="invalid-feedback">
                                <strong>{{ $errors->first('batas_barat') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="form-group col-md-6">
                        <label for="batas_utara">Batas Utara</label>
                        <input type="text" id="batas_utara" name="batas_utara" class="form-control {{ $errors->has('batas_utara') ? 'is-invalid' : '' }}" value="{{ old('batas_utara') ?? $berkasWakif->batas_utara ?? '' }}">
                        @if($errors->has('batas_utara'))
                            <span id="batas_utara-error" class="invalid-feedback">
                                <strong>{{ $errors->first('batas_utara') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="batas_selatan">Batas Selatan</label>
                        <input type="text" id="batas_selatan" name="batas_selatan" class="form-control {{ $errors->has('batas_selatan') ? 'is-invalid' : '' }}" value="{{ old('batas_selatan') ?? $berkasWakif->batas_selatan ?? '' }}">
                        @if($errors->has('batas_selatan'))
                            <span id="batas_selatan-error" class="invalid-feedback">
                                <strong>{{ $errors->first('batas_selatan') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="form-group col-md-2">
                        <label for="rt">RT</label>
                        <input type="text" id="rt" name="rt" placeholder="0001" class="form-control {{ $errors->has('rt') ? 'is-invalid' : '' }}" value="{{ old('rt') ?? $berkasWakif->rt ?? '' }}">
                        @if($errors->has('rt'))
                            <span id="rt-error" class="invalid-feedback">
                                <strong>{{ $errors->first('rt') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2">
                        <label for="rw">RW</label>
                        <input type="text" id="rw" name="rw" placeholder="0001" class="form-control {{ $errors->has('rw') ? 'is-invalid' : '' }}" value="{{ old('rw') ?? $berkasWakif->rw ?? '' }}">
                        @if($errors->has('rw'))
                            <span id="rw-error" class="invalid-feedback">
                                <strong>{{ $errors->first('rw') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="id_desa">Letak Desa/Kelurahan</label>
                        <select name="id_desa" class="form-control {{ $errors->has('id_desa') ? 'is-invalid' : '' }}" required>
                            <option selected="true" disabled>Pilih Desa</option>
                            @foreach ($desa as $item)
                                <option value="{{ $item->id }}" {{ (old('id_desa') ?? $berkasWakif->id_desa ?? '') == $item->id ? 'selected':'' }}>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('id_desa'))
                            <span id="id_desa-error" class="invalid-feedback">
                                <strong>{{ $errors->first('id_desa') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="keckabprov">Kecamatan - Kabupaten - Provinsi</label>
                        <input type="text" id="keckabprov" name="keckabprov" class="form-control" value="Pulosari - Kab. Pemalang - Jawa Tengah" disabled>
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="form-group col-md-6">
                        <label for="nama_pewasiat">Jika Sebagai Ahli Waris, Atas Nama:</label>
                        <input type="text" id="nama_pewasiat" name="nama_pewasiat" placeholder="Nama yang mewasiatkan wakaf" class="form-control {{ $errors->has('nama_pewasiat') ? 'is-invalid' : '' }}" value="{{ old('nama_pewasiat') ?? $berkasWakif->nama_pewasiat ?? '' }}">
                        @if($errors->has('nama_pewasiat'))
                            <span id="nama_pewasiat-error" class="invalid-feedback">
                                <strong>{{ $errors->first('nama_pewasiat') }}</strong>
                            </span>
                        @endif
                        <small>Kosongkan jika bukan sebagai ahli waris</small>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tahun_diwakafkan">Diwakafkan pada tahun:</label>
                        <input type="text" id="tahun_diwakafkan" name="tahun_diwakafkan" placeholder="Tahun diwakafkan" class="form-control {{ $errors->has('tahun_diwakafkan') ? 'is-invalid' : '' }}" value="{{ old('tahun_diwakafkan') ?? $berkasWakif->tahun_diwakafkan ?? '' }}">
                        @if($errors->has('tahun_diwakafkan'))
                            <span id="tahun_diwakafkan-error" class="invalid-feedback">
                                <strong>{{ $errors->first('tahun_diwakafkan') }}</strong>
                            </span>
                        @endif
                        <small>Kosongkan jika bukan sebagai ahli waris</small>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="keperluan">Untuk Keperluan</label>
                    <input type="text" id="keperluan" name="keperluan" class="form-control {{ $errors->has('keperluan') ? 'is-invalid' : '' }}" value="{{ old('keperluan') ?? $berkasWakif->keperluan ?? '' }}">
                    @if($errors->has('keperluan'))
                        <span id="keperluan-error" class="invalid-feedback">
                            <strong>{{ $errors->first('keperluan') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="card-footer">
            <a href="{{ route('wakif.home') }}" class="btn btn-default">Kembali</a>
            <button type="submit" class="btn loaderClick btn-primary float-right">Kirim Perubahan Ke Petugas KUA</button>
        </div>
    </form>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    $(function () {
      bsCustomFileInput.init();
    });
</script>
@stop