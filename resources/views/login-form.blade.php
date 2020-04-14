<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<form action="{{ route('login.login') }}" method="POST">
				@csrf

				<div class="form-group">
					<label class="control-label">Username</label>
					<input type="text" class="form-control" name="username">
			</div>
			<div class="form-group">
					<label class="control-label">Password</label>
					<input type="password" class="form-control" name="password">
			</div>
			<button type="submit" class="btn btn-primary">Login</button>
		</div>
	</div>
</form>
</div>
</body>
</html>