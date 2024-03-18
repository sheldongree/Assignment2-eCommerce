<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $name ?> view</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            color: white;
        }

        input[type="text"],
        input[type="password"] {
            padding: 8px;
            border: none;
            border-radius: 4px;
        }

        input[type="submit"] {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class='container'>
        <form method='post' action=''>
            <div class="form-group">
                <label>Username:<input type="text" class="form-control" name="username" placeholder="Jon" /></label>
            </div>
            <div class="form-group">
                <label>Password:<input type="password" class="form-control" name="password" placeholder="password" /></label>
            </div>

            <div class="form-group">
                <input type="submit" name="action" value="Login" />
                <a href='/User/register'>Sign Up</a>
            </div>
        </form>
    </div>
</body>

</html>
