@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <img src="{{ asset('homepage/images/logo_kua.png') }}" alt="" width="100%">
            </div>
            <div class="mr-4"></div>
            <div class="col-md-9 my-auto">
                <h2>Selamat datang Petugas KUA</h2>
                <span class="mr-3">
                     Aplikasi ini merupakan aplikasi management tanah wakaf yang dapat digunakan oleh penduduk Kecamatan Pulosari Kabupaten Pemalang Jawa Tengah untuk mempermudah mendaftar tanah wakaf tanah secara online, wakif (pihak yang mewakafkan tanah) dapat mengajukan tanah wakaf pada sistem online KUA Pulosari ini dan mengirimkan berkas sesuai persyaratan
                </span>
            </div>
        </div>
    </div>
</div>

<h5>Jumlah Berdasarkan Pengajuan</h5>
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
            <h3>{{$butuhPersetujuan}}</h3>
    
            <p>Butuh Persetujuan</p>
            </div>
            <div class="icon">
                <i class="fas fa-thumbs-up"></i>
            </div>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{$dalamProses}}</h3>
    
            <p>Dalam Proses</p>
            </div>
            <div class="icon">
                <i class="fas fa-clock"></i>
            </div>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
            <h3>{{$ditolak}}</h3>
    
            <p>Ditolak</p>
            </div>
            <div class="icon">
                <i class="fas fa-times"></i>
            </div>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
            <h3>{{$selesai}}</h3>
    
            <p>Selesai</p>
            </div>
            <div class="icon">
                <i class="fas fa-check"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Pengajuan Terbaru</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0" style="display: block;">
              <div class="table-responsive">
                    <table class="table m-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Desa</th>
                        <th>Diajukan Pada</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($pengajuanTerbaru as $item)
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$item->wakif->nama}}</td>
                        <td>{{$item->desa->nama}}</td>
                        <td><span class="badge badge-success">{{date('d-m-Y H:i', strtotime($item->updated_at))}}</span></td>
                        <td><a href="{{ route('admin.berkas-wakif.show', $item->id) }}" class="btn btn-outline-info btn-sm"><i class="fas fa-eye"></i></a></td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="3">Belum ada</td>
                        </tr>
                    @endforelse
                    </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix" style="display: block;">
              <a href="{{ route('admin.setujui-wakaf.index') }}" class="btn btn-sm btn-secondary float-right">Lihat Semua Pengajuan</a>
            </div>
            <!-- /.card-footer -->
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Pengajuan Dalam Proses </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0" style="display: block;">
              <div class="table-responsive">
                    <table class="table m-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Desa</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($pengajuanDalamProses as $item)
                    <tr>
                        <td>{{$no}}</td>
                        <td>{{$item->wakif->nama}}</td>
                        <td>{{$item->desa->nama}}</td>
                        <td>
                            <span class="badge badge-success">{{$item->status->status}}</span> <br>
                            @if ($item->id_status == 2)
                                @if ($item->desStatusBerkas->last()->tgl_survey != null && $item->desStatusBerkas->last()->ket_survey == null)
                                    Jadwal:<br>{{date('d-m-Y H:i', strtotime($item->desStatusBerkas->last()->tgl_survey))}}
                                @endif
                            @elseif($item->id_status == 3)
                                @if (!empty($item->desStatusBerkas->last()->tgl_ikrar) && empty($item->desStatusBerkas->last()->ket_ikrar))
                                    Jadwal:<br>{{date('d-m-Y H:i', strtotime($item->desStatusBerkas->last()->tgl_ikrar))}}
                                @endif
                            @elseif($item->id_status == 4)
                                @if (empty($item->desStatusBerkas->last()->ket_akta_ikrar))
                                    Jadwal: <br>{{date('d-m-Y H:i', strtotime($item->desStatusBerkas->last()->tgl_ikrar))}}
                                @endif
                            @endif
                        </td>
                        <td><a href="{{ route('admin.berkas-wakif.show', $item->id) }}" class="btn btn-outline-info btn-sm"><i class="fas fa-eye"></i></a></td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="3">Belum ada</td>
                        </tr>
                    @endforelse
                    </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix" style="display: block;">
              <a href="{{ route('admin.setujui-wakaf.index') }}" class="btn btn-sm btn-secondary float-right">Lihat Semua Pengajuan</a>
            </div>
            <!-- /.card-footer -->
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop