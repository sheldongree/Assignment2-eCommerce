<html>

<head>
	<title>
		<?= $name ?> view
	</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
		crossorigin="anonymous"></script>
	<link rel="stylesheet" href="/app/styles.css">
</head>

<body>
	<div class='container'>
		<form method='post' action=''>
			<div class="form-group">
				<label>First name:<input type="text" class="form-control" name="first_name" placeholder="Jon" /></label>
			</div>
			<div class="form-group">
				<label>Last name:<input type="text" class="form-control" name="last_name" placeholder="Doe" /></label>
			</div>
			<div class="form-group">
				<label>Middle name:<input type="text" class="form-control" name="middle_name"
						placeholder="Jhonson" /></label>
			</div>
			<div class="form-group">
				<input type="submit" name="action" value="Record my profile" />
				<a href='/User/login'>Cancel</a>
			</div>
		</form>
	</div>
</body>

</html>