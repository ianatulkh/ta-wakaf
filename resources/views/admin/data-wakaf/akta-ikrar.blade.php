@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('title', 'Pengajuan Tahap Pembuatan Ikrar')

@section('content_header')
<h1>Pengajuan Wakaf Tahap Pembuatan Akta Ikrar</h1>
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
                    <th> Pasca Akta Ikrar </th>
                    <th width="15%"> Action </th>
                </tr>
            </thead>
            <tbody> </tbody>
        </table>

    </div>
</div>

<div class="modal fade" id="modalKetAktaIkrar" style="display: none; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title">Pesan Pasca Pembuatan Akta Ikrar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="alert alert-light alert-dismissible">
                    <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                    Anda dapat menambahkan catatan saat setelah akta ikrar selesai dibuat
                </div>

                <form id="formKetAktaIkrar" action="" method="post">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <textarea name="pesan" class="form-control" cols="30" rows="10">
Akta ikrar telah dibuat, silahkan pergi ke kantor untuk menandatanganinya ........</textarea>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Kirim</button>
            </div>
                </form>
        </div>
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
        ajax: "{{ route('admin.akta-ikrar.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'nik', name: 'nik'},
            {data: 'desa', name: 'desa'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'ket_akta_ikrar', name: 'ket_akta_ikrar', orderable: false, searchable: false, 
                render: function(data, _type, _full) {
                    let URL_CATATAN_AKTA_IKRAR = "{{ route('admin.akta-ikrar.update', ':id') }}";
                    if(data.ket_akta_ikrar){
                        return 'Selesai';
                    }
                    if(data.akta_ikrar){
                        return '<button id="btnKetAktaIkrar" data-url="'+URL_CATATAN_AKTA_IKRAR.replace(':id', data.id)+'" class="btn btn-outline-success btn-sm mr-1 mb-2"><i class="fas fa-sticky-note"></i> Catatan Akta Ikrar </button>';
                    } else {
                        return 'Silahkan cetak akta dahulu'
                    }
                    
            }},
            {data: 'action', name: 'action', orderable: false, searchable: false,
                render: function( data, _type, _full ) {
                    let URL_DETAIL = "{{ route('admin.berkas-wakif.show', ':id') }}";
                    let PREPARE_AKTA = "{{ route('admin.akta-ikrar.show', ':id') }}";

                    let btn = '<a href="'+URL_DETAIL.replace(':id', data)+'" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-eye"></i> Lihat Berkas</a>';
                    return btn += '<a href="'+PREPARE_AKTA.replace(':id', data)+'" class="btn btn-outline-dark btn-sm mt-1 mr-1"><i class="fas fa-print"></i> Cetak Akta</a>';
            }},
        ]
    });

    $('.table').on('click','#btnKetAktaIkrar[data-url]',function(e){
        $('#formKetAktaIkrar').prop('action', $(this).data('url'));
        $('#modalKetAktaIkrar').modal('show');
    });

})
</script>
@stop