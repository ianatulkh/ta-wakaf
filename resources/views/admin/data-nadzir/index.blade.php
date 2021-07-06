@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('title', 'Data Nadzir')

@section('content_header')
<h1>Data Nadzir</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Nadzir</h3>
    </div>

    <div class="card-body table-responsive mr-2">
        
        <x-alert/>

        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i> Informasi!</h5>
            Data nadzir yang telah memiliki data akta ikrar (sudah menjadi nadzir di beberapa wakaf) tidak dapat dihapus, karena untuk kepentingan arsip KUA
        </div>

        <a href="{{ route('admin.data-nadzir.create') }}" class="btn btn-primary mb-2">Tambah Nadzir</a>

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
        ajax: "{{ route('admin.data-nadzir.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'nik', name: 'nik'},
            {data: 'ttl', name: 'ttl'},
            {data: 'pendidikan', name: 'pendidikan'},
            {data: 'pekerjaan', name: 'pekerjaan'},
            {data: 'desa', name: 'desa'},
            {data: 'action', name: 'action', orderable: false, searchable: false,
                render: function( data, _type, _full ) {
                    let btn = null;
                    let URL_SHOW = '{{ route("admin.data-nadzir.show", ":id") }}';
                    let URL_EDIT = '{{ route("admin.data-nadzir.edit", ":id") }}';
                    let URL_DESTROY = '{{ route("admin.data-nadzir.destroy", ":id") }}';

                    btn = '<a href="'+URL_SHOW.replace(':id', data.id)+'" class="btn btn-outline-dark btn-sm mr-1"><i class="fas fa-eye"></i> Lihat</a>';
                    btn += '<a href="'+URL_EDIT.replace(':id', data.id)+'" class="btn btn-outline-success btn-sm mr-1"><i class="fas fa-pen"></i> Edit</a>';
                    if(data.countBerkasWakif <= 0){
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