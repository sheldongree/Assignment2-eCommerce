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
		<h1>User profile</h1>
		<dl>
			<dt>First name:</dt>
			<dd>
				<?= $data->first_name ?>
			</dd>
			<dt>Last name:</dt>
			<dd>
				<?= $data->last_name ?>
			</dd>
			<dt>Middle name:</dt>
			<dd>
				<?= $data->middle_name ?>
			</dd>
		</dl>
		<a href='/Profile/modify'>Modify my profile</a> |
		<a href='/Profile/delete'>Delete my profile</a> |
		<a href='/User/logout'>Log Out</a> |
		<a href='/Publication/createPost'>Create a post</a> |
		<a href='/Publication/personalPublication'>View my publications</a> |
		<a href='/Publication/viewAll'>View all publications</a>



	</div>
</body>

</html>