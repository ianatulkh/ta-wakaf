@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)
@section('plugins.BootstrapPlugin', true)
@section('plugins.Select2', true)

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
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="wakif_jabatan">Wakif: Jabatan</label>
                    <input type="text" name="wakif_jabatan" value="{{old('wakif_jabatan') ?? $aktaIkrar->wakif_jabatan ?? ''}}" class="form-control {{ $errors->has('wakif_jabatan') ? 'is-invalid' : '' }}" placeholder="Misal: Wakif Perseorangan">
                    @if($errors->has('wakif_jabatan'))
                        <span id="wakif_jabatan-error" class="invalid-feedback">
                            <strong>{{ $errors->first('wakif_jabatan') }}</strong>
                        </span>
                    @endif
                    <small>Kosongkan jika wakif tidak memiliki jabatan</small>
                </div>
                <div class="form-group col-md-6">
                    <label for="wakif_bertindak">Wakif: Bertindak Atas Nama</label>
                    <input type="text" name="wakif_bertindak" value="{{old('wakif_bertindak') ?? $aktaIkrar->wakif_bertindak ?? ''}}" class="form-control {{ $errors->has('wakif_bertindak') ? 'is-invalid' : '' }}" placeholder="Misal: Wakif Perseorangan">
                    @if($errors->has('wakif_bertindak'))
                        <span id="wakif_bertindak-error" class="invalid-feedback">
                            <strong>{{ $errors->first('wakif_bertindak') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="nadzir_jabatan">Nadzir: Jabatan</label>
                    <input type="text" name="nadzir_jabatan" value="{{old('nadzir_jabatan') ?? $aktaIkrar->nadzir_jabatan ?? ''}}" class="form-control {{ $errors->has('nadzir_jabatan') ? 'is-invalid' : '' }}" placeholder="Misal: Nadzir Perseorangan">
                    @if($errors->has('nadzir_jabatan'))
                        <span id="nadzir_jabatan-error" class="invalid-feedback">
                            <strong>{{ $errors->first('nadzir_jabatan') }}</strong>
                        </span>
                    @endif
                    <small>Kosongkan jika wakif tidak memiliki jabatan</small> <br>
                    <small>Nadzir KETUA</small>
                </div>
                <div class="form-group col-md-6">
                    <label for="nadzir_bertindak">Nadzir: Bertindak Atas Nama</label>
                    <input type="text" name="nadzir_bertindak" value="{{old('nadzir_bertindak') ?? $aktaIkrar->nadzir_bertindak ?? ''}}" class="form-control {{ $errors->has('nadzir_bertindak') ? 'is-invalid' : '' }}" placeholder="Misal: Nadzir Perseorangan">
                    @if($errors->has('nadzir_bertindak'))
                        <span id="nadzir_bertindak-error" class="invalid-feedback">
                            <strong>{{ $errors->first('nadzir_bertindak') }}</strong>
                        </span>
                    @endif
                    <small>Nadzir KETUA</small>
                </div>
            </div>

            {{-- FORMULIR UNTUK KETERANGAN SEBIDANG TANAH WAKIF --}}
            <div class="alert alert-light">
                Keterangan Sebidang Tanah yang di Wakafkan Wakif <a class="btn btn-info text-decoration-none ml-2" target="_blank" href="{{ route('admin.berkas-wakif.show', $berkasWakif->id) }}">Lihat berkas wakif</a>
            </div>
            <div class="row">
                <div class="row col-md-12">
                    <div class="form-group col-md-6">
                        <label for="nomor">Nomor Akta Ikrar Wakaf</label>
                        <input type="text" id="nomor" name="nomor" class="form-control {{ $errors->has('nomor') ? 'is-invalid' : '' }}" value="{{ old('nomor') ?? $aktaIkrar->nomor ?? '' }}">
                        @if($errors->has('nomor'))
                            <span id="nomor-error" class="invalid-feedback">
                                <strong>{{ $errors->first('nomor') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nomor_wtk">Nomor WT.K</label>
                        <input type="text" id="nomor_wtk" name="nomor_wtk" class="form-control {{ $errors->has('nomor_wtk') ? 'is-invalid' : '' }}" value="{{ old('nomor_wtk') ?? $aktaIkrar->nomor_wtk ?? '' }}">
                        @if($errors->has('nomor_wtk'))
                            <span id="nomor_wtk-error" class="invalid-feedback">
                                <strong>{{ $errors->first('nomor_wtk') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>

            {{-- FORMULIR UNTUK SAKSI SAAT IKRAR WAKAF --}}
            <div class="alert alert-dark">
                <h6 class="mb-0 font-weight-bold">Saksi Ikrar</h6>
            </div>
            <p>Anda bisa menambahkan 2 saksi pada pencarian dibawah ini, Jika identitas saksi belum ada, anda bisa menambahkannya di <a href="{{ route('admin.data-saksi.create') }}">Halaman ini</a></p>
            <div class="form-group">
                <label for="">Saksi</label>
                <select name="saksi[]" class="fetch_saksi form-control select2bs4 ml-3 {{$errors->has('saksi')?'is-invalid':''}}" style="width: 100%;" multiple data-placeholder="Cari Saksi">
                    @if ($berkasWakif)
                        @foreach($berkasWakif->saksi as $key => $item)                                   
                            <option value="{{ $item->id }}" @if($berkasWakif->saksi->containsStrict('id', $item->id)) selected="selected" @endif>{{ $item->nik }} - {{ $item->nama }}</option>
                        @endforeach 
                    @endif
                </select>

                @if ($errors->has('saksi'))
                <span class="invalid-feedback" role="alert">
                    <p><b>{{ $errors->first('saksi')}}</b></p>
                </span>
                @endif
            </div>

            {{-- FORMULIR UNTUK NADZIR SAAT IKRAR WAKAF --}}
            <div class="alert alert-dark">
                <h6 class="mb-0 font-weight-bold">Nadzir</h6>
            </div>
            @php
                $isbadanhukum = $berkasWakif->nadzir()->first()->pivot->no_akta_notaris ?? null;
            @endphp
            <div class="form-group">
                <label for="">Pilih Tipe Nazhir</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="perseorangan" name="type_nazhir" {{($isbadanhukum == null) ? 'checked':''}} value="1">
                    <label for="perseorangan" class="custom-control-label">Nadzir Perseorangan</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="badan-hukum-organisasi" name="type_nazhir" {{($isbadanhukum == null) ? '':'checked' }} value="2">
                    <label for="badan-hukum-organisasi" class="custom-control-label">Nadzir Badan Hukum / Organisasi</label>
                </div>
            </div>
            
            <div class="nazhir-perseorangan" style="{{($isbadanhukum == null) ? 'display: block':'display: none'}}">
                <p>Anda bisa menambahkan 5 nadzir pada pencarian dibawah ini, Jika identitas nadzir belum ada, anda bisa menambahkannya di <a href="{{ route('admin.data-nadzir.create') }}">Halaman ini</a></p>
                <div class="form-group">
                    <label for="">Nadzir Urut Berdasarkan [Ketua, Sekretaris, Bendahara, Anggota, Anggota]</label>
                    <select name="nadzir_prs[]" class="fetch_nadzir form-control select2bs4 ml-3 {{$errors->has('nadzir_prs')?'is-invalid':''}}" style="width: 100%;" multiple data-placeholder="Cari Nadzir">
                        @if ($berkasWakif)
                            @foreach($berkasWakif->nadzir as $key => $item)                                   
                                <option value="{{ $item->id }}" @if($berkasWakif->nadzir->containsStrict('id', $item->id)) selected="selected" @endif>{{ $item->nik }} - {{ $item->nama }}</option>
                            @endforeach 
                        @endif
                    </select>

                    @if ($errors->has('nadzir_prs'))
                    <span class="invalid-feedback" role="alert">
                        <p><b>{{ $errors->first('nadzir_prs')}}</b></p>
                    </span>
                    @endif
                </div>
            </div>

            <div class="nazhir-badan-hukum-organisasi" style="{{($isbadanhukum == null) ? 'display: none':'display: block'}}">
                <div class="row">
                    <div class="row col-md-12">
                        <div class="form-group col-md-6">
                            <label for="nama_badan_hukum_organisasi">Nama Organisasi / Badan Hukum</label>
                            <input type="text" id="nama_badan_hukum_organisasi" name="nama_badan_hukum_organisasi" class="form-control {{ $errors->has('nama_badan_hukum_organisasi') ? 'is-invalid' : '' }}" value="{{ old('nama_badan_hukum_organisasi') ?? $berkasWakif->nadzir()->first()->pivot->nama_badan_hukum_organisasi ?? '' }}">
                            @if($errors->has('nama_badan_hukum_organisasi'))
                                <span id="nama_badan_hukum_organisasi-error" class="invalid-feedback">
                                    <strong>{{ $errors->first('nama_badan_hukum_organisasi') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="no_akta_notaris">Nomor Nota Notaris</label>
                            <input type="text" id="no_akta_notaris" name="no_akta_notaris" class="form-control {{ $errors->has('no_akta_notaris') ? 'is-invalid' : '' }}" value="{{ old('no_akta_notaris') ?? $berkasWakif->nadzir()->first()->pivot->no_akta_notaris ?? '' }}">
                            @if($errors->has('no_akta_notaris'))
                                <span id="no_akta_notaris-error" class="invalid-feedback">
                                    <strong>{{ $errors->first('no_akta_notaris') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <p>Susunan Pengurus</p>
                    <div class="row col-md-12">
                        <p>Anda bisa menambahkan identitas satu nazhir yang menjadi ketua saja untuk berbadan hukum / perorangan, Jika identitas nazhir belum ada, anda bisa menambahkannya di <a href="{{ route('admin.data-nadzir.create') }}">Halaman ini</a></p>
                        <div class="form-group col-md-4">
                            <label for="nazhir">Nazhir Ketua</label>
                            <select name="nadzir" class="fetch_nadzir form-control select2bs4 ml-3 {{$errors->has('nadzir')?'is-invalid':''}}" style="width: 100%;" data-placeholder="Cari Nadzir">
                                @if ($berkasWakif)
                                    @foreach($berkasWakif->nadzir as $key => $item)                                   
                                        <option value="{{ $item->id }}" @if($berkasWakif->nadzir->containsStrict('id', $item->id)) selected="selected" @endif>{{ $item->nik }} - {{ $item->nama }}</option>
                                    @endforeach 
                                @endif
                            </select>

                            @if ($errors->has('nadzir'))
                            <span class="invalid-feedback" role="alert">
                                <p><b>{{ $errors->first('nadzir')}}</b></p>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="sekretaris">Sekretaris</label>
                            <input type="text" id="sekretaris" name="sekretaris" class="form-control {{ $errors->has('sekretaris') ? 'is-invalid' : '' }}" value="{{ old('sekretaris') ?? $berkasWakif->nadzir()->first()->pivot->sekretaris ?? '' }}">
                            @if($errors->has('sekretaris'))
                                <span id="sekretaris-error" class="invalid-feedback">
                                    <strong>{{ $errors->first('sekretaris') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="bendahara">Bendahara</label>
                            <input type="text" id="bendahara" name="bendahara" class="form-control {{ $errors->has('bendahara') ? 'is-invalid' : '' }}" value="{{ old('bendahara') ?? $berkasWakif->nadzir()->first()->pivot->bendahara ?? '' }}">
                            @if($errors->has('bendahara'))
                                <span id="bendahara-error" class="invalid-feedback">
                                    <strong>{{ $errors->first('bendahara') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- BUTTON SIMPAN --}}
            <button class="btn btn-primary float-right" type="submit">Simpan Data Cetak</button>
        </form>

        {{-- BUTTON UNTUK CETAK --}}
        <br><br>
        <div class="mt-5">
            <h6>Simpan data cetak terlebih dahulu untuk dapat mencetak dokumen dibawah ini</h6>
            <a href="{{ route('admin.cetakWt1', $berkasWakif->id) }}" target="_blank" class="mb-2 mr-2 btn btn-success {{($aktaIkrar) ?? 'disabled' }}" {{($aktaIkrar) ?? 'disabled' }}>
                Dokumen WT.1 (Ikrar Wakaf)</a>

            <a href="{{ route('admin.cetakWt2', $berkasWakif->id) }}" target="_blank" class="mb-2 mr-2 btn btn-success {{($aktaIkrar) ?? 'disabled' }}" {{($aktaIkrar) ?? 'disabled' }}>
                Dokumen WT.2 (Akta Ikrar Wakaf)</a>

            <a href="{{ route('admin.cetakWt2a', $berkasWakif->id) }}" target="_blank" class="mb-2 mr-2 btn btn-success {{($aktaIkrar) ?? 'disabled' }}" {{($aktaIkrar) ?? 'disabled' }}>
                Dokumen WT.2a (Salinan Akta Ikrar Wakaf)</a>

            <a href="{{ route('admin.cetakWt3', $berkasWakif->id) }}" target="_blank" class="mb-2 mr-2 btn btn-success {{($aktaIkrar) ?? 'disabled' }} {{($berkasWakif->nama_pewasiat == null) ? 'disabled':''}}" {{($aktaIkrar) ?? 'disabled' }} {{($berkasWakif->nama_pewasiat == null) ? 'disabled':''}}>
                Dokumen WT.3 (Akta Pengganti Ikrar Wakaf *Jika Sebagai Ahli Waris)</a>

            <a href="{{ route('admin.cetakWt3a', $berkasWakif->id) }}" target="_blank" class="mb-2 mr-2 btn btn-success {{($aktaIkrar) ?? 'disabled' }} {{($berkasWakif->nama_pewasiat == null) ? 'disabled':''}}" {{($aktaIkrar) ?? 'disabled' }} {{($berkasWakif->nama_pewasiat == null) ? 'disabled':''}}>
                Dokumen WT.3a (Salinan Pengganti Ikrar Wakaf *Jika Sebagai Ahli Waris)</a>        
                
            <a href="{{ route('admin.cetakWt4', $berkasWakif->id) }}" target="_blank" class="mb-2 mr-2 btn btn-success {{($aktaIkrar) ?? 'disabled' }} {{($berkasWakif->nadzir()->first() && $berkasWakif->nadzir()->first()->pivot->no_akta_notaris) ? 'disabled':''}}" {{($aktaIkrar) ?? 'disabled' }} {{($berkasWakif->nadzir()->first() && $berkasWakif->nadzir()->first()->pivot->no_akta_notaris) ? 'disabled':''}}>
                Dokumen WT.4 (Pengesahan Nazhir Perseorangan)</a>

            <a href="{{ route('admin.cetakWt4a', $berkasWakif->id) }}" target="_blank" class="mb-2 mr-2 btn btn-success {{($aktaIkrar) ?? 'disabled' }} {{($berkasWakif->nadzir()->first() && $berkasWakif->nadzir()->first()->pivot->no_akta_notaris) ? '':'disabled'}}" {{($aktaIkrar) ?? 'disabled' }} {{($berkasWakif->nadzir()->first() && $berkasWakif->nadzir()->first()->pivot->no_akta_notaris) ? '':'disabled'}}>
                Dokumen WT.4a (Pengesahan Nazhir Berbadan Hukum / Organisasi)</a>

            <a href="{{ route('admin.cetakWtk', $berkasWakif->id) }}" target="_blank" class="mb-2 mr-2 btn btn-success {{($aktaIkrar) ?? 'disabled' }}" {{($aktaIkrar) ?? 'disabled' }}>
                Dokumen WT.K (Keterangan Kades Tanah Wakaf)</a>
        </div>

    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    $('#badan-hukum-organisasi').on('click', function(){
        $('.nazhir-badan-hukum-organisasi').show();
        $('.nazhir-perseorangan').hide();
    });

    $('#perseorangan').on('click', function(){
        $('.nazhir-badan-hukum-organisasi').hide();
        $('.nazhir-perseorangan').show();
    });
    $('.fetch_saksi').select2({
          placeholder: $(this).data("placeholder"),
          ajax: {
              url: '/admin/data-saksi/get-saksi/fetch/',
              dataType: 'json',
              delay: 100,
              allowClear:true,
              cache: true,
              data: function (params) { 
                  return {
                      q: params.term 
                  }
              },
              processResults: function (data) {
                  return {
                      results:  $.map(data, function (item) {
                          return {
                            id: item.id,
                            text:  item.nik+ ' - ' +item.nama,
                          }
                      })
                  };
              },
          },
     })

     $('.fetch_nadzir').select2({
          placeholder: $(this).data("placeholder"),
          ajax: {
              url: '/admin/data-nadzir/get-nadzir/fetch/',
              dataType: 'json',
              delay: 100,
              allowClear:true,
              cache: true,
              data: function (params) { 
                  return {
                      q: params.term 
                  }
              },
              processResults: function (data) {
                  return {
                      results:  $.map(data, function (item) {
                          return {
                            id: item.id,
                            text:  item.nik+ ' - ' +item.nama,
                          }
                      })
                  };
              },
          },
     })
</script>
@stop