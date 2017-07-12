<?php

require_once "db-connection.php";

session_start();


?>

<!DOCTYPE html>
<title>Login Grapevine</title>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="CSS/New_Stylesheet.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="bootstrap.min.css" rel="stylesheet">
</head>


<body>


<div class="container">

    <div class="login-heading">
        <h1 class="logintitle">Login here!</h1>
    </div>

    <div class="row">

        <div class="col-md-8">
            <div class="panel" style="...">
                <div class="form-group">
                    <form action="Login.php" name="login" method="post">
                    <label for="usr">email</label>
                    <input type="text" class="form-control" id="usr" placeholder="email">
                </div>
                <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Password">
                </div>
                <button type="button" class="btn btn-primary btn-lg">Login</button>
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>

</div>



</body>
</html>