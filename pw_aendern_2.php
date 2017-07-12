<?php
session_start();

if (!isset($_SESSION["id"]))// (Variable im Log in Benennen)
{
    header("location:Login.php");

}

include "Includes/db-connection.php";
include "header.php";

?>
<html>
<head>
    <meta charset="UTF-8">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="bootstrappasswortändern.css" rel="stylesheet">
    <title>Passwort ändern</title>
</head>


<div class="container">

    <div class="login-heading">
        <h1 class="logintitle">Passwort ändern</h1>


    </div>

    <form action="pw_aendern.php" method="post">

    <div class="row">

        <div class="col-md-8">
            <div class="panel" style="...">
                <h3 class="login-subtitle"></h3>
                <?php


                if(isset($_GET["success"])){
                    echo "Dein Passwort wurde erfolgreich geändert!";

                }
                if (isset($_GET["false"])) {
                    echo "Das eingegebene Passwort ist falsch. Bitte versuche es erneut";
                }
                ?>
                <br>
                <div class="form-group">
                    <label for="password_a">Altes Passwort</label>
                    <input type="password" class="form-control" id="password_a" placeholder="Altes Passwort">
                </div>
                <div class="form-group">
                    <label for="password_n">Neues Passwort</label>
                    <input type="password" class="form-control" id="password_n" placeholder="Neues Passwort">
                </div>

                <input type="submit" class="btn btn-success btn-lg" value="Passwort ändern">


            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>

</div>
</form>

</html>