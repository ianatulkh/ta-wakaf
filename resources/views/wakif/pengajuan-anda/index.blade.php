@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('title', 'Data Pengajuan Anda')

@section('content_header')
<h1>Data Pengajuan Anda</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Berkas Anda</h3>
    </div>

    <div class="card-body table-responsive mr-2">

        @if (session()->has('success'))
        <div class="alert alert-success mx-3 mt-3">
            {{ session('success') }}
        </div>
        @endif

        <table class="table table-bordered dataTable" id="table">
            <thead>
                <tr>
                    <th> # </th>
                    <th> Diajukan Pada</th>
                    <th> Sertifikat Tanah </th>
                    <th> Surat Ukur </th>
                    <th> SKTTS </th>
                    <th> SPPT </th>
                    <th> Status </th>
                    <th width="10%"> Action </th>
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
        ajax: "{{ route('wakif.pengajuan-wakaf.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'created_at', name: 'created_at'},
            {data: 'sertifikat_tanah', name: 'sertifikat_tanah', 
                render: function( data, _type, _full ) {
                    let URL = '{{ Storage::disk("public")->url("berkas/sertifikat_tanah/:filename") }}';
                    return '<a href="'+URL.replace(':filename', data)+'" target="_blank" class="btn btn-link">Lihat File</a>';
            }},
            {data: 'surat_ukur', name: 'surat_ukur', 
                render: function( data, _type, _full ) {
                    let URL = '{{ Storage::disk("public")->url("berkas/surat_ukur/:filename") }}';
                    return '<a href="'+URL.replace(':filename', data)+'" target="_blank" class="btn btn-link">Lihat File</a>';
            }},
            {data: 'sktts', name: 'sktts', 
                render: function( data, _type, _full ) {
                    let URL = '{{ Storage::disk("public")->url("berkas/sktts/:filename") }}';
                    return '<a href="'+URL.replace(':filename', data)+'" target="_blank" class="btn btn-link">Lihat File</a>';
            }},
            {data: 'sppt', name: 'sppt', 
                render: function( data, _type, _full ) {
                    let URL = '{{ Storage::disk("public")->url("berkas/sppt/:filename") }}';
                    return '<a href="'+URL.replace(':filename', data)+'" target="_blank" class="btn btn-link">Lihat File</a>';
            }},
            {data: 'id_status', name: 'id_status'},
            {data: 'action', name: 'action', orderable: false, searchable: false,
                render: function( data, _type, _full ) {
                    let btn = null;
                    let URL_SHOW = '{{ route("wakif.pengajuan-wakaf.show", ":id") }}';
                    let URL_EDIT = '{{ route("wakif.pengajuan-wakaf.edit", ":id") }}';
                    let URL_DESTROY = '{{ route("wakif.pengajuan-wakaf.destroy", ":id") }}';

                    btn = '<a href="'+URL_SHOW.replace(':id', data.id)+'" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-eye"></i> Detail</a>';

                    if(data.id_status == 1 || data.id_status == 5){
                        btn += '<a href="'+URL_EDIT.replace(':id', data.id)+'" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-pen"></i> Edit</a>';
                        btn += '<button type="button" data-id="'+URL_DESTROY.replace(':id', data.id)+'" class="deleteBtn btn btn-outline-danger btn-sm mr-1"><i class="fas fa-trash"></i> Hapus</button>';
                    }   
                    return btn;
            }},
        ]
    });

    // KONFIRMASI HAPUS DATA
    $('.table').on('click','.deleteBtn[data-id]',function(e){
        let id = $(this).data('id');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data ini akan terhapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#6c757d',
            confirmButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus'
        }).then((result) => {
            
            // JIKA KLIK "YA, HAPUS"
            if (result.value) {
                $.ajax({
                    url : id,
                    type: 'DELETE',
                    dataType : 'json',
                    data : { 
                        method : '_DELETE', 
                        submit : true
                    },
                    success: function(data){
                        Swal.fire('Terhapus!', 'Data berhasil dihapus.', 'success');
                        table.draw();
                    },
                    error: function (data){
                        Swal.fire('Gagal!', 'Maaf ada kesalahan, silahkan refresh.', 'error');
                    }
                });
            }
        })
    })
    
})
</script>
@stop