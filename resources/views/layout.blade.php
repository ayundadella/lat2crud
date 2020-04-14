<!DOCTYPE html>
<html>

<head>
	<title>SI Mahasiswa</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
</head>

<body>


	<div class="container">
		<div class="col-md-12">
			<a href="{{ route('logout') }}">
			Logout</a>
	</div>
	
	<div class="container">

		@yield('content')

    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
	
	$(document).ready(function () {

		var table = $('#datatable').DataTable();

		table.on('click', '.detail', function () {

			$tr = $(this).closest('tr');
			if ($($tr).hasClass('child')) {
				$tr = $tr.prev('.parent');
			}

			var data = table.row($tr).data();
			console.log(data);

			$('#id').val(data[0]);
			$('#name').val(data[1]);
			$('#nim').val(data[2]);

			$('#EditModal').modal('show');

		})

	})

</script>

</body>
</html>