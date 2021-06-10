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
                    <th>Sertifikat Tanah</th>
                    <td><a href="{{ Storage::disk('public')->url('berkas/sertifikat_tanah/'.$berkasWakif->sertifikat_tanah) }}" target="_blank">Lihat Berkas</a></td>
                </tr>
                <tr>
                    <th>Surat Ukur</th>
                    <td><a href="{{ Storage::disk('public')->url('berkas/surat_ukur/'.$berkasWakif->surat_ukur) }}" target="_blank">Lihat Berkas</a></td>
                </tr>
                <tr>
                    <th>SK Tidak Tanah Sengketa</th>
                    <td><a href="{{ Storage::disk('public')->url('berkas/sktts/'.$berkasWakif->sktts) }}" target="_blank">Lihat Berkas</a></td>
                </tr>
                <tr>
                    <th>Surat Pemberitahuan Pajak Terutang</th>
                    <td><a href="{{ Storage::disk('public')->url('berkas/sppt/'.$berkasWakif->sppt) }}" target="_blank">Lihat Berkas</a></td>
                </tr>
                <tr>
                    <th>Dibuat Pada</th>
                    <td>{{ $berkasWakif->updated_at->diffForHumans() }}</td>
                </tr>
                <tr>
                    <th>Diubah Pada</th>
                    <td>{{ $berkasWakif->created_at->diffForHumans() }}</td>
                </tr>
                <tr>
                    <th>Status</th>
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


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Nadzir</h3>
    </div>

    <div class="card-body table-responsive mr-2">

        <table class="table table-bordered dataTable" id="table">
            <thead>
                <tr>
                    <th> # </th>
                    <th> Nama </th>
                    <th> NIK </th>
                    <th> TTL </th>
                    <th> Pendidikan </th>
                    <th> Pekerjaan </th>
                    <th> Desa    </th>
                    <th> KTP    </th>
                </tr>
            </thead>
            <tbody> </tbody>
        </table>

    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>        
$(function () {
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), } });

     // KONFIGURASI DATATABLES 
     let table = $('.dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('wakif.pengajuan-wakaf.show', $berkasWakif->id) }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'nik', name: 'nik'},
            {data: 'ttl', name: 'ttl'},
            {data: 'pendidikan', name: 'pendidikan'},
            {data: 'pekerjaan', name: 'pekerjaan'},
            {data: 'desa', name: 'desa'},
            {data: 'ktp', name: 'ktp', 
                render: function( data, _type, _full ) {
                    let URL = '{{ Storage::disk("public")->url("berkas/ktp_nadzir/:filename") }}';
                    return '<a href="'+URL.replace(':filename', data)+'" target="_blank" class="btn btn-link">Lihat KTP</a>';
            }},
        ]
    });
    
})
</script>
@stop