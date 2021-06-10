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

    <div class="card-body table-responsive mr-2">
        <table class="table table-borderless">
            <thead>
                @php 
                    $column = ['ket_review_data', 'tgl_survey', 'ket_survey', 'tgl_ikrar', 'ket_ikrar', 'ket_akta_ikrar', 'ket_ditolak'];
                @endphp

                @foreach ($berkasWakif->desStatusBerkas as $key => $item)
                    Pengajuan {{$key+1}} :
                    @if ($item->ket_ditolak)
                        Pesan {{$item->ket_ditolak}}
                    @else
                        <tr>
                            <th width="50%" class="align-text-top">Review Data</th>
                            <th width="3%" class="align-text-top">:</th>
                            <td>{{ $desStatus->{$column[0]} ?? 'Menunggu diproses' }}</td>
                        </tr>
                        <tr>
                            <th width="50%" class="align-text-top">Tanggal Pelaksanaan Survey</th>
                            <th width="3%" class="align-text-top">:</th>
                            <td>{{ $desStatus->{$column[1]} ? date('d-m-Y H:m', strtotime($desStatus->{$column[1]})) : 'Menunggu diproses' }}</td>
                        </tr>
                        <tr>
                            <th width="50%" class="align-text-top">Catatan Pasca Survey</th>
                            <th width="3%" class="align-text-top">:</th>
                            <td>{{ $desStatus->{$column[2]} ?? 'Menunggu diproses' }}</td>
                        </tr>
                        <tr>
                            <th width="50%" class="align-text-top">Tanggal Pelaksanaan Ikrar</th>
                            <th width="3%" class="align-text-top">:</th>
                            <td>{{ $desStatus->{$column[3]} ? date('d-m-Y H:m', strtotime($desStatus->{$column[3]})) : 'Menunggu diproses' }}</td>
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
                    <th> Sertifikat Tanah </th>
                    <th> Surat Ukur </th>
                    <th> SKTTS </th>
                    <th> SPPT </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="{{ Storage::disk('public')->url('berkas/sertifikat_tanah/'.$berkasWakif->sertifikat_tanah) }}" class="btn btn-link" target="_blank">Lihat File</a></td>
                    <td><a href="{{ Storage::disk('public')->url('berkas/surat_ukur/'.$berkasWakif->surat_ukur) }}" class="btn btn-link" target="_blank">Lihat File</a></td>
                    <td><a href="{{ Storage::disk('public')->url('berkas/sktts/'.$berkasWakif->sktts) }}" class="btn btn-link" target="_blank">Lihat File</a></td>
                    <td><a href="{{ Storage::disk('public')->url('berkas/sppt/'.$berkasWakif->sppt) }}" class="btn btn-link" target="_blank">Lihat File</a></td>
                </tr>
            </tbody>
        </table>

    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Nadzir</h3>
    </div>

    <div class="card-body table-responsive mr-2">

        @php $i = 1 @endphp
        @foreach ($berkasWakif->nadzir as $item)
            <div class="alert alert-dark">
                <h6 class="mb-0 font-weight-bold"> Nadzir {{ $i++ }} ({{ $item->jabatan }})</h6>
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
        @endforeach

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