@extends("layout")

@section("content")
	<h1>Daftar Mahasiswa</h1>
	<table class="table table-striped table-hover" id="datatable">
		<thead>
			<tr>
				<th>ID</th>
				<th>NAMA</th>
				<th>NIM</th>
				<th>ACTION</th>
			</tr>
		</thead>
		<tbody>

			<br>
			<a href="/biodata-mahasiswa/create" class="btn btn-info"> + Tambah Data Mahasiswa</a>
			<br>
			<a href="/biodata-mahasiswa/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a>

			@forelse($mahasiswa as $data) 
			<tr>
				<td>{{ $data->id }}</td>
				<td>{{ $data->name }}</td>
				<td>{{ $data->nim }}</td>
				<td>
					<a href="{{ route('biodata.show', ['id' => $data->id]) }}" 
						class="btn btn-success">Detail</a>
					<a href="{{ route('biodata.edit', ['id' => $data->id]) }}" 
						class="btn btn-warning">Edit</a>
					<a onclick="return confirm('Apakah Anda yakin?');" class="btn btn-danger" 

					type="button" href="{{ route('biodata.destroy', ['id' => $data->id]) }}">Delete</a>
				</td>
			</tr>
			@empty
				<tr>
					<td colspan="4">Data belum tersedia!</td>
				</tr>
			@endforelse
		</tbody>
	</table>
@endsection