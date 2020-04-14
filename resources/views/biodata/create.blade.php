@extends('layout')

@section('content')

	<form action="{{ route('biodata.store') }}" method="POST" class="form-horizontal" 
	enctype="multipart/form-data">

		@csrf
		
		<div class="form-group">
			<label class="control-label">Nama</label>
			<input type="text" class="form-control" name="name" required>
		</div>
		<div class="form-group">
			<label class="control-label">NIM</label>
			<input type="text" class="form-control" name="nim" required>
		</div>
		<div class="form-group">
			<label class="control-label">Alamat</label>
			<textarea name="address" rows="5" class="form-control" required>
		</textarea>
		</div>

		<div class="form-group">
			<label class="control-label">Foto</label>
			<input type="file" name="foto">
		</div>
		<div class="form-group">
			<button class="btn btn-primary" type="submit">Simpan</button>
			<a href="{{ route('biodata.index') }}" class="btn btn-danger">Batal</a>
		</div>
	</form>
@endsection
