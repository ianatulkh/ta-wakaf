@extends('adminlte::page')
@section('plugins.BootstrapPlugin', true)

@section('title', 'Edit Pengajuan Anda')

@section('content_header')
<h1>Edit Pengajuan Wakaf</h1>
@stop

@section('content')

<x-alert/>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Identitas Wakif</h3>
    </div>

    <div class="card-body">
        Untuk mengubah data anda sebagai wakif (orang yang mewakafkan tanah) yang sebelumnya telah diisi pada bagian awal yaitu bagian registrasi, silahkan ke halaman <a href="/profile/username">Profile Wakif</a>, sebelum klik link tersebut pastikan anda belum mengisi form dibawah ini untuk menghindari hilangnya data yang telah anda isi
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Berkas Persyaratan Wakaf</h3>
    </div>
        
    <form class="form-horizontal" enctype="multipart/form-data" action="{{ route('wakif.pengajuan-wakaf.update', $berkasWakif->id) }}" method="post">
        @csrf
        @method('PUt')
        
        <div class="card-body">
            <div class="alert alert-warning">
                Silahkan klik upload file kembali jika data ingin diubah, jika tidak ingin diubah abaikan saja, termasuk upload KTP para nadzir
            </div>

            <div class="form-group row">
                <label for="sertifikat_tanah" class="col-sm-2 col-form-label">Sertifikat Tanah Hak Milik</label>
                <div class="col-sm-10">

                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" id="sertifikat_tanah" name="sertifikat_tanah" class="custom-file-input {{ $errors->has('sertifikat_tanah') ? 'is-invalid' : '' }}">
                            <label class="custom-file-label" for="sertifikat_tanah">Pilih File</label></label>
                        </div>
                    </div>
                        
                    @if($errors->has('sertifikat_tanah'))
                        <span id="sertifikat_tanah-error" class="invalid-feedback d-block">
                            <strong>{{ $errors->first('sertifikat_tanah') }}</strong>
                        </span>
                    @endif

                    <small>Sertifikat tanah hak milik atau bukti kepemilikan tanah harus berupa PDF, dan maksimal berukuran 10 MB</small>
                </div>
            </div>

            <div class="form-group row">
                <label for="sktts" class="col-sm-2 col-form-label">Surat Keterangan Tanah Tidak Sengketa</label>
                <div class="col-sm-10">

                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" id="sktts" name="sktts" class="custom-file-input {{ $errors->has('sktts') ? 'is-invalid' : '' }}">
                            <label class="custom-file-label" for="sktts">Pilih File</label></label>
                        </div>
                    </div>
                        
                    @if($errors->has('sktts'))
                        <span id="sktts-error" class="invalid-feedback d-block">
                            <strong>{{ $errors->first('sktts') }}</strong>
                        </span>
                    @endif

                    <small>File yang diupload harus di scan dalam bentuk jpg, jpeg, dan png, serta maksimal berukuran 5 MB</small>
                </div>
            </div>

            <div class="form-group row">
                <label for="sppt" class="col-sm-2 col-form-label">SPPT</label>
                <div class="col-sm-10">

                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" id="sppt" name="sppt" class="custom-file-input {{ $errors->has('sppt') ? 'is-invalid' : '' }}">
                            <label class="custom-file-label" for="sppt">Pilih File</label></label>
                        </div>
                    </div>
                        
                    @if($errors->has('sppt'))
                        <span id="sppt-error" class="invalid-feedback d-block">
                            <strong>{{ $errors->first('sppt') }}</strong>
                        </span>
                    @endif

                    <small>File yang diupload harus di scan dalam bentuk jpg, jpeg, dan png, serta maksimal berukuran 5 MB</small>
                </div>
            </div>

        </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Formulir Untuk Keterangan Data Tanah Milik Wakif</h3>
    </div>
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