@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@section('title', 'Pengajuan Tahap Survey')

@section('content_header')
<h1>Pengajuan Wakaf Tahap Survey</h1>
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
                    <th> Tgl Survey </th>
                    <th> Pasca Survey </th>
                    <th width="15%"> Action </th>
                </tr>
            </thead>
            <tbody> </tbody>
        </table>

    </div>
</div>

<div class="modal fade" id="modalTglSurvey" style="display: none; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title">Pesan Untuk Atur Jadwal Survey</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="alert alert-light alert-dismissible">
                    <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                    Silahkan tentukan jadwal pelaksanaan survey ke lapangan tanah yang akan diwakafkan dengan wakif
                </div>

                <form id="formTglSurvey" action="" method="post">
                    @csrf
                    @method('PUT')
                    
                    <input type="hidden" name="type" value="tgl_survey">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="date_tgl_survey">Tanggal</label>
                            <input type="date" id="date_tgl_survey" name="date_tgl_survey" class="form-control {{ $errors->has('date_tgl_survey') ? 'is-invalid' : '' }}" value="{{ old('date_tgl_survey') }}">
                            <small>format: bulan/hari/tahun</small>

                            @if($errors->has('date_tgl_survey'))
                                <span id="date_tgl_survey-error" class="invalid-feedback d-block">
                                    <strong>{{ $errors->first('date_tgl_survey') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="time_tgl_survey">Waktu</label>
                            <input type="time" id="time_tgl_survey" name="time_tgl_survey" class="form-control {{ $errors->has('time_tgl_survey') ? 'is-invalid' : '' }}" value="{{ old('time_tgl_survey') }}">

                            @if($errors->has('time_tgl_survey'))
                                <span id="time_tgl_survey-error" class="invalid-feedback d-block">
                                    <strong>{{ $errors->first('time_tgl_survey') }}</strong>
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

<div class="modal fade" id="modalKetSurvey" style="display: none; padding-right: 17px;" aria-modal="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h4 class="modal-title">Pesan Untuk Pasca Survey</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="alert alert-light alert-dismissible">
                    <h5><i class="icon fas fa-info"></i> Informasi!</h5>
                    Anda dapat menambahkan catatan saat setelah survey lapangan dilaksanakan, dan Anda juga dapat mengubah pesan yang ingin disampaikan sesuai dengan kebutuhan
                </div>

                <form id="formKetSurvey" action="" method="post">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="type" value="ket_survey">
                    <input type="hidden" name="id_status" value="3">
<textarea name="pesan" class="form-control" cols="30" rows="10">
Catatan survey lapangan tanah
Lokasi dekat ........
antara gedung ....... dan ........
dekat dengan jalan raya
luas tanah sekitar 500x500
Tanah berhasil disurvey, dan sesuai dengan data yang anda kirim
Silahkan tunggu jadwal selanjutnya untuk melaksanakan ikrar wakaf, dan persiapkan diri anda untuk melaksanakannya
Terimakasih
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
        ajax: "{{ route('admin.survey.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'nik', name: 'nik'},
            {data: 'desa', name: 'desa'},
            {data: 'updated_at', name: 'updated_at'},
            {data: 'tgl_survey', name: 'tgl_survey', orderable: false, searchable: false, 
                render: function(data, _type, _full) {
                    let URL_TGL_SURVEY = "{{ route('admin.survey.update', ':id') }}";
                    if(data.tgl_survey){
                        return data.tgl_survey;
                    } 
                    return '<button id="btnTglSurvey" data-url="'+URL_TGL_SURVEY.replace(':id', data.id)+'" class="btn btn-outline-success btn-sm mr-1 mb-2"><i class="fas fa-calendar-day"></i> Atur Jadwal</button>';
            }},
            {data: 'ket_survey', name: 'ket_survey', orderable: false, searchable: false, 
                render: function(data, _type, _full) {
                    let URL_CATATAN_SURVEY = "{{ route('admin.survey.update', ':id') }}";
                    if(data.ket_survey){
                        return data.ket_survey;
                    }
                    if(data.tgl_survey){
                        return '<button id="btnKetSurvey" data-url="'+URL_CATATAN_SURVEY.replace(':id', data.id)+'" class="btn btn-outline-success btn-sm mr-1 mb-2"><i class="fas fa-sticky-note"></i> Catatan Survey </button>';
                    } else {
                        return 'Silahkan Jadwalkan survey dulu';
                    }
                    
            }},
            {data: 'action', name: 'action', orderable: false, searchable: false,
                render: function( data, _type, _full ) {
                    let URL_DETAIL = "{{ route('admin.berkas-wakif.show', ':id') }}";
                    return '<a href="'+URL_DETAIL.replace(':id', data)+'" class="btn btn-outline-info btn-sm mr-1"><i class="fas fa-eye"></i> Lihat Berkas</a>';
            }},
        ]
    });

    $('.table').on('click','#btnTglSurvey[data-url]',function(e){
        $('#formTglSurvey').prop('action', $(this).data('url'));
        $('#modalTglSurvey').modal('show');
    });

    $('.table').on('click','#btnKetSurvey[data-url]',function(e){
        $('#formKetSurvey').prop('action', $(this).data('url'));
        $('#modalKetSurvey').modal('show');
    });

})
</script>
@stop