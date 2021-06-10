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
        Untuk mengubah data anda sebagai wakif (orang yang mewakafkan tanah) yang sebelumnya telah diisi pada bagian awal yaitu bagian registrasi, silahkan ke halaman <a href="/profile">Profile Wakif</a>, sebelum klik link tersebut pastikan anda belum mengisi form dibawah ini untuk menghindari hilangnya data yang telah anda isi
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
                SIlahkan klik upload file kembali jika data ingin diubah, jika tidak ingin diubah abaikan saja, termasuk upload KTP para nadzir
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
                </div>
            </div>

            <div class="form-group row">
                <label for="surat_ukur" class="col-sm-2 col-form-label">Surat Ukur</label>
                <div class="col-sm-10">

                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" id="surat_ukur" name="surat_ukur" class="custom-file-input {{ $errors->has('surat_ukur') ? 'is-invalid' : '' }}">
                            <label class="custom-file-label" for="surat_ukur">Pilih File</label></label>
                        </div>
                    </div>
                        
                    @if($errors->has('surat_ukur'))
                        <span id="surat_ukur-error" class="invalid-feedback d-block">
                            <strong>{{ $errors->first('surat_ukur') }}</strong>
                        </span>
                    @endif
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
                </div>
            </div>

        </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Nadzir Perseorangan</h3>
    </div>

        <div class="card-body">

            <div class="nadzir0">
                <div class="alert alert-dark">
                    <h6 class="mb-0 font-weight-bold"> Nadzir 1 (Ketua)</h6>
                </div>

                <input type="hidden" name="nadzir[1][jabatan]" value="Ketua">

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nama0">Nama</label>
                        <input type="text" id="nama0" name="nadzir[1][nama]" class="form-control {{ $errors->has('nadzir.1.nama') ? 'is-invalid' : '' }}" 
                               placeholder="Nama" value="{{ old('nadzir.1.nama') ?? $nadzir0->nama }}">
                        @if($errors->has('nadzir.1.nama'))
                            <span id="nama0-error" class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.1.nama') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="nik0">NIK</label>
                        <input type="text" id="nik0" name="nadzir[1][nik]" class="form-control {{ $errors->has('nadzir.1.nik') ? 'is-invalid' : '' }}" 
                            placeholder="Nik" value="{{ old('nadzir.1.nik') ?? $nadzir0->nik }}">

                        @if($errors->has('nadzir.1.nik'))
                            <span id="nik0-error" class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.1.nik') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="tempat_lahir0">Tempat Lahir</label>
                        <input id="tempat_lahir0" type="text" name="nadzir[1][tempat_lahir]" class="form-control {{ $errors->has('nadzir.1.tempat_lahir') ? 'is-invalid' : '' }}"
                           value="{{ old('nadzir.1.tempat_lahir') ?? $nadzir0->tempat_lahir }}" placeholder="Tempat Lahir" >
                        @if($errors->has('nadzir.1.tempat_lahir'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.1.tempat_lahir') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="tanggal_lahir0">Tanggal Lahir</label>
                        <input id="tanggal_lahir0" type="date" name="nadzir[1][tanggal_lahir]" class="form-control {{ $errors->has('nadzir.1.tanggal_lahir') ? 'is-invalid' : '' }}"
                           value="{{ old('nadzir.1.tanggal_lahir') ?? $nadzir0->tanggal_lahir }}" placeholder="Tanggal Lahir" >
                        @if($errors->has('nadzir.1.tanggal_lahir'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.1.tanggal_lahir') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="id_agama0">Agama</label>
                        <select name="nadzir[1][id_agama]" class="form-control {{ $errors->has('nadzir.1.id_agama') ? 'is-invalid' : '' }}" >
                            @foreach ($agama as $item)
                                <option value="{{ $item->id }}" {{ (old('nadzir.1.id_agama') ?? $nadzir0->id_agama) == $item->id ? 'selected':'' }}>{{ $item->agama }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('nadzir.1.id_agama'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.1.id_agama') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    {{-- Pendidikan Terakhir field --}}
                    <div class="form-group col-md-4">
                        <label for="id_pendidikan_terakhir0">Pendidikan Terakhir</label>
                        <select name="nadzir[1][id_pendidikan_terakhir]" class="form-control {{ $errors->has('nadzir.1.id_pendidikan_terakhir') ? 'is-invalid' : '' }}" >
                            <option selected="true" disabled>Pilih Pendidikan Terakhir</option>
                            @foreach ($pendidikanTerakhir as $item)
                                <option value="{{ $item->id }}" {{ (old('nadzir.1.id_pendidikan_terakhir') ?? $nadzir0->id_pendidikan_terakhir) == $item->id ? 'selected':'' }}>{{ $item->tingkat }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('nadzir.1.id_pendidikan_terakhir'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.1.id_pendidikan_terakhir') }}</strong>
                            </div>
                        @endif
                    </div>
                
                    {{-- Pekerjaan field --}}
                    <div class="form-group col-md-4">
                        <label for="pekerjaan0">Pekerjaan</label>
                        <input id="pekerjaan0" type="text" name="nadzir[1][pekerjaan]" class="form-control {{ $errors->has('nadzir.1.pekerjaan') ? 'is-invalid' : '' }}"
                               value="{{ old('nadzir.1.pekerjaan') ?? $nadzir0->pekerjaan }}" placeholder="Pekerjaan0" >
                        @if($errors->has('nadzir.1.pekerjaan'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.1.pekerjaan') }}</strong>
                            </div>
                        @endif
                    </div>

                    {{-- Kewarganegaraan field --}}
                    <div class="form-group col-md-4">
                        <label for="kewarganegaraan0">Kewarganegaraan</label>
                        <input id="kewarganegaraan0" type="text" name="nadzir[1][kewarganegaraan]" class="form-control {{ $errors->has('nadzir.1.kewarganegaraan') ? 'is-invalid' : '' }}"
                               value="{{ old('nadzir.1.kewarganegaraan') ?? $nadzir0->kewarganegaraan }}" placeholder="Kewarganegaraan0" >
                        @if($errors->has('nadzir.1.kewarganegaraan'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.1.kewarganegaraan') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    {{-- Desa field --}}
                    <div class="form-group col-md-4">
                        <label for="id_desa0">Pilih Desa</label>
                        <select name="nadzir[1][id_desa]" class="form-control {{ $errors->has('nadzir.1.id_desa') ? 'is-invalid' : '' }}" required>
                            <option selected="true" disabled>Pilih Desa</option>
                            @foreach ($desa as $item)
                                <option value="{{ $item->id }}" {{ (old('nadzir.1.id_desa') ?? $nadzir0->id_desa) == $item->id ? 'selected':'' }}>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('nadzir.1.id_desa'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.1.id_desa') }}</strong>
                            </div>
                        @endif
                    </div>

                    {{-- RT field --}}
                    <div class="form-group col-md-2">
                        <label for="rt0">RT</label>
                        <input id="rt0" type="text" name="nadzir[1][rt]" class="form-control {{ $errors->has('nadzir.1.rt') ? 'is-invalid' : '' }}"
                               value="{{ old('nadzir.1.rt') ?? $nadzir0->rt }}" placeholder="cth: 001" >
                        @if($errors->has('nadzir.1.rt'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.1.rt') }}</strong>
                            </div>
                        @endif
                    </div>

                    {{-- RW field --}}
                    <div class="form-group col-md-2">
                        <label for="rw0">RW</label>
                        <input id="rw0" type="text" name="nadzir[1][rw]" class="form-control {{ $errors->has('nadzir.1.rw') ? 'is-invalid' : '' }}"
                               value="{{ old('nadzir.1.rw') ?? $nadzir0->rw }}" placeholder="cth: 001" >
                        @if($errors->has('nadzir.1.rw'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.1.rw') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="wilayah">Kec - Kab - Prov</label>
                        <input type="text" class="form-control"
                           value="Pulosari - Kab. Pemalang - Jawa Tengah" disabled>
                    </div>

                </div>

                <div class="form-group row">
                    <label for="ktp0" class="col-sm-2 col-form-label">KTP Nadzir</label>
                    <div class="col-sm-10">

                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" id="ktp0" name="nadzir[1][ktp]" class="custom-file-input {{ $errors->has('nadzir.1.ktp') ? 'is-invalid' : '' }}">
                                <label class="custom-file-label" for="ktp0">Pilih File</label></label>
                            </div>
                        </div>
                        
                        @if($errors->has('nadzir.1.ktp'))
                            <span id="ktp0-error" class="invalid-feedback d-block">
                                <strong>{{ $errors->first('nadzir.1.ktp') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="nadzir1">
                <div class="alert alert-dark">
                    <h6 class="mb-0 font-weight-bold"> Nadzir 2 (Sekretaris)</h6>
                </div>

                <input type="hidden" name="nadzir[2][jabatan]" value="Sekretaris">
                
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nama1">Nama</label>
                        <input type="text" id="nama1" name="nadzir[2][nama]" class="form-control {{ $errors->has('nadzir.2.nama') ? 'is-invalid' : '' }}" 
                               placeholder="Nama" value="{{ old('nadzir.2.nama') ?? $nadzir1->nama }}">
                        @if($errors->has('nadzir.2.nama'))
                            <span id="nama1-error" class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.2.nama') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="nik1">NIK</label>
                        <input type="text" id="nik1" name="nadzir[2][nik]" class="form-control {{ $errors->has('nadzir.2.nik') ? 'is-invalid' : '' }}" 
                            placeholder="Nik" value="{{ old('nadzir.2.nik') ?? $nadzir1->nik }}">

                        @if($errors->has('nadzir.2.nik'))
                            <span id="nik1-error" class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.2.nik') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="tempat_lahir1">Tempat Lahir</label>
                        <input id="tempat_lahir1" type="text" name="nadzir[2][tempat_lahir]" class="form-control {{ $errors->has('nadzir.2.tempat_lahir') ? 'is-invalid' : '' }}"
                           value="{{ old('nadzir.2.tempat_lahir') ?? $nadzir1->tempat_lahir }}" placeholder="Tempat Lahir" >
                        @if($errors->has('nadzir.2.tempat_lahir'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.2.tempat_lahir') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="tanggal_lahir1">Tanggal Lahir</label>
                        <input id="tanggal_lahir1" type="date" name="nadzir[2][tanggal_lahir]" class="form-control {{ $errors->has('nadzir.2.tanggal_lahir') ? 'is-invalid' : '' }}"
                           value="{{ old('nadzir.2.tanggal_lahir') ?? $nadzir1->tanggal_lahir }}" placeholder="Tanggal Lahir" >
                        @if($errors->has('nadzir.2.tanggal_lahir'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.2.tanggal_lahir') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="id_agama1">Agama</label>
                        <select name="nadzir[2][id_agama]" class="form-control {{ $errors->has('nadzir.2.id_agama') ? 'is-invalid' : '' }}" >
                            @foreach ($agama as $item)
                                <option value="{{ $item->id }}" {{ (old('nadzir.2.id_agama') ?? $nadzir1->id_agama) == $item->id ? 'selected':'' }}>{{ $item->agama }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('nadzir.2.id_agama'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.2.id_agama') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    {{-- Pendidikan Terakhir field --}}
                    <div class="form-group col-md-4">
                        <label for="id_pendidikan_terakhir1">Pendidikan Terakhir</label>
                        <select name="nadzir[2][id_pendidikan_terakhir]" class="form-control {{ $errors->has('nadzir.2.id_pendidikan_terakhir') ? 'is-invalid' : '' }}" >
                            <option selected="true" disabled>Pilih Pendidikan Terakhir</option>
                            @foreach ($pendidikanTerakhir as $item)
                                <option value="{{ $item->id }}" {{ (old('nadzir.2.id_pendidikan_terakhir') ?? $nadzir1->id_pendidikan_terakhir) == $item->id ? 'selected':'' }}>{{ $item->tingkat }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('nadzir.2.id_pendidikan_terakhir'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.2.id_pendidikan_terakhir') }}</strong>
                            </div>
                        @endif
                    </div>
                
                    {{-- Pekerjaan field --}}
                    <div class="form-group col-md-4">
                        <label for="pekerjaan1">Pekerjaan</label>
                        <input id="pekerjaan1" type="text" name="nadzir[2][pekerjaan]" class="form-control {{ $errors->has('nadzir.2.pekerjaan') ? 'is-invalid' : '' }}"
                               value="{{ old('nadzir.2.pekerjaan') ?? $nadzir1->pekerjaan }}" placeholder="Pekerjaan1" >
                        @if($errors->has('nadzir.2.pekerjaan'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.2.pekerjaan') }}</strong>
                            </div>
                        @endif
                    </div>

                    {{-- Kewarganegaraan field --}}
                    <div class="form-group col-md-4">
                        <label for="kewarganegaraan1">Kewarganegaraan</label>
                        <input id="kewarganegaraan1" type="text" name="nadzir[2][kewarganegaraan]" class="form-control {{ $errors->has('nadzir.2.kewarganegaraan') ? 'is-invalid' : '' }}"
                               value="{{ old('nadzir.2.kewarganegaraan') ?? $nadzir1->kewarganegaraan}}" placeholder="Kewarganegaraan1" >
                        @if($errors->has('nadzir.2.kewarganegaraan'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.2.kewarganegaraan') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    {{-- Desa field --}}
                    <div class="form-group col-md-4">
                        <label for="id_desa1">Pilih Desa</label>
                        <select name="nadzir[2][id_desa]" class="form-control {{ $errors->has('nadzir.2.id_desa') ? 'is-invalid' : '' }}" required>
                            <option selected="true" disabled>Pilih Desa</option>
                            @foreach ($desa as $item)
                                <option value="{{ $item->id }}" {{ (old('nadzir.2.id_desa') ?? $nadzir1->id_desa) == $item->id ? 'selected':'' }}>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('nadzir.2.id_desa'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.2.id_desa') }}</strong>
                            </div>
                        @endif
                    </div>

                    {{-- RT field --}}
                    <div class="form-group col-md-2">
                        <label for="rt1">RT</label>
                        <input id="rt1" type="text" name="nadzir[2][rt]" class="form-control {{ $errors->has('nadzir.2.rt') ? 'is-invalid' : '' }}"
                               value="{{ old('nadzir.2.rt') ?? $nadzir1->rt }}" placeholder="cth: 001" >
                        @if($errors->has('nadzir.2.rt'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.2.rt') }}</strong>
                            </div>
                        @endif
                    </div>

                    {{-- RW field --}}
                    <div class="form-group col-md-2">
                        <label for="rw1">RW</label>
                        <input id="rw1" type="text" name="nadzir[2][rw]" class="form-control {{ $errors->has('nadzir.2.rw') ? 'is-invalid' : '' }}"
                               value="{{ old('nadzir.2.rw') ?? $nadzir1->rw }}" placeholder="cth: 001" >
                        @if($errors->has('nadzir.2.rw'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.2.rw') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="wilayah">Kec - Kab - Prov</label>
                        <input type="text" class="form-control"
                           value="Pulosari - Kab. Pemalang - Jawa Tengah" disabled>
                    </div>

                </div>

                <div class="form-group row">
                    <label for="ktp1" class="col-sm-2 col-form-label">KTP Nadzir</label>
                    <div class="col-sm-10">

                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" id="ktp1" name="nadzir[2][ktp]" class="custom-file-input {{ $errors->has('nadzir.2.ktp') ? 'is-invalid' : '' }}">
                                <label class="custom-file-label" for="ktp1">Pilih File</label></label>
                            </div>
                        </div>
                        
                        @if($errors->has('nadzir.2.ktp'))
                            <span id="ktp1-error" class="invalid-feedback d-block">
                                <strong>{{ $errors->first('nadzir.2.ktp') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="nadzir>2">
                <div class="alert alert-dark">
                    <h6 class="mb-0 font-weight-bold"> Nadzir 3 (Bendahara)</h6>
                </div>

                <input type="hidden" name="nadzir[3][jabatan]" value="Bendahara">

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nama2">Nama</label>
                        <input type="text" id="nama2" name="nadzir[3][nama]" class="form-control {{ $errors->has('nadzir.3.nama') ? 'is-invalid' : '' }}" 
                               placeholder="Nama" value="{{ old('nadzir.3.nama') ?? $nadzir2->nama }}">
                        @if($errors->has('nadzir.3.nama'))
                            <span id="nama2-error" class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.3.nama') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="nik2">NIK</label>
                        <input type="text" id="nik2" name="nadzir[3][nik]" class="form-control {{ $errors->has('nadzir.3.nik') ? 'is-invalid' : '' }}" 
                            placeholder="Nik" value="{{ old('nadzir.3.nik') ?? $nadzir2->nik }}">

                        @if($errors->has('nadzir.3.nik'))
                            <span id="nik2-error" class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.3.nik') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="tempat_lahir2">Tempat Lahir</label>
                        <input id="tempat_lahir2" type="text" name="nadzir[3][tempat_lahir]" class="form-control {{ $errors->has('nadzir.3.tempat_lahir') ? 'is-invalid' : '' }}"
                           value="{{ old('nadzir.3.tempat_lahir') ?? $nadzir2->tempat_lahir }}" placeholder="Tempat Lahir" >
                        @if($errors->has('nadzir.3.tempat_lahir'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.3.tempat_lahir') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="tanggal_lahir2">Tanggal Lahir</label>
                        <input id="tanggal_lahir2" type="date" name="nadzir[3][tanggal_lahir]" class="form-control {{ $errors->has('nadzir.3.tanggal_lahir') ? 'is-invalid' : '' }}"
                           value="{{ old('nadzir.3.tanggal_lahir') ?? $nadzir2->tanggal_lahir }}" placeholder="Tanggal Lahir" >
                        @if($errors->has('nadzir.3.tanggal_lahir'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.3.tanggal_lahir') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="id_agama2">Agama</label>
                        <select name="nadzir[3][id_agama]" class="form-control {{ $errors->has('nadzir.3.id_agama') ? 'is-invalid' : '' }}" >
                            @foreach ($agama as $item)
                                <option value="{{ $item->id }}" {{ (old('nadzir.3.id_agama') ?? $nadzir2->id_agama) == $item->id ? 'selected':'' }}>{{ $item->agama }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('nadzir.3.id_agama'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.3.id_agama') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    {{-- Pendidikan Terakhir field --}}
                    <div class="form-group col-md-4">
                        <label for="id_pendidikan_terakhir2">Pendidikan Terakhir</label>
                        <select name="nadzir[3][id_pendidikan_terakhir]" class="form-control {{ $errors->has('nadzir.3.id_pendidikan_terakhir') ? 'is-invalid' : '' }}" >
                            <option selected="true" disabled>Pilih Pendidikan Terakhir</option>
                            @foreach ($pendidikanTerakhir as $item)
                                <option value="{{ $item->id }}" {{ (old('nadzir.3.id_pendidikan_terakhir') ?? $nadzir2->id_pendidikan_terakhir) == $item->id ? 'selected':'' }}>{{ $item->tingkat }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('nadzir.3.id_pendidikan_terakhir'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.3.id_pendidikan_terakhir') }}</strong>
                            </div>
                        @endif
                    </div>
                
                    {{-- Pekerjaan field --}}
                    <div class="form-group col-md-4">
                        <label for="pekerjaan2">Pekerjaan</label>
                        <input id="pekerjaan2" type="text" name="nadzir[3][pekerjaan]" class="form-control {{ $errors->has('nadzir.3.pekerjaan') ? 'is-invalid' : '' }}"
                               value="{{ old('nadzir.3.pekerjaan') ?? $nadzir2->pekerjaan }}" placeholder="Pekerjaan2" >
                        @if($errors->has('nadzir.3.pekerjaan'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.3.pekerjaan') }}</strong>
                            </div>
                        @endif
                    </div>

                    {{-- Kewarganegaraan field --}}
                    <div class="form-group col-md-4">
                        <label for="kewarganegaraan2">Kewarganegaraan</label>
                        <input id="kewarganegaraan2" type="text" name="nadzir[3][kewarganegaraan]" class="form-control {{ $errors->has('nadzir.3.kewarganegaraan') ? 'is-invalid' : '' }}"
                               value="{{ old('nadzir.3.kewarganegaraan') ?? $nadzir2->kewarganegaraan}}" placeholder="Kewarganegaraan2" >
                        @if($errors->has('nadzir.3.kewarganegaraan'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.3.kewarganegaraan') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    {{-- Desa field --}}
                    <div class="form-group col-md-4">
                        <label for="id_desa2">Pilih Desa</label>
                        <select name="nadzir[3][id_desa]" class="form-control {{ $errors->has('nadzir.3.id_desa') ? 'is-invalid' : '' }}" required>
                            <option selected="true" disabled>Pilih Desa</option>
                            @foreach ($desa as $item)
                                <option value="{{ $item->id }}" {{ (old('nadzir.3.id_desa') ?? $nadzir2->id_desa) == $item->id ? 'selected':'' }}>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('nadzir.3.id_desa'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.3.id_desa') }}</strong>
                            </div>
                        @endif
                    </div>

                    {{-- RT field --}}
                    <div class="form-group col-md-2">
                        <label for="rt2">RT</label>
                        <input id="rt2" type="text" name="nadzir[3][rt]" class="form-control {{ $errors->has('nadzir.3.rt') ? 'is-invalid' : '' }}"
                               value="{{ old('nadzir.3.rt') ?? $nadzir2->rt }}" placeholder="cth: 001" >
                        @if($errors->has('nadzir.3.rt'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.3.rt') }}</strong>
                            </div>
                        @endif
                    </div>

                    {{-- RW field --}}
                    <div class="form-group col-md-2">
                        <label for="rw2">RW</label>
                        <input id="rw2" type="text" name="nadzir[3][rw]" class="form-control {{ $errors->has('nadzir.3.rw') ? 'is-invalid' : '' }}"
                               value="{{ old('nadzir.3.rw') ?? $nadzir2->rw }}" placeholder="cth: 001" >
                        @if($errors->has('nadzir.3.rw'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.3.rw') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="wilayah">Kec - Kab - Prov</label>
                        <input type="text" class="form-control"
                           value="Pulosari - Kab. Pemalang - Jawa Tengah" disabled>
                    </div>

                </div>

                <div class="form-group row">
                    <label for="ktp2" class="col-sm-2 col-form-label">KTP Nadzir</label>
                    <div class="col-sm-10">

                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" id="ktp2" name="nadzir[3][ktp]" class="custom-file-input {{ $errors->has('nadzir.3.ktp') ? 'is-invalid' : '' }}">
                                <label class="custom-file-label" for="ktp2">Pilih File</label></label>
                            </div>
                        </div>
                        
                        @if($errors->has('nadzir.3.ktp'))
                            <span id="ktp2-error" class="invalid-feedback d-block">
                                <strong>{{ $errors->first('nadzir.3.ktp') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="nadzir3">
                <div class="alert alert-dark">
                    <h6 class="mb-0 font-weight-bold"> Nadzir 4 (Anggota)</h6>
                </div>

                <input type="hidden" name="nadzir[4][jabatan]" value="Anggota">

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nama3">Nama</label>
                        <input type="text" id="nama3" name="nadzir[4][nama]" class="form-control {{ $errors->has('nadzir.4.nama') ? 'is-invalid' : '' }}" 
                               placeholder="Nama" value="{{ old('nadzir.4.nama') ?? $nadzir3->nama }}">
                        @if($errors->has('nadzir.4.nama'))
                            <span id="nama3-error" class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.4.nama') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="nik3">NIK</label>
                        <input type="text" id="nik3" name="nadzir[4][nik]" class="form-control {{ $errors->has('nadzir.4.nik') ? 'is-invalid' : '' }}" 
                            placeholder="Nik" value="{{ old('nadzir.4.nik') ?? $nadzir3->nik }}">

                        @if($errors->has('nadzir.4.nik'))
                            <span id="nik3-error" class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.4.nik') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="tempat_lahir3">Tempat Lahir</label>
                        <input id="tempat_lahir3" type="text" name="nadzir[4][tempat_lahir]" class="form-control {{ $errors->has('nadzir.4.tempat_lahir') ? 'is-invalid' : '' }}"
                           value="{{ old('nadzir.4.tempat_lahir') ?? $nadzir3->tempat_lahir }}" placeholder="Tempat Lahir" >
                        @if($errors->has('nadzir.4.tempat_lahir'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.4.tempat_lahir') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="tanggal_lahir3">Tanggal Lahir</label>
                        <input id="tanggal_lahir3" type="date" name="nadzir[4][tanggal_lahir]" class="form-control {{ $errors->has('nadzir.4.tanggal_lahir') ? 'is-invalid' : '' }}"
                           value="{{ old('nadzir.4.tanggal_lahir') ?? $nadzir3->tanggal_lahir }}" placeholder="Tanggal Lahir" >
                        @if($errors->has('nadzir.4.tanggal_lahir'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.4.tanggal_lahir') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="id_agama3">Agama</label>
                        <select name="nadzir[4][id_agama]" class="form-control {{ $errors->has('nadzir.4.id_agama') ? 'is-invalid' : '' }}" >
                            @foreach ($agama as $item)
                                <option value="{{ $item->id }}" {{ (old('nadzir.4.id_agama') ?? $nadzir3->id_agama) == $item->id ? 'selected':'' }}>{{ $item->agama }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('nadzir.4.id_agama'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.4.id_agama') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    {{-- Pendidikan Terakhir field --}}
                    <div class="form-group col-md-4">
                        <label for="id_pendidikan_terakhir3">Pendidikan Terakhir</label>
                        <select name="nadzir[4][id_pendidikan_terakhir]" class="form-control {{ $errors->has('nadzir.4.id_pendidikan_terakhir') ? 'is-invalid' : '' }}" >
                            <option selected="true" disabled>Pilih Pendidikan Terakhir</option>
                            @foreach ($pendidikanTerakhir as $item)
                                <option value="{{ $item->id }}" {{ (old('nadzir.4.id_pendidikan_terakhir') ?? $nadzir3->id_pendidikan_terakhir) == $item->id ? 'selected':'' }}>{{ $item->tingkat }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('nadzir.4.id_pendidikan_terakhir'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.4.id_pendidikan_terakhir') }}</strong>
                            </div>
                        @endif
                    </div>
                
                    {{-- Pekerjaan field --}}
                    <div class="form-group col-md-4">
                        <label for="pekerjaan3">Pekerjaan</label>
                        <input id="pekerjaan3" type="text" name="nadzir[4][pekerjaan]" class="form-control {{ $errors->has('nadzir.4.pekerjaan') ? 'is-invalid' : '' }}"
                               value="{{ old('nadzir.4.pekerjaan') ?? $nadzir3->pekerjaan }}" placeholder="Pekerjaan3" >
                        @if($errors->has('nadzir.4.pekerjaan'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.4.pekerjaan') }}</strong>
                            </div>
                        @endif
                    </div>

                    {{-- Kewarganegaraan field --}}
                    <div class="form-group col-md-4">
                        <label for="kewarganegaraan3">Kewarganegaraan</label>
                        <input id="kewarganegaraan3" type="text" name="nadzir[4][kewarganegaraan]" class="form-control {{ $errors->has('nadzir.4.kewarganegaraan') ? 'is-invalid' : '' }}"
                               value="{{ old('nadzir.4.kewarganegaraan') ?? $nadzir3->kewarganegaraan}}" placeholder="Kewarganegaraan3" >
                        @if($errors->has('nadzir.4.kewarganegaraan'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.4.kewarganegaraan') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    {{-- Desa field --}}
                    <div class="form-group col-md-4">
                        <label for="id_desa3">Pilih Desa</label>
                        <select name="nadzir[4][id_desa]" class="form-control {{ $errors->has('nadzir.4.id_desa') ? 'is-invalid' : '' }}" required>
                            <option selected="true" disabled>Pilih Desa</option>
                            @foreach ($desa as $item)
                                <option value="{{ $item->id }}" {{ (old('nadzir.4.id_desa') ?? $nadzir3->id_desa) == $item->id ? 'selected':'' }}>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('nadzir.4.id_desa'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.4.id_desa') }}</strong>
                            </div>
                        @endif
                    </div>

                    {{-- RT field --}}
                    <div class="form-group col-md-2">
                        <label for="rt3">RT</label>
                        <input id="rt3" type="text" name="nadzir[4][rt]" class="form-control {{ $errors->has('nadzir.4.rt') ? 'is-invalid' : '' }}"
                               value="{{ old('nadzir.4.rt') ?? $nadzir3->rt }}" placeholder="cth: 001" >
                        @if($errors->has('nadzir.4.rt'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.4.rt') }}</strong>
                            </div>
                        @endif
                    </div>

                    {{-- RW field --}}
                    <div class="form-group col-md-2">
                        <label for="rw3">RW</label>
                        <input id="rw3" type="text" name="nadzir[4][rw]" class="form-control {{ $errors->has('nadzir.4.rw') ? 'is-invalid' : '' }}"
                               value="{{ old('nadzir.4.rw') ?? $nadzir3->rw }}" placeholder="cth: 001" >
                        @if($errors->has('nadzir.4.rw'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.4.rw') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="wilayah">Kec - Kab - Prov</label>
                        <input type="text" class="form-control"
                           value="Pulosari - Kab. Pemalang - Jawa Tengah" disabled>
                    </div>

                </div>

                <div class="form-group row">
                    <label for="ktp3" class="col-sm-2 col-form-label">KTP Nadzir</label>
                    <div class="col-sm-10">

                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" id="ktp3" name="nadzir[4][ktp]" class="custom-file-input {{ $errors->has('nadzir.4.ktp') ? 'is-invalid' : '' }}">
                                <label class="custom-file-label" for="ktp3">Pilih File</label></label>
                            </div>
                        </div>
                        
                        @if($errors->has('nadzir.4.ktp'))
                            <span id="ktp3-error" class="invalid-feedback d-block">
                                <strong>{{ $errors->first('nadzir.4.ktp') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="nadzir4">
                <div class="alert alert-dark">
                    <h6 class="mb-0 font-weight-bold"> Nadzir 5 (Anggota)</h6>
                </div>

                <input type="hidden" name="nadzir[5][jabatan]" value="Anggota">

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nama4">Nama</label>
                        <input type="text" id="nama4" name="nadzir[5][nama]" class="form-control {{ $errors->has('nadzir.5.nama') ? 'is-invalid' : '' }}" 
                               placeholder="Nama" value="{{ old('nadzir.5.nama') ?? $nadzir4->nama }}">
                        @if($errors->has('nadzir.5.nama'))
                            <span id="nama4-error" class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.5.nama') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="nik4">NIK</label>
                        <input type="text" id="nik4" name="nadzir[5][nik]" class="form-control {{ $errors->has('nadzir.5.nik') ? 'is-invalid' : '' }}" 
                            placeholder="Nik" value="{{ old('nadzir.5.nik') ?? $nadzir4->nik }}">

                        @if($errors->has('nadzir.5.nik'))
                            <span id="nik4-error" class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.5.nik') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="tempat_lahir4">Tempat Lahir</label>
                        <input id="tempat_lahir4" type="text" name="nadzir[5][tempat_lahir]" class="form-control {{ $errors->has('nadzir.5.tempat_lahir') ? 'is-invalid' : '' }}"
                           value="{{ old('nadzir.5.tempat_lahir') ?? $nadzir4->tempat_lahir }}" placeholder="Tempat Lahir" >
                        @if($errors->has('nadzir.5.tempat_lahir'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.5.tempat_lahir') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="tanggal_lahir4">Tanggal Lahir</label>
                        <input id="tanggal_lahir4" type="date" name="nadzir[5][tanggal_lahir]" class="form-control {{ $errors->has('nadzir.5.tanggal_lahir') ? 'is-invalid' : '' }}"
                           value="{{ old('nadzir.5.tanggal_lahir') ?? $nadzir4->tanggal_lahir }}" placeholder="Tanggal Lahir" >
                        @if($errors->has('nadzir.5.tanggal_lahir'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.5.tanggal_lahir') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="id_agama4">Agama</label>
                        <select name="nadzir[5][id_agama]" class="form-control {{ $errors->has('nadzir.5.id_agama') ? 'is-invalid' : '' }}" >
                            @foreach ($agama as $item)
                                <option value="{{ $item->id }}" {{ (old('nadzir.5.id_agama') ?? $nadzir4->id_agama) == $item->id ? 'selected':'' }}>{{ $item->agama }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('nadzir.5.id_agama'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.5.id_agama') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    {{-- Pendidikan Terakhir field --}}
                    <div class="form-group col-md-4">
                        <label for="id_pendidikan_terakhir4">Pendidikan Terakhir</label>
                        <select name="nadzir[5][id_pendidikan_terakhir]" class="form-control {{ $errors->has('nadzir.5.id_pendidikan_terakhir') ? 'is-invalid' : '' }}" >
                            <option selected="true" disabled>Pilih Pendidikan Terakhir</option>
                            @foreach ($pendidikanTerakhir as $item)
                                <option value="{{ $item->id }}" {{ (old('nadzir.5.id_pendidikan_terakhir') ?? $nadzir4->id_pendidikan_terakhir) == $item->id ? 'selected':'' }}>{{ $item->tingkat }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('nadzir.5.id_pendidikan_terakhir'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.5.id_pendidikan_terakhir') }}</strong>
                            </div>
                        @endif
                    </div>
                
                    {{-- Pekerjaan field --}}
                    <div class="form-group col-md-4">
                        <label for="pekerjaan4">Pekerjaan</label>
                        <input id="pekerjaan4" type="text" name="nadzir[5][pekerjaan]" class="form-control {{ $errors->has('nadzir.5.pekerjaan') ? 'is-invalid' : '' }}"
                               value="{{ old('nadzir.5.pekerjaan') ?? $nadzir4->pekerjaan }}" placeholder="Pekerjaan4">
                        @if($errors->has('nadzir.5.pekerjaan'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.5.pekerjaan') }}</strong>
                            </div>
                        @endif
                    </div>

                    {{-- Kewarganegaraan field --}}
                    <div class="form-group col-md-4">
                        <label for="kewarganegaraan4">Kewarganegaraan</label>
                        <input id="kewarganegaraan4" type="text" name="nadzir[5][kewarganegaraan]" class="form-control {{ $errors->has('nadzir.5.kewarganegaraan') ? 'is-invalid' : '' }}"
                               value="{{ old('nadzir.5.kewarganegaraan') ?? $nadzir4->kewarganegaraan}}" placeholder="Kewarganegaraan4" >
                        @if($errors->has('nadzir.5.kewarganegaraan'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.5.kewarganegaraan') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    {{-- Desa field --}}
                    <div class="form-group col-md-4">
                        <label for="id_desa4">Pilih Desa</label>
                        <select name="nadzir[5][id_desa]" class="form-control {{ $errors->has('nadzir.5.id_desa') ? 'is-invalid' : '' }}" required>
                            <option selected="true" disabled>Pilih Desa</option>
                            @foreach ($desa as $item)
                                <option value="{{ $item->id }}" {{ (old('nadzir.5.id_desa') ?? $nadzir4->id_desa) == $item->id ? 'selected':'' }}>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('nadzir.5.id_desa'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.5.id_desa') }}</strong>
                            </div>
                        @endif
                    </div>

                    {{-- RT field --}}
                    <div class="form-group col-md-2">
                        <label for="rt4">RT</label>
                        <input id="rt4" type="text" name="nadzir[5][rt]" class="form-control {{ $errors->has('nadzir.5.rt') ? 'is-invalid' : '' }}"
                               value="{{ old('nadzir.5.rt') ?? $nadzir4->rt }}" placeholder="cth: 001" >
                        @if($errors->has('nadzir.5.rt'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.5.rt') }}</strong>
                            </div>
                        @endif
                    </div>

                    {{-- RW field --}}
                    <div class="form-group col-md-2">
                        <label for="rw4">RW</label>
                        <input id="rw4" type="text" name="nadzir[5][rw]" class="form-control {{ $errors->has('nadzir.5.rw') ? 'is-invalid' : '' }}"
                               value="{{ old('nadzir.5.rw') ?? $nadzir4->rw }}" placeholder="cth: 001" >
                        @if($errors->has('nadzir.5.rw'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('nadzir.5.rw') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="wilayah">Kec - Kab - Prov</label>
                        <input type="text" class="form-control"
                           value="Pulosari - Kab. Pemalang - Jawa Tengah" disabled>
                    </div>

                </div>

                <div class="form-group row">
                    <label for="ktp4" class="col-sm-2 col-form-label">KTP Nadzir</label>
                    <div class="col-sm-10">

                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" id="ktp4" name="nadzir[5][ktp]" class="custom-file-input {{ $errors->has('nadzir.5.ktp') ? 'is-invalid' : '' }}">
                                <label class="custom-file-label" for="ktp4">Pilih File</label></label>
                            </div>
                        </div>
                        
                        @if($errors->has('nadzir.5.ktp'))
                            <span id="ktp4-error" class="invalid-feedback d-block">
                                <strong>{{ $errors->first('nadzir.5.ktp') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>            

        </div>
        
        <div class="card-footer">
            <a href="{{ route('wakif.home') }}" class="btn btn-default">Kembali</a>
            <button type="submit" class="btn btn-primary float-right">Ajukan Perubahan</button>
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