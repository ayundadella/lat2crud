@extends('layouts.master')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12" style="margin-top: 100px;">

      @if(Session::has('berhasil'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                    {{ Session::get('berhasil') }}
                </div>
                @endif
 
                @if(Session::has('gagal'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                    {{ Session::get('gagal') }}
                </div>
                @endif

			<form role="form" method="POST" action="{{ url('ppdb') }}" enctype="multipart/form-data">
				@csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Peserta</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Peserta" name="nama">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">NISN</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="NISN" name="nisn">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Foto Peserta</label>
                  <input type="file" id="exampleInputFile" name="photo">
 
                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>
              </div>
              <!-- /.box-body -->
 
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
        </div>
    </div>
</div>
@endsection