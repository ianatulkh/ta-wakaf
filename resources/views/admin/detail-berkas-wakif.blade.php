@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('title', 'Detail Permintaan Pengajuan')

@section('content_header')
<h1>Detail Permintaan Pengajuan Wakaf</h1>
@stop

@section('content')

@if ($berkasWakif->id_status == 1 || $berkasWakif->id_status == 5)
    <div class="card">
        @if ($berkasWakif->id_status == 5)
            <div class="card-header bg-danger">
                <h3 class="card-title">Pengajuan Ini Ditolak</h3>
            </div>
            <div class="card-body">
                @foreach ($berkasWakif->desStatusBerkas as $key => $item)
                    <strong>Pesan Pengajuan {{ $key+1 }}</strong> : {{ $item->ket_ditolak }} <br><br>
                @endforeach
            </div>

        @else
            <div class="card-header">
                <h3 class="card-title">Pilihan Keputusan Pengajuan Wakaf</h3>
                <div class="float-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalDisetujui">Setujui</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDitolak">Tolak</button>
                </div>
            </div>
            @if (count($berkasWakif->desStatusBerkas) >= 1)
                <div class="card-body">
                    @foreach ($berkasWakif->desStatusBerkas as $key => $item)
                        <strong>Pesan Pengajuan {{ $key+1 }}</strong> : {{ $item->ket_ditolak }} <br><br>
                    @endforeach
                </div>    
            @endif
        
        @endif
    </div>

@else

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Riwayat Status</h3>
    </div>

    @php 
        $column = ['ket_review_data', 'tgl_survey', 'ket_survey', 'tgl_ikrar', 'ket_ikrar', 'ket_akta_ikrar', 'ket_ditolak'];
    @endphp
    <div class="card-body table-responsive mr-2">
        <table class="table table-borderless">
            <thead>
                @foreach ($berkasWakif->desStatusBerkas as $key => $item)
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
                @endforeach

            </thead>
        </table>
    </div>
</div>

@endif

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Identitas Wakif</h3>
    </div>

    <div class="card-body table-responsive">

        <div class="row">
            <table class="table table-borderless col-md-6" id="table">
                <thead>
                    <tr>
                        <th> Nama </th>
                        <td> {{ $berkasWakif->wakif->nama }} </td>
                    </tr>
                    <tr>
                        <th> NIK </th>
                        <td> {{ $berkasWakif->wakif->nik }} </td>
                    </tr>
                    <tr>
                        <th> TTL </th>
                        <td> {{ $berkasWakif->wakif->tempat_lahir .', '. $berkasWakif->wakif->tanggal_lahir }} </td>
                    </tr>
                    <tr>
                        <th> Agama </th>
                        <td> {{ $berkasWakif->wakif->agama->agama }} </td>
                    </tr>
                    <tr>
                        <th> Pendidikan Terakhir </th>
                        <td> {{ $berkasWakif->wakif->pendidikanTerakhir->tingkat }} </td>
                    </tr>
                    <tr>
                        <th> Pekerjaan </th>
                        <td> {{ $berkasWakif->wakif->pekerjaan }} </td>
                    </tr>
                </thead>
            </table>

            <table class="table table-borderless col-md-6" id="table">
                <thead>
                    <tr>
                        <th class="align-text-top"> Kewarganegaraan </th>
                        <td> {{ $berkasWakif->wakif->kewarganegaraan }} </td>
                    </tr>
                    <tr>
                        <th class="align-text-top"> RT/RW </th>
                        <td> {{ $berkasWakif->wakif->rt .'/'. $berkasWakif->wakif->rw }} </td>
                    </tr>
                    <tr>
                        <th class="align-text-top"> Alamat </th>
                        <td> {{ $berkasWakif->wakif->desa->nama .' - '. $berkasWakif->wakif->kecamatan .' - '. $berkasWakif->wakif->kabupaten .' - '. $berkasWakif->wakif->provinsi }} </td>
                    </tr>
                    <tr>
                        <th class="align-text-top"> KTP </th>
                        <td> <a href="{{ Storage::disk('public')->url('ktp_wakif/'.$berkasWakif->wakif->ktp) }}" target="_blank">Lihat KTP</a> </td>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Berkas Yang Diajukan</h3>
    </div>

    <div class="card-body table-responsive mr-2">
        <table class="table table-borderless" id="table">
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
                    <td>{{$berkasWakif->atas_hak_lain ?? ''}}</td>
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
                        <tr>
                            <th class="align-text-top"> KTP </th>
                            <td> <a href="{{ Storage::disk('public')->url('ktp_wakif/'.$berkasWakif->wakif->ktp) }}" target="_blank">Lihat KTP</a> </td>
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
                        <tr>
                            <th class="align-text-top"> KTP </th>
                            <td> <a href="{{ Storage::disk('public')->url('ktp_wakif/'.$berkasWakif->wakif->ktp) }}" target="_blank">Lihat KTP</a> </td>
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

{{-- MODALS --}}
@if ($berkasWakif->id_status == 1 || $berkasWakif->id_status == 5)
    <div class="modal fade" id="modalDisetujui" style="display: none; padding-right: 17px;" aria-modal="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title">Pesan Untuk Review Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="alert alert-light alert-dismissible">
                        <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                        Anda dapat mengubah pesan yang ingin disampaikan sesuai dengan kebutuhan
                    </div>

                    <form action="{{ route('admin.setujui-wakaf.update', $berkasWakif->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id_status" value="2">
                        <textarea name="pesan" class="form-control" cols="30" rows="10">Kami telah menyetujui pengajuan wakaf anda, Setelah ini harap untuk menunggu jadwal survey lapangan yang diharuskan untuk bertemu </textarea>
                    
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Setujui</button>
                </div>
                    </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDitolak" style="display: none; padding-right: 17px;" aria-modal="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title">Pesan Untuk Menolak Pengajuan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="alert alert-light alert-dismissible">
                        <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                        Anda dapat mengubah pesan yang ingin disampaikan sesuai dengan kebutuhan
                    </div>

                    <form action="{{ route('admin.setujui-wakaf.update', $berkasWakif->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id_status" value="5">
                        <textarea name="pesan" class="form-control" cols="30" rows="10">Mohon Maaf, Permintaan anda untuk mengajukan wakaf tidak disetujui, dikarenakan terdapat data yang tidak valid dan tidak dapat dibaca, mohon untuk mengajukan kembali perminataan wakaf anda</textarea>
                    
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Tolak</button>
                </div>
                    </form>
            </div>
        </div>
    </div>
@endif


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>        
$(function () {
    
})
</script>
@stop