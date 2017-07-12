<html>
<head>
        <link rel="stylesheet" href="CSS/Grapevine.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<?php
#_
require_once "Includes/db-connection.php";

session_start();
?>
<div class="Registration">
<?php
if (isset($_GET["fail"])){
    echo "Die E-Mail Adresse oder das Passwort ist falsch! Bitte versuche es erneut";
}
?>
    </div>
<form action="Login.php" name="login" method="post">
<div class="container">

    <div class="login-heading">
        <h1 class="logintitle">Login here!</h1>


    <div class="row">

        <div class="col-md-8">
            <div class="panel" style="...">
                <div class="form-group">


                    <input type="text" class="form-control" name="email" id="usr" placeholder="email">
                </div>
                <div class="form-group">

                    <input type="password" class="form-control" name="password" id="pwd" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Login</button>
            </div>
            <div class="col-md-3">
            </div>
            </div>
        </div>
    </div>

</div>

    <div class="Registration">
        Noch keinen Account? Registriere dich <a href="register.php">hier!</a>



<?php

if (!empty($_POST)) {


    $form = $_POST;
    $email = $form['email'];
    $password = $form['password'];

    $select = "SELECT * FROM gv_user WHERE email = :email";

    $stmt = $db->prepare($select);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $result = $stmt->fetch();

    var_dump($result);
    if ($result != false && password_verify($password, $result["password"])) {
        $_SESSION["email"] = $result["email"];
        $_SESSION["id"] = $result["id"];
        header("location: News_Feed.php");
        echo "hallo";
    }

    else {
        header("location: Login.php?fail=1");
    }
}

?>

    </div>