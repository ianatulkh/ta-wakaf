@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.register_message'))
@section('plugins.BootstrapPlugin', true)

@section('auth_body')
<x-alert/>
    <form action="{{ $register_url }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        
        <h5 class="font-weight-bold text-primary">Identitas Pendaftar</h5>

        <p>Pendaftaran wakaf dilakukan oleh seorang wakif (orang yang ingin mewakafkan tanah wakaf), silahkan isi form dibawah ini sesuai dengan data anda sebagai seorang wakif </p>

        {{-- Name field --}}
        <div class="form-group">
            <label for="name">Nama</label>
            <input id="name" type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                   value="{{ old('name') }}" placeholder="{{ __('adminlte::adminlte.full_name') }}" autofocus>
            @if($errors->has('name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>

        {{-- NIK field --}}
        <div class="form-group">
            <label for="nik">NIK</label>
            <input id="nik" type="number" name="nik" class="form-control {{ $errors->has('nik') ? 'is-invalid' : '' }}"
                   value="{{ old('nik') }}" placeholder="NIK" autofocus>
            @if($errors->has('nik'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('nik') }}</strong>
                </div>
            @endif
        </div>

        <div class="row">
            {{-- Tempat Lahir field --}}
            <div class="form-group col-md-6">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input id="tempat_lahir" type="text" name="tempat_lahir" class="form-control {{ $errors->has('tempat_lahir') ? 'is-invalid' : '' }}"
                   value="{{ old('tempat_lahir') }}" placeholder="Tempat Lahir" autofocus>
                @if($errors->has('tempat_lahir'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
                    </div>
                @endif
            </div>

            {{-- Tanggal Lahir field --}}
            <div class="form-group col-md-6">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input id="tanggal_lahir" type="date" name="tanggal_lahir" class="form-control {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}"
                   value="{{ old('tanggal_lahir') }}" placeholder="Tanggal Lahir" autofocus>
                @if($errors->has('tanggal_lahir'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                    </div>
                @endif
                <small>Format tanggal lahir adalah bulan/hari/tahun</small>
            </div>
        </div>

        <div class="row">
            {{-- Agama field --}}
            <div class="form-group col-md-6">
                <label for="id_agama">Agama</label>
                <select name="id_agama" class="form-control {{ $errors->has('id_agama') ? 'is-invalid' : '' }}" autofocus>
                    @foreach ($agama as $item)
                        <option value="{{ $item->id }}" {{ (old('id_agama') ?? '') == $item->id ? 'selected':'' }}>{{ $item->agama }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_agama'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('id_agama') }}</strong>
                    </div>
                @endif
            </div>

            {{-- Pendidikan Terakhir field --}}
            <div class="form-group col-md-6">
                <label for="id_pendidikan_terakhir">Pendidikan Terakhir</label>
                <select name="id_pendidikan_terakhir" class="form-control {{ $errors->has('id_pendidikan_terakhir') ? 'is-invalid' : '' }}" autofocus>
                    <option selected="true" disabled>Pilih Pendidikan Terakhir</option>
                    @foreach ($pendidikanTerakhir as $item)
                        <option value="{{ $item->id }}" {{ (old('id_pendidikan_terakhir') ?? '') == $item->id ? 'selected':'' }}>{{ $item->tingkat }}</option>
                    @endforeach
                </select>
                @if($errors->has('id_pendidikan_terakhir'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('id_pendidikan_terakhir') }}</strong>
                    </div>
                @endif
            </div>
        </div>

        {{-- Pekerjaan field --}}
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input id="pekerjaan" type="text" name="pekerjaan" class="form-control {{ $errors->has('pekerjaan') ? 'is-invalid' : '' }}"
                   value="{{ old('pekerjaan') }}" placeholder="Pekerjaan" autofocus>
            @if($errors->has('pekerjaan'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('pekerjaan') }}</strong>
                </div>
            @endif
        </div>

        {{-- No WA field --}}
        <div class="form-group">
            <label for="no_wa">No Handphone</label>
            <input id="no_wa" type="tel" name="no_wa" class="form-control {{ $errors->has('no_wa') ? 'is-invalid' : '' }}"
                   value="{{ old('no_wa') }}" placeholder="No Hp" autofocus>
            @if($errors->has('no_wa'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('no_wa') }}</strong>
                </div>
            @endif
        </div>


        <div class="row">
            {{-- RT field --}}
            <div class="form-group col-md-6">
                <label for="rt">RT</label>
                <input id="rt" type="text" name="rt" class="form-control {{ $errors->has('rt') ? 'is-invalid' : '' }}"
                       value="{{ old('rt') }}" placeholder="Misalnya 001" autofocus>
                @if($errors->has('rt'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('rt') }}</strong>
                    </div>
                @endif
            </div>

            {{-- RW field --}}
            <div class="form-group col-md-6">
                <label for="rw">RW</label>
                <input id="rw" type="text" name="rw" class="form-control {{ $errors->has('rw') ? 'is-invalid' : '' }}"
                       value="{{ old('rw') }}" placeholder="Misalnya 001" autofocus>
                @if($errors->has('rw'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('rw') }}</strong>
                    </div>
                @endif
            </div>
        </div>

        {{-- Desa field --}}
        <div class="form-group">
            <label for="id_desa">Pilih Desa</label>
            <select name="id_desa" class="form-control {{ $errors->has('id_desa') ? 'is-invalid' : '' }}" autofocus>
                <option selected="true" disabled>Pilih Desa</option>
                @foreach ($desa as $item)
                    <option value="{{ $item->id }}" {{ (old('id_desa') ?? '') == $item->id ? 'selected':'' }}>{{ $item->nama }}</option>
                @endforeach
            </select>
            @if($errors->has('id_desa'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('id_desa') }}</strong>
                </div>
            @endif
        </div>

        {{-- KTP Bung --}}
        <div class="form-group">
            <label for="ktp" class="col-form-label">KTP Nadzir</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" id="ktp" name="ktp" class="custom-file-input {{ $errors->has('ktp') ? 'is-invalid' : '' }}">
                    <label class="custom-file-label" for="ktp">Pilih File</label></label>
                </div>
            </div>

            @if($errors->has('ktp'))
                <span id="ktp-error" class="invalid-feedback d-block">
                    <strong>{{ $errors->first('ktp') }}</strong>
                </span>
            @endif

            <small>Harus berupa gambar dengan tipe png, jpg, dan jpeg, serta ukuran kurang dari 5 MB</small>
        </div>

        {{-- Kecamatan field --}}
        <div class="form-group">
            <label for="kecamatan">Kecamatan</label>
            <input id="kecamatan" type="text" name="kecamatan" class="form-control {{ $errors->has('kecamatan') ? 'is-invalid' : '' }}"
                   value="{{ old('kecamatan') ?? 'Pulosari' }}" placeholder="Kecamatan" autofocus disabled>
            @if($errors->has('kecamatan'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('kecamatan') }}</strong>
                </div>
            @endif
        </div>

        {{-- Kabupaten field --}}
        <div class="form-group">
            <label for="kabupaten">Kabupaten</label>
            <input id="kabupaten" type="text" name="kabupaten" class="form-control {{ $errors->has('kabupaten') ? 'is-invalid' : '' }}"
                   value="{{ old('kabupaten') ?? 'Kab. Pemalang' }}" placeholder="Kabupaten" autofocus disabled>
            @if($errors->has('kabupaten'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('kabupaten') }}</strong>
                </div>
            @endif
        </div>

        {{-- Provinsi field --}}
        <div class="form-group">
            <label for="provinsi">Provinsi</label>
            <input id="provinsi" type="text" name="provinsi" class="form-control {{ $errors->has('provinsi') ? 'is-invalid' : '' }}"
                   value="{{ old('provinsi') ?? 'Jawa Tengah' }}" placeholder="Provinsi" autofocus disabled>
            @if($errors->has('provinsi'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('provinsi') }}</strong>
                </div>
            @endif
        </div>

        <h5 class="font-weight-bold text-primary">Data Akun</h5>

        <p>Data akun akan digunakan untuk login (masuk) ke dalam sistem, untuk melihat status pengajuan wakaf anda atau anda dapat mengajukan tanah lain dengan akun yang anda daftarkan sekarang</p>

        {{-- Email field --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                   value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>

        {{-- Password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password"
                   class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                   placeholder="{{ __('adminlte::adminlte.password') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('password'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </div>
            @endif
        </div>

        {{-- Confirm password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation"
                   class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                   placeholder="{{ __('adminlte::adminlte.retype_password') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>
            @if($errors->has('password_confirmation'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </div>
            @endif
        </div>

        {{-- Register button --}}
        <button type="submit" class="btn btn-block loaderClick {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-user-plus"></span>
            {{ __('adminlte::adminlte.register') }}
        </button>

    </form>

@stop

@section('js')
<script>
    $(function () {
      bsCustomFileInput.init();
    });

    $('input[type=file]').change(function() {
        if(this.files[0].size > 5048576){
           alert("Maksimal ukuran file yang anda upload adalah 5mb !");
           this.value = "";
        };
    })

</script>
@stop

@section('auth_footer')
    <p class="my-0">
        <a href="{{ $login_url }}">
            {{ __('adminlte::adminlte.i_already_have_a_membership') }}
        </a>
    </p>
@stop
