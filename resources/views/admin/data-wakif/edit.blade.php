@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('title', 'Data Wakif')

@section('content_header')
<h1>Data Wakif</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Data Wakif</h3>
    </div>

    <x-alert/>

    <form class="form-horizontal" action="{{ route('admin.data-wakif.update', $wakif->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" id="name" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" 
                        placeholder="Nama" value="{{ old('name') ?? $wakif->nama }}">
                    @if($errors->has('name'))
                        <span id="name-error" class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-10">
                    <input type="text" id="nik" name="nik" class="form-control {{ $errors->has('nik') ? 'is-invalid' : '' }}" 
                        placeholder="NIK" value="{{ old('nik') ?? $wakif->nik }}">
                    @if($errors->has('nik'))
                        <span id="nik-error" class="invalid-feedback">
                            <strong>{{ $errors->first('nik') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                <div class="col-sm-10">
                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control {{ $errors->has('tempat_lahir') ? 'is-invalid' : '' }}" 
                        placeholder="Tempat Lahir" value="{{ old('tempat_lahir') ?? $wakif->tempat_lahir }}">
                    @if($errors->has('tempat_lahir'))
                        <span id="tempat_lahir-error" class="invalid-feedback">
                            <strong>{{ $errors->first('tempat_lahir') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}" 
                        placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir') ?? $wakif->tanggal_lahir }}">
                    @if($errors->has('tanggal_lahir'))
                        <span id="tanggal_lahir-error" class="invalid-feedback">
                            <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                        </span>
                    @endif
                    <small>Format tanggal lahir adalah bulan/hari/tahun</small>
                </div>
            </div>

            <div class="form-group row">
                <label for="id_agama" class="col-sm-2 col-form-label">Agama</label>
                <div class="col-sm-10">
                    <select name="id_agama" class="form-control {{ $errors->has('id_agama') ? 'is-invalid' : '' }}" autofocus>
                        @foreach ($agama as $item)
                            <option value="{{ $item->id }}" {{ (old('id_agama') ?? $wakif->id_agama) == $item->id ? 'selected':'' }}>{{ $item->agama }}</option>
                        @endforeach
                    </select>
                        
                    @if($errors->has('id_agama'))
                        <span id="id_agama-error" class="invalid-feedback">
                            <strong>{{ $errors->first('id_agama') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="id_pendidikan_terakhir" class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                <div class="col-sm-10">
                    <select name="id_pendidikan_terakhir" class="form-control {{ $errors->has('id_pendidikan_terakhir') ? 'is-invalid' : '' }}" autofocus>
                        <option selected="true" disabled>Pilih Pendidikan Terakhir</option>
                        @foreach ($pendidikanTerakhir as $item)
                            <option value="{{ $item->id }}" {{ (old('id_pendidikan_terakhir') ?? $wakif->id_pendidikan_terakhir) == $item->id ? 'selected':'' }}>{{ $item->tingkat }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('id_pendidikan_terakhir'))
                        <span id="id_pendidikan_terakhir-error" class="invalid-feedback">
                            <strong>{{ $errors->first('id_pendidikan_terakhir') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan</label>
                <div class="col-sm-10">
                    <input type="text" id="pekerjaan" name="pekerjaan" class="form-control {{ $errors->has('pekerjaan') ? 'is-invalid' : '' }}" 
                        placeholder="Pekerjaan" value="{{ old('pekerjaan') ?? $wakif->pekerjaan }}">
                    @if($errors->has('pekerjaan'))
                        <span id="pekerjaan-error" class="invalid-feedback">
                            <strong>{{ $errors->first('pekerjaan') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            {{-- No WA field --}}
            <div class="form-group row">
                <label for="no_wa" class="col-sm-2 col-form-label">No Handphone</label>
                <div class="col-sm-10">
                    <input type="tel" id="no_wa" name="no_wa" class="form-control {{ $errors->has('no_wa') ? 'is-invalid' : '' }}" 
                        placeholder="No Handphone" value="{{ old('no_wa') ?? $wakif->no_wa }}">
                    @if($errors->has('no_wa'))
                        <span id="no_wa-error" class="invalid-feedback">
                            <strong>{{ $errors->first('no_wa') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            
            <div class="form-group row">
                <label for="rt" class="col-sm-2 col-form-label">RT</label>
                <div class="col-sm-10">
                    <input type="text" id="rt" name="rt" class="form-control {{ $errors->has('rt') ? 'is-invalid' : '' }}" 
                        placeholder="RT" value="{{ old('rt') ?? $wakif->rt }}">
                    @if($errors->has('rt'))
                        <span id="rt-error" class="invalid-feedback">
                            <strong>{{ $errors->first('rt') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="rw" class="col-sm-2 col-form-label">RW</label>
                <div class="col-sm-10">
                    <input type="text" id="rw" name="rw" class="form-control {{ $errors->has('rw') ? 'is-invalid' : '' }}" 
                        placeholder="RW" value="{{ old('rw') ?? $wakif->rw }}">
                    @if($errors->has('rw'))
                        <span id="rw-error" class="invalid-feedback">
                            <strong>{{ $errors->first('rw') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="id_desa" class="col-sm-2 col-form-label">Desa</label>
                <div class="col-sm-10">
                    <select name="id_desa" class="form-control {{ $errors->has('id_desa') ? 'is-invalid' : '' }}" autofocus>
                        <option selected="true" disabled>Pilih Desa</option>
                        @foreach ($desa as $item)
                            <option value="{{ $item->id }}" {{ (old('id_desa') ?? $wakif->id_desa) == $item->id ? 'selected':'' }}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('id_desa'))
                        <span id="id_desa-error" class="invalid-feedback">
                            <strong>{{ $errors->first('id_desa') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="kecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                <div class="col-sm-10">
                    <input type="text" id="kecamatan" name="kecamatan" class="form-control {{ $errors->has('kecamatan') ? 'is-invalid' : '' }}" 
                        placeholder="Kecamatan" value="{{ old('kecamatan') ?? $wakif->kecamatan }}" disabled>
                    @if($errors->has('kecamatan'))
                        <span id="kecamatan-error" class="invalid-feedback">
                            <strong>{{ $errors->first('kecamatan') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="kabupaten" class="col-sm-2 col-form-label">Kabupaten</label>
                <div class="col-sm-10">
                    <input type="text" id="kabupaten" name="kabupaten" class="form-control {{ $errors->has('kabupaten') ? 'is-invalid' : '' }}" 
                        placeholder="Kabupaten" value="{{ old('kabupaten') ?? $wakif->kabupaten }}" disabled>
                    @if($errors->has('kabupaten'))
                        <span id="kabupaten-error" class="invalid-feedback">
                            <strong>{{ $errors->first('kabupaten') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
                <div class="col-sm-10">
                    <input type="text" id="provinsi" name="provinsi" class="form-control {{ $errors->has('provinsi') ? 'is-invalid' : '' }}" 
                        placeholder="Provinsi" value="{{ old('provinsi') ?? $wakif->provinsi }}" disabled>
                    @if($errors->has('provinsi'))
                        <span id="provinsi-error" class="invalid-feedback">
                            <strong>{{ $errors->first('provinsi') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" id="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" 
                        placeholder="Email" value="{{ old('email') ?? $wakif->user->email }}">
                    @if($errors->has('email'))
                        <span id="email-error" class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="card-footer">
            <a href="{{ route('admin.data-wakif.index') }}" class="btn btn-default">Kembali</a>
            <button type="submit" class="btn btn-info float-right">Smpan</button>
        </div>
        
      </form>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop