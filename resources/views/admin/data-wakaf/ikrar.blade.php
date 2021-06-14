@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('title', 'Pengajuan Tahap Pelaksanaan Ikrar')

@section('content_header')
<h1>Pengajuan Wakaf Tahap Pelaksanaan Ikrar</h1>
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
                    <th> Tgl Ikrar </th>
                    <th> Pasca Ikrar </th>
                    <th width="15%"> Action </th>
                </tr>
            </thead>
            <tbody> </tbody>
        </table>

    </div>
</div>

<div class="modal fade" id="modalTglIkrar" style="display: none; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title">Pesan Untuk Atur Jadwal Ikrar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="alert alert-light alert-dismissible">
                    <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                    Silahkan tentukan jadwal pelaksanaan ikrar
                </div>

                <form id="formTglIkrar" action="" method="post">
                    @csrf
                    @method('PUT')
                    
                    <input type="hidden" name="type" value="tgl_ikrar">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="date_tgl_ikrar">Tanggal</label>
                            <input type="date" id="date_tgl_ikrar" name="date_tgl_ikrar" class="form-control {{ $errors->has('date_tgl_ikrar') ? 'is-invalid' : '' }}" value="{{ old('date_tgl_ikrar') }}">
                            <small>format: bulan/hari/tahun</small>

                            @if($errors->has('date_tgl_ikrar'))
                                <span id="date_tgl_ikrar-error" class="invalid-feedback d-block">
                                    <strong>{{ $errors->first('date_tgl_ikrar') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="time_tgl_ikrar">Waktu</label>
                            <input type="time" id="time_tgl_ikrar" name="time_tgl_ikrar" class="form-control {{ $errors->has('time_tgl_ikrar') ? 'is-invalid' : '' }}" value="{{ old('time_tgl_ikrar') }}">

                            @if($errors->has('time_tgl_ikrar'))
                                <span id="time_tgl_ikrar-error" class="invalid-feedback d-block">
                                    <strong>{{ $errors->first('time_tgl_ikrar') }}</strong>
                                </span>
                            @endif
                        </div>
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

<div class="modal fade" id="modalKetIkrar" style="display: none; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title">Pesan Untuk Atur Jadwal Ikrar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="alert alert-light alert-dismissible">
                    <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                    Anda dapat menambahkan catatan saat setelah ikrar
                </div>

                <form id="formKetIkrar" action="" method="post">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="type" value="ket_ikrar">
                    <input type="hidden" name="id_status" value="4">
<textarea name="pesan" class="form-control" cols="30" rows="10">
Catatan ikrar ......
</textarea>
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
        ajax: "{{ route('admin.ikrar.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'nik', name: 'nik'},
            {data: 'desa', name: 'desa'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'tgl_ikrar', name: 'tgl_ikrar', orderable: false, searchable: false, 
                render: function(data, _type, _full) {
                    let URL_TGL_IKRAR = "{{ route('admin.ikrar.update', ':id') }}";
                    if(data.tgl_ikrar){
                        return data.tgl_ikrar;
                    } 
                    return '<button id="btnTglIkrar" data-url="'+URL_TGL_IKRAR.replace(':id', data.id)+'" class="btn btn-outline-success btn-sm mr-1 mb-2"><i class="fas fa-calendar-day"></i> Atur Jadwal</button>';
            }},
            {data: 'ket_ikrar', name: 'ket_ikrar', orderable: false, searchable: false, 
                render: function(data, _type, _full) {
                    let URL_CATATAN_IKRAR = "{{ route('admin.ikrar.update', ':id') }}";
                    if(data.ket_ikrar){
                        return data.ket_ikrar;
                    } 
                    if(data.tgl_ikrar){
                        return '<button id="btnKetIkrar" data-url="'+URL_CATATAN_IKRAR.replace(':id', data.id)+'" class="btn btn-outline-success btn-sm mr-1 mb-2"><i class="fas fa-sticky-note"></i> Catatan Ikrar </button>';
                    } else {
                        return 'Silahkan Jadwalkan ikar dulu';
                    }
            }},
            {data: 'action', name: 'action', orderable: false, searchable: false,
                render: function( data, _type, _full ) {
                    let URL_DETAIL = "{{ route('admin.berkas-wakif.show', ':id') }}";
                    return '<a href="'+URL_DETAIL.replace(':id', data)+'" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-eye"></i> Lihat Berkas</a>';
            }},
        ]
    });

    $('.table').on('click','#btnTglIkrar[data-url]',function(e){
        $('#formTglIkrar').prop('action', $(this).data('url'));
        $('#modalTglIkrar').modal('show');
    });

    $('.table').on('click','#btnKetIkrar[data-url]',function(e){
        $('#formKetIkrar').prop('action', $(this).data('url'));
        $('#modalKetIkrar').modal('show');
    });

})
</script>
@stop