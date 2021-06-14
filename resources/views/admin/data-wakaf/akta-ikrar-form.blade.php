@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)
@section('plugins.BootstrapPlugin', true)

@section('title', 'Pengajuan Tahap Pembuatan Ikrar')

@section('content_header')
<h1>Formulir Pembuatan Akta Ikrar</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body table-responsive mr-2">

        <x-alert/>

        <form action="{{ ($aktaIkrar) ? route('admin.cetak-akta-ikrar.update', $aktaIkrar->id) : route('admin.cetak-akta-ikrar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($aktaIkrar)
                @method('PUT')
            @else
                @method('POST')
            @endif

            <input type="hidden" name="id_berkas_wakif" value="{{ $berkasWakif->id }}">
            {{-- FORMULIR BAGI WAKIF ORGANISASI / BERBADAN HUKUM --}}
            @php
                $jabatan = ['Organisasi','Badan Hukum'];
                $bertindak = ['Perseorangan','Organisasi','Badan Hukum'];
            @endphp

            <div class="row">
                <div class="form-group col-md-3">
                    <label for="wakif_jabatan">Jabatan Wakif</label>
                    <select name="wakif_jabatan" class="form-control {{ $errors->has('wakif_jabatan') ? 'is-invalid' : '' }}" >
                        <option value="">Pilih Jabatan</option>
                        @foreach ($jabatan as $item)
                            <option value="{{ $item }}" {{ (old('wakif_jabatan') ?? $aktaIkrar->wakif_jabatan ?? '') == $item ? 'selected':'' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('wakif_jabatan'))
                        <span id="wakif_jabatan-error" class="invalid-feedback">
                            <strong>{{ $errors->first('wakif_jabatan') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group col-md-3">
                    <label for="wakif_bertindak">Bertindak Atas Nama Wakif</label>
                    <select name="wakif_bertindak" class="form-control {{ $errors->has('wakif_bertindak') ? 'is-invalid' : '' }}" >
                        <option value="" disabled selected>Pilih Atas</option>
                        @foreach ($jabatan as $item)
                            <option value="{{ $item }}" {{ (old('wakif_bertindak') ?? $aktaIkrar->wakif_bertindak ?? '') == $item ? 'selected':'' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('wakif_bertindak'))
                        <span id="wakif_bertindak-error" class="invalid-feedback">
                            <strong>{{ $errors->first('wakif_bertindak') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group col-md-3">
                    <label for="saksi_jabatan">Jabatan Nadzir</label>
                    <select name="nadzir_jabatan" class="form-control {{ $errors->has('nadzir_jabatan') ? 'is-invalid' : '' }}" >
                        <option value="" >Pilih Atas</option>
                        @foreach ($jabatan as $item)
                            <option value="{{ $item }}" {{ (old('nadzir_jabatan') ?? $aktaIkrar->nadzir_jabatan ?? '') == $item ? 'selected':'' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('nadzir_jabatan'))
                        <span id="nadzir_jabatan-error" class="invalid-feedback">
                            <strong>{{ $errors->first('nadzir_jabatan') }}</strong>
                        </span>
                    @endif
                    <small>Nadzir KETUA</small>
                </div>
                <div class="form-group col-md-3">
                    <label for="nadzir_bertindak">Bertindak Atas Nama Nadzir</label>
                    <select name="nadzir_bertindak" class="form-control {{ $errors->has('nadzir_bertindak') ? 'is-invalid' : '' }}" >
                        <option value="" disabled selected>Pilih Atas</option>
                        @foreach ($jabatan as $item)
                            <option value="{{ $item }}" {{ (old('nadzir_bertindak') ?? $aktaIkrar->nadzir_bertindak ?? '') == $item ? 'selected':'' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('nadzir_bertindak'))
                        <span id="nadzir_bertindak-error" class="invalid-feedback">
                            <strong>{{ $errors->first('nadzir_bertindak') }}</strong>
                        </span>
                    @endif
                    <small>Nadzir KETUA</small>
                </div>
            </div>

            {{-- FORMULIR UNTUK KETERANGAN SEBIDANG TANAH WAKIF --}}
            <div class="alert alert-dark">
                Keterangan Sebidang Tanah yang di Wakafkan Wakif <a class="btn btn-info text-decoration-none ml-2" target="_blank" href="{{ route('admin.berkas-wakif.show', $berkasWakif->id) }}">Lihat berkas wakif</a>
            </div>
            <div class="row">
                <div class="row col-md-12">
                    <div class="form-group col-md-6">
                        <label for="nomor">Nomor Akta</label>
                        <input type="text" id="nomor" name="nomor" class="form-control {{ $errors->has('nomor') ? 'is-invalid' : '' }}" value="{{ old('nomor') ?? $aktaIkrar->nomor ?? '' }}">
                        @if($errors->has('nomor'))
                            <span id="nomor-error" class="invalid-feedback">
                                <strong>{{ $errors->first('nomor') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="status_hak_nomor">Status Hak dan Nomor</label>
                        <input type="text" id="status_hak_nomor" name="status_hak_nomor" class="form-control {{ $errors->has('status_hak_nomor') ? 'is-invalid' : '' }}" value="{{ old('status_hak_nomor') ?? $aktaIkrar->status_hak_nomor ?? '' }}">
                        @if($errors->has('status_hak_nomor'))
                            <span id="status_hak_nomor-error" class="invalid-feedback">
                                <strong>{{ $errors->first('status_hak_nomor') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="form-group col-md-6">
                        <label for="atas_hak_nomor">Atas Hak dan Nomor</label>
                        <input type="text" id="atas_hak_nomor" name="atas_hak_nomor" class="form-control {{ $errors->has('atas_hak_nomor') ? 'is-invalid' : '' }}" value="{{ old('atas_hak_nomor') ?? $aktaIkrar->atas_hak_nomor ?? '' }}">
                        @if($errors->has('atas_hak_nomor'))
                            <span id="atas_hak_nomor-error" class="invalid-feedback">
                                <strong>{{ $errors->first('atas_hak_nomor') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="atas_hak_lain">Atas Hak/Surat Lain</label>
                        <input type="text" id="atas_hak_lain" name="atas_hak_lain" class="form-control {{ $errors->has('atas_hak_lain') ? 'is-invalid' : '' }}" value="{{ old('atas_hak_lain') ?? $aktaIkrar->atas_hak_lain ?? '' }}">
                        @if($errors->has('atas_hak_lain'))
                            <span id="atas_hak_lain-error" class="invalid-feedback">
                                <strong>{{ $errors->first('atas_hak_lain') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="form-group col-md-6">
                        <label for="batas_timur">Batas Timur</label>
                        <input type="text" id="batas_timur" name="batas_timur" class="form-control {{ $errors->has('batas_timur') ? 'is-invalid' : '' }}" value="{{ old('batas_timur') ?? $aktaIkrar->batas_timur ?? '' }}">
                        @if($errors->has('batas_timur'))
                            <span id="batas_timur-error" class="invalid-feedback">
                                <strong>{{ $errors->first('batas_timur') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="batas_barat">Batas Barat</label>
                        <input type="text" id="batas_barat" name="batas_barat" class="form-control {{ $errors->has('batas_barat') ? 'is-invalid' : '' }}" value="{{ old('batas_barat') ?? $aktaIkrar->batas_barat ?? '' }}">
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
                        <input type="text" id="batas_utara" name="batas_utara" class="form-control {{ $errors->has('batas_utara') ? 'is-invalid' : '' }}" value="{{ old('batas_utara') ?? $aktaIkrar->batas_utara ?? '' }}">
                        @if($errors->has('batas_utara'))
                            <span id="batas_utara-error" class="invalid-feedback">
                                <strong>{{ $errors->first('batas_utara') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="batas_selatan">Batas Selatan</label>
                        <input type="text" id="batas_selatan" name="batas_selatan" class="form-control {{ $errors->has('batas_selatan') ? 'is-invalid' : '' }}" value="{{ old('batas_selatan') ?? $aktaIkrar->batas_selatan ?? '' }}">
                        @if($errors->has('batas_selatan'))
                            <span id="batas_selatan-error" class="invalid-feedback">
                                <strong>{{ $errors->first('batas_selatan') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row col-md-12">
                    <div class="form-group col-md-4">
                        <label for="luas">Luas</label>
                        <input type="text" id="luas" name="luas" class="form-control {{ $errors->has('luas') ? 'is-invalid' : '' }}" value="{{ old('luas') ?? $aktaIkrar->luas ?? '' }}">
                        @if($errors->has('luas'))
                            <span id="luas-error" class="invalid-feedback">
                                <strong>{{ $errors->first('luas') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="id_desa">Desa</label>
                        <select name="id_desa" class="form-control {{ $errors->has('id_desa') ? 'is-invalid' : '' }}" required>
                            <option selected="true" disabled>Pilih Desa</option>
                            @foreach ($desa as $item)
                                <option value="{{ $item->id }}" {{ (old('id_desa') ?? $aktaIkrar->id_desa ?? '') == $item->id ? 'selected':'' }}>{{ $item->nama }}</option>
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
                <div class="form-group col-md-12">
                    <label for="keperluan">Untuk Keperluan</label>
                    <input type="text" id="keperluan" name="keperluan" class="form-control {{ $errors->has('keperluan') ? 'is-invalid' : '' }}" value="{{ old('keperluan') ?? $aktaIkrar->keperluan ?? '' }}">
                    @if($errors->has('keperluan'))
                        <span id="keperluan-error" class="invalid-feedback">
                            <strong>{{ $errors->first('keperluan') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            {{-- FORMULIR UNTUK SAKSI SAAT IKRAR WAKAF --}}
            <div class="alert alert-dark">
                <h6 class="mb-0 font-weight-bold">Saksi Ikrar 1</h6>
            </div>
            <div class="saksi0">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nama0">Nama</label>
                        <input type="text" id="nama0" name="saksi[1][nama]" class="form-control {{ $errors->has('saksi.1.nama') ? 'is-invalid' : '' }}" 
                            placeholder="Nama" value="{{ old('saksi.1.nama') ?? $aktaIkrar->saksiIrar[0]->nama ?? '' }}">
                        @if($errors->has('saksi.1.nama'))
                            <span id="nama0-error" class="invalid-feedback">
                                <strong>{{ $errors->first('saksi.1.nama') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="nik0">NIK</label>
                        <input type="text" id="nik0" name="saksi[1][nik]" class="form-control {{ $errors->has('saksi.1.nik') ? 'is-invalid' : '' }}" 
                            placeholder="Nik" value="{{ old('saksi.1.nik') ?? $aktaIkrar->saksiIrar[0]->nik ?? '' }}">

                        @if($errors->has('saksi.1.nik'))
                            <span id="nik0-error" class="invalid-feedback">
                                <strong>{{ $errors->first('saksi.1.nik') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="tempat_lahir0">Tempat Lahir</label>
                        <input id="tempat_lahir0" type="text" name="saksi[1][tempat_lahir]" class="form-control {{ $errors->has('saksi.1.tempat_lahir') ? 'is-invalid' : '' }}"
                        value="{{ old('saksi.1.tempat_lahir') ?? $aktaIkrar->saksiIrar[0]->tempat_lahir ?? '' }}" placeholder="Tempat Lahir" >
                        @if($errors->has('saksi.1.tempat_lahir'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('saksi.1.tempat_lahir') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="tanggal_lahir0">Tanggal Lahir</label>
                        <input id="tanggal_lahir0" type="date" name="saksi[1][tanggal_lahir]" class="form-control {{ $errors->has('saksi.1.tanggal_lahir') ? 'is-invalid' : '' }}"
                        value="{{ old('saksi.1.tanggal_lahir') ?? $aktaIkrar->saksiIrar[0]->tanggal_lahir ?? '' }}" placeholder="Tanggal Lahir" >
                        @if($errors->has('saksi.1.tanggal_lahir'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('saksi.1.tanggal_lahir') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="id_agama0">Agama</label>
                        <select name="saksi[1][id_agama]" class="form-control {{ $errors->has('saksi.1.id_agama') ? 'is-invalid' : '' }}" >
                            @foreach ($agama as $item)
                                <option value="{{ $item->id }}" {{ (old('saksi.1.id_agama') ?? $aktaIkrar->saksiIrar[0]->id_agama ?? '') == $item->id ? 'selected':'' }}>{{ $item->agama }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('saksi.1.id_agama'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('saksi.1.id_agama') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    {{-- Pendidikan Terakhir field --}}
                    <div class="form-group col-md-4">
                        <label for="id_pendidikan_terakhir0">Pendidikan Terakhir</label>
                        <select name="saksi[1][id_pendidikan_terakhir]" class="form-control {{ $errors->has('saksi.1.id_pendidikan_terakhir') ? 'is-invalid' : '' }}" >
                            <option selected="true" disabled>Pilih Pendidikan Terakhir</option>
                            @foreach ($pendidikanTerakhir as $item)
                                <option value="{{ $item->id }}" {{ (old('saksi.1.id_pendidikan_terakhir') ?? $aktaIkrar->saksiIrar[0]->id_pendidikan_terakhir ?? '') == $item->id ? 'selected':'' }}>{{ $item->tingkat }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('saksi.1.id_pendidikan_terakhir'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('saksi.1.id_pendidikan_terakhir') }}</strong>
                            </div>
                        @endif
                    </div>
                    
                    {{-- Pekerjaan field --}}
                    <div class="form-group col-md-4">
                        <label for="pekerjaan0">Pekerjaan</label>
                        <input id="pekerjaan0" type="text" name="saksi[1][pekerjaan]" class="form-control {{ $errors->has('saksi.1.pekerjaan') ? 'is-invalid' : '' }}"
                            value="{{ old('saksi.1.pekerjaan') ?? $aktaIkrar->saksiIrar[0]->pekerjaan ?? '' }}" placeholder="Pekerjaan0" >
                        @if($errors->has('saksi.1.pekerjaan'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('saksi.1.pekerjaan') }}</strong>
                            </div>
                        @endif
                    </div>

                    {{-- Kewarganegaraan field --}}
                    <div class="form-group col-md-4">
                        <label for="kewarganegaraan0">Kewarganegaraan</label>
                        <input id="kewarganegaraan0" type="text" name="saksi[1][kewarganegaraan]" class="form-control {{ $errors->has('saksi.1.kewarganegaraan') ? 'is-invalid' : '' }}"
                            value="{{ old('saksi.1.kewarganegaraan') ?? $aktaIkrar->saksiIrar[0]->kewarganegaraan ?? '' ?? 'Indonesia' }}" placeholder="Kewarganegaraan0" >
                        @if($errors->has('saksi.1.kewarganegaraan'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('saksi.1.kewarganegaraan') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    {{-- Desa field --}}
                    <div class="form-group col-md-4">
                        <label for="id_desa0">Pilih Desa</label>
                        <select name="saksi[1][id_desa]" class="form-control {{ $errors->has('saksi.1.id_desa') ? 'is-invalid' : '' }}" required>
                            <option selected="true" disabled>Pilih Desa</option>
                            @foreach ($desa as $item)
                                <option value="{{ $item->id }}" {{ (old('saksi.1.id_desa') ?? $aktaIkrar->saksiIrar[0]->id_desa ?? '') == $item->id ? 'selected':'' }}>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('saksi.1.id_desa'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('saksi.1.id_desa') }}</strong>
                            </div>
                        @endif
                    </div>

                    {{-- RT field --}}
                    <div class="form-group col-md-2">
                        <label for="rt0">RT</label>
                        <input id="rt0" type="text" name="saksi[1][rt]" class="form-control {{ $errors->has('saksi.1.rt') ? 'is-invalid' : '' }}"
                            value="{{ old('saksi.1.rt') ?? $aktaIkrar->saksiIrar[0]->rt ?? '' }}" placeholder="cth: 001" >
                        @if($errors->has('saksi.1.rt'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('saksi.1.rt') }}</strong>
                            </div>
                        @endif
                    </div>

                    {{-- RW field --}}
                    <div class="form-group col-md-2">
                        <label for="rw0">RW</label>
                        <input id="rw0" type="text" name="saksi[1][rw]" class="form-control {{ $errors->has('saksi.1.rw') ? 'is-invalid' : '' }}"
                            value="{{ old('saksi.1.rw') ?? $aktaIkrar->saksiIrar[0]->rw ?? '' }}" placeholder="cth: 001" >
                        @if($errors->has('saksi.1.rw'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('saksi.1.rw') }}</strong>
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
                    <label for="ktp0" class="col-sm-2 col-form-label">KTP saksi</label>
                    <div class="col-sm-10">

                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" id="ktp0" name="saksi[1][ktp]" class="custom-file-input {{ $errors->has('saksi.1.ktp') ? 'is-invalid' : '' }}">
                                <label class="custom-file-label" for="ktp0">Pilih File</label></label>
                            </div>
                        </div>
                            
                        @if($errors->has('saksi.1.ktp'))
                            <span id="ktp0-error" class="invalid-feedback d-block">
                                <strong>{{ $errors->first('saksi.1.ktp') }}</strong>
                            </span>
                        @endif

                        @if ($aktaIkrar)
                        <small><a href="{{ Storage::disk('public')->url('berkas/ktp_saksi/'.$aktaIkrar->saksiIrar[0]->ktp ?? '') }}" target="_blank">Lihat KTP</a>, Upload ulang jika ingin menggantinya, jika tidak kosongkan</small>
                        @endif
                    </div>
                </div>
            </div>


            <div class="alert alert-dark">
                <h6 class="mb-0 font-weight-bold">Saksi Ikrar 2</h6>
            </div>
            <div class="saksi1">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nama1">Nama</label>
                        <input type="text" id="nama1" name="saksi[2][nama]" class="form-control {{ $errors->has('saksi.2.nama') ? 'is-invalid' : '' }}" 
                            placeholder="Nama" value="{{ old('saksi.2.nama') ?? $aktaIkrar->saksiIrar[1]->nama ?? '' }}">
                        @if($errors->has('saksi.2.nama'))
                            <span id="nama1-error" class="invalid-feedback">
                                <strong>{{ $errors->first('saksi.2.nama') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="nik1">NIK</label>
                        <input type="text" id="nik1" name="saksi[2][nik]" class="form-control {{ $errors->has('saksi.2.nik') ? 'is-invalid' : '' }}" 
                            placeholder="Nik" value="{{ old('saksi.2.nik') ?? $aktaIkrar->saksiIrar[1]->nik ?? '' }}">

                        @if($errors->has('saksi.2.nik'))
                            <span id="nik1-error" class="invalid-feedback">
                                <strong>{{ $errors->first('saksi.2.nik') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="tempat_lahir1">Tempat Lahir</label>
                        <input id="tempat_lahir1" type="text" name="saksi[2][tempat_lahir]" class="form-control {{ $errors->has('saksi.2.tempat_lahir') ? 'is-invalid' : '' }}"
                        value="{{ old('saksi.2.tempat_lahir') ?? $aktaIkrar->saksiIrar[1]->tempat_lahir ?? '' }}" placeholder="Tempat Lahir" >
                        @if($errors->has('saksi.2.tempat_lahir'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('saksi.2.tempat_lahir') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="tanggal_lahir1">Tanggal Lahir</label>
                        <input id="tanggal_lahir1" type="date" name="saksi[2][tanggal_lahir]" class="form-control {{ $errors->has('saksi.2.tanggal_lahir') ? 'is-invalid' : '' }}"
                        value="{{ old('saksi.2.tanggal_lahir') ?? $aktaIkrar->saksiIrar[1]->tanggal_lahir ?? '' }}" placeholder="Tanggal Lahir" >
                        @if($errors->has('saksi.2.tanggal_lahir'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('saksi.2.tanggal_lahir') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-4">
                        <label for="id_agama1">Agama</label>
                        <select name="saksi[2][id_agama]" class="form-control {{ $errors->has('saksi.2.id_agama') ? 'is-invalid' : '' }}" >
                            @foreach ($agama as $item)
                                <option value="{{ $item->id }}" {{ (old('saksi.2.id_agama') ?? $aktaIkrar->saksiIrar[1]->id_agama ?? '') == $item->id ? 'selected':'' }}>{{ $item->agama }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('saksi.2.id_agama'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('saksi.2.id_agama') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    {{-- Pendidikan Terakhir field --}}
                    <div class="form-group col-md-4">
                        <label for="id_pendidikan_terakhir1">Pendidikan Terakhir</label>
                        <select name="saksi[2][id_pendidikan_terakhir]" class="form-control {{ $errors->has('saksi.2.id_pendidikan_terakhir') ? 'is-invalid' : '' }}" >
                            <option selected="true" disabled>Pilih Pendidikan Terakhir</option>
                            @foreach ($pendidikanTerakhir as $item)
                                <option value="{{ $item->id }}" {{ (old('saksi.2.id_pendidikan_terakhir') ?? $aktaIkrar->saksiIrar[1]->id_pendidikan_terakhir ?? '') == $item->id ? 'selected':'' }}>{{ $item->tingkat }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('saksi.2.id_pendidikan_terakhir'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('saksi.2.id_pendidikan_terakhir') }}</strong>
                            </div>
                        @endif
                    </div>
                    
                    {{-- Pekerjaan field --}}
                    <div class="form-group col-md-4">
                        <label for="pekerjaan1">Pekerjaan</label>
                        <input id="pekerjaan1" type="text" name="saksi[2][pekerjaan]" class="form-control {{ $errors->has('saksi.2.pekerjaan') ? 'is-invalid' : '' }}"
                            value="{{ old('saksi.2.pekerjaan') ?? $aktaIkrar->saksiIrar[1]->pekerjaan ?? '' }}" placeholder="Pekerjaan1" >
                        @if($errors->has('saksi.2.pekerjaan'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('saksi.2.pekerjaan') }}</strong>
                            </div>
                        @endif
                    </div>

                    {{-- Kewarganegaraan field --}}
                    <div class="form-group col-md-4">
                        <label for="kewarganegaraan1">Kewarganegaraan</label>
                        <input id="kewarganegaraan1" type="text" name="saksi[2][kewarganegaraan]" class="form-control {{ $errors->has('saksi.2.kewarganegaraan') ? 'is-invalid' : '' }}"
                            value="{{ old('saksi.2.kewarganegaraan') ?? $aktaIkrar->saksiIrar[1]->kewarganegaraan ?? '' ?? 'Indonesia' }}" placeholder="Kewarganegaraan1" >
                        @if($errors->has('saksi.2.kewarganegaraan'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('saksi.2.kewarganegaraan') }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    {{-- Desa field --}}
                    <div class="form-group col-md-4">
                        <label for="id_desa1">Pilih Desa</label>
                        <select name="saksi[2][id_desa]" class="form-control {{ $errors->has('saksi.2.id_desa') ? 'is-invalid' : '' }}" required>
                            <option selected="true" disabled>Pilih Desa</option>
                            @foreach ($desa as $item)
                                <option value="{{ $item->id }}" {{ (old('saksi.2.id_desa') ?? $aktaIkrar->saksiIrar[1]->id_desa ?? '') == $item->id ? 'selected':'' }}>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('saksi.2.id_desa'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('saksi.2.id_desa') }}</strong>
                            </div>
                        @endif
                    </div>

                    {{-- RT field --}}
                    <div class="form-group col-md-2">
                        <label for="rt1">RT</label>
                        <input id="rt1" type="text" name="saksi[2][rt]" class="form-control {{ $errors->has('saksi.2.rt') ? 'is-invalid' : '' }}"
                            value="{{ old('saksi.2.rt') ?? $aktaIkrar->saksiIrar[1]->rt ?? '' }}" placeholder="cth: 001" >
                        @if($errors->has('saksi.2.rt'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('saksi.2.rt') }}</strong>
                            </div>
                        @endif
                    </div>

                    {{-- RW field --}}
                    <div class="form-group col-md-2">
                        <label for="rw1">RW</label>
                        <input id="rw1" type="text" name="saksi[2][rw]" class="form-control {{ $errors->has('saksi.2.rw') ? 'is-invalid' : '' }}"
                            value="{{ old('saksi.2.rw') ?? $aktaIkrar->saksiIrar[1]->rw ?? '' }}" placeholder="cth: 001" >
                        @if($errors->has('saksi.2.rw'))
                            <div class="invalid-feedback">
                                <strong>{{ $errors->first('saksi.2.rw') }}</strong>
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
                    <label for="ktp1" class="col-sm-2 col-form-label">KTP saksi</label>
                    <div class="col-sm-10">

                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" id="ktp1" name="saksi[2][ktp]" class="custom-file-input {{ $errors->has('saksi.2.ktp') ? 'is-invalid' : '' }}">
                                <label class="custom-file-label" for="ktp1">Pilih File</label></label>
                            </div>
                        </div>
                            
                        @if($errors->has('saksi.2.ktp'))
                            <span id="ktp1-error" class="invalid-feedback d-block">
                                <strong>{{ $errors->first('saksi.2.ktp') }}</strong>
                            </span>
                        @endif
                        
                        @if ($aktaIkrar)
                        <small><a href="{{ Storage::disk('public')->url('berkas/ktp_saksi/'.$aktaIkrar->saksiIrar[1]->ktp ?? '') }}" target="_blank">Lihat KTP</a>, Upload ulang jika ingin menggantinya, jika tidak kosongkan</small>
                        @endif
                    </div>
                </div>
            </div>

            {{-- BUTTON SIMPAN --}}
            <button class="btn btn-primary float-right" type="submit">Simpan Data Cetak</button>
        </form>

        {{-- BUTTON UNTUK CETAK --}}
        <div class="mt-5">
            <h6>Simpan data cetak terlebih dahulu untuk dapat mencetak dokumen dibawah ini</h6>
            <a href="{{ route('admin.cetakWt1', $berkasWakif->id) }}" target="_blank" class="btn btn-success {{($aktaIkrar) ?? 'disabled' }}" {{($aktaIkrar) ?? 'disabled' }}>Dokumen WT.1</a>
            <a href="{{ route('admin.cetakWt2', $berkasWakif->id) }}" target="_blank" class="btn btn-success {{($aktaIkrar) ?? 'disabled' }}" {{($aktaIkrar) ?? 'disabled' }}>Dokumen WT.2</a>
            <a href="{{ route('admin.cetakWt4', $berkasWakif->id) }}" target="_blank" class="btn btn-success {{($aktaIkrar) ?? 'disabled' }}" {{($aktaIkrar) ?? 'disabled' }}>Dokumen WT.4</a>
        </div>

    </div>
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

    $('input[type=file]').change(function() {
        if(this.files[0].size > 1048576){
           alert("Maksimal ukuran file yang anda upload adalah 1mb !");
           this.value = "";
        };
    })

</script>
@stop