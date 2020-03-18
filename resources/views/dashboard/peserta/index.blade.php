@extends('dashboard.layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="{{ url('peserta') }}" class="btn btn-sm btn-primary"><i class="fa fa-refresh"></i> Semua Peserta </a>

                    <a href="{{ url('peserta/verifikasi') }}"" class="btn btn-sm btn-success"><i class="fa fa-refresh"></i> Di verifikasi</a>

                    <a href="{{ url('peserta/belum-verifikasi') }}"" class="btn btn-sm btn-danger"><i class="fa fa-refresh"></i> Belum verifikasi</a>

                </p>
            </div>
            <div class="box-body">
               
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>NISN</th>
                                <th>Email</th>
                                <th>ID Registrasi</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Melengkapi Data</th>
                                <th>Verifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $e=>$dt)
                            <tr>
                                <td>{{ $e+1 }}</td>
                                <td>{{ $dt->name }}</td>
                                <td>{{ $dt->nisn }}</td>
                                <td>{{ $dt->email }}</td>
                                <td>{{ $dt->id_registrasi }}</td>
                                <td>{{ $dt->biodata_r->alamat }}</td>
                                <td>{{ $dt->biodata_r->no_hp }}</td>
                                @if($dt->biodata_r_count > 0)
                                <td>
                                   <label class="label label-success">Sudah melengkapi</label> 
                                </td>
                                @else
                                <td>
                                    <label class="label label-danger">Belum melengkapi</label>
                                </td>
                                @endif

                                <!-- belum verifikasi -->
                                @if($dt->is_verifikasi ==1)
                                <td>
                                   <label class="label label-success">Sudah Diverifikasi</label> 
                                </td>
                                @else
                                <td>
                                    <label class="label label-danger">Belum Diverifikasi</label>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

            </div>
        </div>
    </div>
</div>
 
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection