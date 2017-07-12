<?php

session_start();

require_once "Includes/db-connection.php"; //verbindung zur datenbank benutzername und passwort nochmal einschreiben)

include "header.php";

if (!isset($_SESSION["email"]))// (Variable im Log in Benennen)
{
    header("location:Login.php");

}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



    <nav class="navbar navbar-default" style="height: 50px" position="fixed">
        <div class="container-fluid">

            <div class="navbar-header navbar-left">
                <a class="navbar-brand" href="News_Feed.php"><img src="IMG/Grapevine.png" alt="Logo" style="
                                                                height: 35px;
                                                                width: auto;
                                                                object-fit: cover;
                                                                margin-top: -10px;" ></a>
                <a class="btn btn-success navbar-btn" style="margin-left: 10px;" href="Profil.php">Mein Profil</a>
            </div>


            <div class="navbar-header navbar-right">
                <a class="btn btn-success navbar-btn" href="Ausloggen.php">Ausloggen</a>




                <!--    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Einstellungen
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="pw_aendern_2.php">Passwort ändern</a></li>
                        <li><a href="Ausloggen.php">Ausloggen</a></li>
                    </ul>
        -->

            </div>
        </div>
    </nav>

    <div class="row">
        <div class="navbar navbar-default navbar-fixed-bottom">
            <div class="container">
                <a class="navbar-text pull-left">2017 Copyright</a>
                <a class="navbar-text pull-right" href="Impressum.php">Impressum</a>
                <a class="navbar-text pull-right" href="Datenschutz.php">Datenschutzerklärung</a>
            </div>
        </div>
    </div>


</head>
<body style="margin-bottom: 120px;">





  </body>
</html>