@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('title', 'Detail Pengajuan')

@section('content_header')
<h1>Detail Pengajuan </h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Berkas</h3>
    </div>

    <div class="card-body table-responsive mr-2">

        <table class="table table-borderless">
            <thead>
                <tr>
                    <th class="text-right" width="45%">Sertifikat Tanah</th>
                    <th class="text-center" width="10%">:</th>
                    <td><a href="{{ Storage::disk('public')->url('berkas/sertifikat_tanah/'.$berkasWakif->sertifikat_tanah) }}" target="_blank">Lihat Berkas</a></td>
                </tr>
                <tr>
                    <th class="text-right" width="45%">SK Tidak Tanah Sengketa</th>
                    <th class="text-center" width="10%">:</th>
                    <td><a href="{{ Storage::disk('public')->url('berkas/sktts/'.$berkasWakif->sktts) }}" target="_blank">Lihat Berkas</a></td>
                </tr>
                <tr>
                    <th class="text-right" width="45%">Surat Pemberitahuan Pajak Terutang</th>
                    <th class="text-center" width="10%">:</th>
                    <td><a href="{{ Storage::disk('public')->url('berkas/sppt/'.$berkasWakif->sppt) }}" target="_blank">Lihat Berkas</a></td>
                </tr>
                <tr>
                    <th class="text-right" width="45%">Status Hak dan Nomor</th>
                    <th class="text-center" width="10%">:</th>
                    <td>{{$berkasWakif->status_hak_nomor}}</td>
                </tr>
                <tr>
                    <th class="text-right" width="45%">Atas Hak dan Nomor</th>
                    <th class="text-center" width="10%">:</th>
                    <td>{{$berkasWakif->atas_hak_nomor}}</td>
                </tr>
                <tr>
                    <th class="text-right" width="45%">Atas Hak / Surat Lain</th>
                    <th class="text-center" width="10%">:</th>
                    <td>{{$berkasWakif->atas_hak_lain ?? '='}}</td>
                </tr>
                <tr>
                    <th class="text-right" width="45%">Batas Timur</th>
                    <th class="text-center" width="10%">:</th>
                    <td>{{$berkasWakif->batas_timur}}</td>
                </tr>
                <tr>
                    <th class="text-right" width="45%">Batas Barat</th>
                    <th class="text-center" width="10%">:</th>
                    <td>{{$berkasWakif->batas_barat}}</td>
                </tr>
                <tr>
                    <th class="text-right" width="45%">Batas Utara</th>
                    <th class="text-center" width="10%">:</th>
                    <td>{{$berkasWakif->batas_utara}}</td>
                </tr>
                <tr>
                    <th class="text-right" width="45%">Batas Selatan</th>
                    <th class="text-center" width="10%">:</th>
                    <td>{{$berkasWakif->batas_selatan}}</td>
                </tr>
                <tr>
                    <th class="text-right" width="45%">Luas Tanah</th>
                    <th class="text-center" width="10%">:</th>
                    <td>{{$berkasWakif->luas}}</td>
                </tr>
                <tr>
                    <th class="text-right" width="45%">Letak Desa / Kelurahan</th>
                    <th class="text-center" width="10%">:</th>
                    <td>{{$berkasWakif->desa->nama}}</td>
                </tr>
                <tr>
                    <th class="text-right" width="45%">RT RW</th>
                    <th class="text-center" width="10%">:</th>
                    <td>RT.{{$berkasWakif->rt}} RW.{{$berkasWakif->rw}}</td>
                </tr>
                <tr>
                    <th class="text-right" width="45%">Kecamatan</th>
                    <th class="text-center" width="10%">:</th>
                    <td>{{$berkasWakif->kecamatan}}</td>
                </tr>
                <tr>
                    <th class="text-right" width="45%">Kabupaten</th>
                    <th class="text-center" width="10%">:</th>
                    <td>{{$berkasWakif->kabupaten}}</td>
                </tr>
                <tr>
                    <th class="text-right" width="45%">Provinsi</th>
                    <th class="text-center" width="10%">:</th>
                    <td>{{$berkasWakif->provinsi}}</td>
                </tr>
                <tr>
                    <th class="text-right" width="45%">Jika Sebagai Ahli Waris, Atas Nama</th>
                    <th class="text-center" width="10%">:</th>
                    <td>{{$berkasWakif->nama_pewasiat}}</td>
                </tr>
                <tr>
                    <th class="text-right" width="45%">Jika Sebagai Ahli Waris, Tahun Diwakafkan</th>
                    <th class="text-center" width="10%">:</th>
                    <td>{{$berkasWakif->tahun_diwakafkan}}</td>
                </tr>
                <tr>
                    <th class="text-right" width="45%">Keperluan Wakaf</th>
                    <th class="text-center" width="10%">:</th>
                    <td>{{$berkasWakif->keperluan}}</td>
                </tr>
                <tr>
                    <th class="text-right" width="45%">Dibuat Pada</th>
                    <th class="text-center" width="10%">:</th>
                    <td>{{ $berkasWakif->updated_at->diffForHumans() }}</td>
                </tr>
                <tr>
                    <th class="text-right" width="45%">Diubah Pada</th>
                    <th class="text-center" width="10%">:</th>
                    <td>{{ $berkasWakif->created_at->diffForHumans() }}</td>
                </tr>
                <tr>
                    <th class="text-right" width="45%">Status</th>
                    <th class="text-center" width="10%">:</th>
                    <td>{{ $berkasWakif->status->status }}</td>
                </tr>
            </thead>
        </table>

    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Informasi Status Pengajuan Berkas</h3>
    </div>

    <div class="card-body table-responsive mr-2">

        <table class="table table-borderless">
            <thead>
                @php 
                    $column = ['ket_review_data', 'tgl_survey', 'ket_survey', 'tgl_ikrar', 'ket_ikrar', 'ket_akta_ikrar', 'ket_ditolak'];
                @endphp

                @forelse ($berkasWakif->desStatusBerkas as $key => $item)
                Pengajuan {{$key+1}} :
                @if ($item->ket_ditolak)
                    <br><br><strong>Pesan Ditolak :</strong> {{$item->ket_ditolak}}
                @else
                <tr>
                    <th width="50%" class="align-text-top">Review Data</th>
                    <th width="3%" class="align-text-top">:</th>
                    <td>{{ $desStatus->{$column[0]} ?? 'Menunggu diproses' }}</td>
                </tr>
                <tr>
                    <th width="50%" class="align-text-top">Tanggal Pelaksanaan Survey</th>
                    <th width="3%" class="align-text-top">:</th>
                    <td>{{ $desStatus->{$column[1]} ? date('d-m-Y H:i', strtotime($desStatus->{$column[1]})) : 'Menunggu diproses' }}</td>
                </tr>
                <tr>
                    <th width="50%" class="align-text-top">Catatan Pasca Survey</th>
                    <th width="3%" class="align-text-top">:</th>
                    <td>{{ $desStatus->{$column[2]} ?? 'Menunggu diproses' }}</td>
                </tr>
                <tr>
                    <th width="50%" class="align-text-top">Tanggal Pelaksanaan Ikrar</th>
                    <th width="3%" class="align-text-top">:</th>
                    <td>{{ $desStatus->{$column[3]} ? date('d-m-Y H:i', strtotime($desStatus->{$column[3]})) : 'Menunggu diproses' }}</td>
                </tr>
                <tr>
                    <th width="50%" class="align-text-top">Catatan Pasca Ikrar</th>
                    <th width="3%" class="align-text-top">:</th>
                    <td>{{ $desStatus->{$column[4]} ?? 'Menunggu diproses' }}</td>
                </tr>
                <tr>
                    <th width="50%" class="align-text-top">Pembuatan Akta Ikrar</th>
                    <th width="3%" class="align-text-top">:</th>
                    <td>{{ $desStatus->{$column[5]} ?? 'Menunggu diproses' }}</td>
                </tr>
                @endif
                <br><br>
                @empty
                <tr>
                    <th width="50%" class="align-text-top">Review Data</th>
                    <th width="3%" class="align-text-top">:</th>
                    <td>Menunggu diproses</td>
                </tr>
                @endforelse

            </thead>
        </table>

    </div>
</div>

@if ($berkasWakif->id_status != 4)
<div class="card">
    <div class="card-body">
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Informasi!</h5>
            Yang anda harus lakukan saat sebelum pelaksanaan ikrar atau saat akta akan dibuat oleh petugas KUA adalah: <br>
            <ol>
                <li>Menyiapkan materai 6000 sebanyak 6 lembar</li>
                <li>Menyiapkan Fotocopy KTP Wakif 3 Lembar Dilegalisir Desa</li>
                <li>Menyiapkan Fotocopy KTP 5 orang nadzir (perorangan) masing-masing 3 lembar dilegalisir desa, Stempel Badan Hukum dan dilampiri Akte Pendirian (Jika Yayasan)</li>
            </ol>
            Keterangan: <br>
            Wakif -> anda sebagai pihak yang mewakafkan tanah <br>
            Nadzir -> pihak yang menerima harta benda wakaf dari wakif untuk dikelola dan dikembangkan sesuai dengan peruntukannya <br> <br>
            informasi lebih lanjut <a class="btn btn-dark btn-sm text-decoration-none" href="/persyaratan">klik disini</a> <br> <br>
            Kemudian data Nadzir dan Saksi akan tersedia ketika Anda telah menyerahkan data nadzir dan saksi (masing fotocopy KTP 3 rangkap) kepada petugas KUA untuk diinputkan, 
        </div>
    </div>
</div>
@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Nadzir</h3>
    </div>

    <div class="card-body table-responsive mr-2">
        @php $i = 1 @endphp
        @forelse ($berkasWakif->nadzir()->get() as $item)
            <div class="alert alert-dark">
                <h6 class="mb-0 font-weight-bold"> Nadzir {{ $i++ }} ({{ $item->pivot->jabatan }})</h6>
            </div>
            <div class="row">
                <table class="table table-borderless col-md-6" id="table">
                    <thead>
                        <tr>
                            <th> Nama </th>
                            <td> {{ $item->nama }} </td>
                        </tr>
                        <tr>
                            <th> NIK </th>
                            <td> {{ $item->nik }} </td>
                        </tr>
                        <tr>
                            <th> TTL </th>
                            <td> {{ $item->tempat_lahir .', '. $item->tanggal_lahir }} </td>
                        </tr>
                        <tr>
                            <th> Agama </th>
                            <td> {{ $item->agama->agama }} </td>
                        </tr>
                        <tr>
                            <th> Pendidikan Terakhir </th>
                            <td> {{ $item->pendidikanTerakhir->tingkat }} </td>
                        </tr>
                        <tr>
                            <th> Pekerjaan </th>
                            <td> {{ $item->pekerjaan }} </td>
                        </tr>
                    </thead>
                </table>

                <table class="table table-borderless col-md-6" id="table">
                    <thead>
                        <tr>
                            <th class="align-text-top"> Kewarganegaraan </th>
                            <td> {{ $item->kewarganegaraan }} </td>
                        </tr>
                        <tr>
                            <th class="align-text-top"> RT/RW </th>
                            <td> {{ $item->rt }}/{{ $item->rw }} </td>
                        </tr>
                        <tr>
                            <th class="align-text-top"> Alamat </th>
                            <td> {{ $item->desa->nama .' - '. $item->kecamatan .' - '. $item->kabupaten .' - '. $berkasWakif->wakif->provinsi }} </td>
                        </tr>
                    </thead>
                </table>
            </div>
        @empty
        <div class="alert alert-info">
            <h6 class="mb-0 font-weight-bold"> Nadzir belum diinputkan, penginputan data pada saat setelah pelaksaan ikrar wakaf </h6>
        </div>
        @endforelse

        @if ($berkasWakif->nadzir()->first() && $berkasWakif->nadzir()->first()->pivot->no_akta_notaris)
            <div class="alert alert-dark">
                <h6 class="mb-0 font-weight-bold"> Keterangan Nadzir Berbadan Hukum / Organisasi</h6>
            </div>
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th width="50%">Nama Badan Hukum / Organisasi</th>
                        <td>{{$berkasWakif->nadzir()->first()->pivot->nama_badan_hukum_organisasi }}</td>
                    </tr>
                    <tr>
                        <th width="50%">Nomor Akta Notaris</th>
                        <td>{{$berkasWakif->nadzir()->first()->pivot->no_akta_notaris }}</td>
                    </tr>
                    <tr>
                        <th width="50%" style="vertical-align: top;">Struktur Kepengurusan</th>
                        <td>
                            <ol>
                                <li>(Ketua) {{$berkasWakif->nadzir()->first()->nama }}</li>
                                <li>(Sekretaris) {{$berkasWakif->nadzir()->first()->pivot->sekretaris }}</li>
                                <li>(Bendahara) {{$berkasWakif->nadzir()->first()->pivot->bendahara }}</li>
                            </ol>
                        </td>
                    </tr>
                    <tr>
                        <th width="50%">Letak Tempat Yang Diwakafkan</th>
                        <td>RT.{{$berkasWakif->rt}} RW.{{$berkasWakif->rt}}</td>
                    </tr>
                </thead>
            </table>
        @endif
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Saksi</h3>
    </div>

    <div class="card-body table-responsive mr-2">
        @php $i = 1 @endphp
        @forelse ($berkasWakif->saksi()->get() as $item)
            <div class="alert alert-info">
                <h6 class="mb-0 font-weight-bold"> Saksi {{ $i++ }}</h6>
            </div>
            <div class="row">
                <table class="table table-borderless col-md-6" id="table">
                    <thead>
                        <tr>
                            <th> Nama </th>
                            <td> {{ $item->nama }} </td>
                        </tr>
                        <tr>
                            <th> NIK </th>
                            <td> {{ $item->nik }} </td>
                        </tr>
                        <tr>
                            <th> TTL </th>
                            <td> {{ $item->tempat_lahir .', '. $item->tanggal_lahir }} </td>
                        </tr>
                        <tr>
                            <th> Agama </th>
                            <td> {{ $item->agama->agama }} </td>
                        </tr>
                        <tr>
                            <th> Pendidikan Terakhir </th>
                            <td> {{ $item->pendidikanTerakhir->tingkat }} </td>
                        </tr>
                        <tr>
                            <th> Pekerjaan </th>
                            <td> {{ $item->pekerjaan }} </td>
                        </tr>
                    </thead>
                </table>

                <table class="table table-borderless col-md-6" id="table">
                    <thead>
                        <tr>
                            <th class="align-text-top"> Kewarganegaraan </th>
                            <td> {{ $item->kewarganegaraan }} </td>
                        </tr>
                        <tr>
                            <th class="align-text-top"> RT/RW </th>
                            <td> {{ $item->rt .'/'. $item->rw }} </td>
                        </tr>
                        <tr>
                            <th class="align-text-top"> Alamat </th>
                            <td> {{ $item->desa->nama .' - '. $item->kecamatan .' - '. $item->kabupaten .' - '. $berkasWakif->wakif->provinsi }} </td>
                        </tr>
                    </thead>
                </table>
            </div>
        @empty
        <div class="alert alert-info">
            <h6 class="mb-0 font-weight-bold"> Saksi belum diinputkan, penginputan data pada saat setelah pelaksaan ikrar wakaf </h6>
        </div>
        @endforelse
    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop