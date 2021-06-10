@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('title', 'Permintaan Pengajuan')

@section('content_header')
<h1>Permintaan Pengajuan Wakaf</h1>
@stop

@section('content')

<div class="card">

    <div class="card-body table-responsive mr-2">

        <x-alert/>

        <table class="table table-bordered dataTable" id="table">
            <thead>
                <tr>
                    <th> # </th>
                    <th> Nama </th>
                    <th> NIK </th>
                    <th> Desa    </th>
                    <th> Diajukan pada </th>
                    <th width="15%"> Action </th>
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
        ajax: "{{ route('admin.setujui-wakaf.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'nik', name: 'nik'},
            {data: 'desa', name: 'desa'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false,
                render: function( data, _type, _full ) {
                    let URL_DETAIL = "{{ route('admin.berkas-wakif.show', ':id') }}";
                    return '<a href="'+URL_DETAIL.replace(':id', data)+'" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-eye"></i> Lihat Berkas</a>';
            }},
        ]
    });

    
})
</script>
@stop