@extends('dashboard.layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">

               <div class="row">
                   <div class="col-md-4">
                       <center>
                        <h2>{{ $pesan }}</h2>
                        </center>

                        @if($cek > 0)

                        <p>
                            <center>
                                <a target="_blank" href="{{ url('cetak-biodata') }}" class="btn btn-flat btn-success">Cetak Bukti Pendaftaran</a>
                            </center>
                        </p>
                        @endif
                   </div>

                   <div class="col-md-4">
                       <center>
                        <h2>{{ $status }}</h2>
                        </center>
                   </div>


                   <div class="col-md-4">
                       <center>
                        <h2>{{ $pesan_lulus }}</h2>
                        </center>
                   </div>
               </div>
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