<?php

session_start();

include "header.php";

require_once "Includes/db-connection.php"; //verbindung zur datenbank benutzername und passwort nochmal einschreiben)

if (!isset($_SESSION["id"]))// (Variable im Log in Benennen)
{
    header("location:Login.php");

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/New_Stylesheet.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="bootstrapprofil.css" rel="stylesheet">
    <title>Profilansicht</title>
</head>
<body>
<div class="container">

    <div class="login-heading">
        <h1 class="logintitle">Profil</h1>


    </div>

    <div class="row">

        <div class="col-md-10">
            <div class="panel" style="...">
                <?php


                $sql ="SELECT * FROM gv_user WHERE id = :id";
                $Statement= $db->prepare ($sql);
                $Statement->bindParam(":id", $_SESSION["id"]);
                $Statement->execute();
                $Ergebnisabfragedb = $Statement->fetchAll();


                if($Zeilen["profilpic"] != NULL){
                    echo "<img class='img-responsive' src='".$Zeilen["profilpic"]."'><br>";
                }

                foreach ($Ergebnisabfragedb as $Zeilen) {
                    $sql = "SELECT profilpic, firstname, lastname FROM gv_user WHERE id = :id";
                    $Statement = $db->prepare($sql);
                    $Statement->bindParam("id", $_SESSION["id"]);
                    $Statement->execute();
                    $username = $Statement->fetch();
                }
                ?>
                <div class="panel-body">
                    <?php if($Zeilen["profilpic"] != NULL){
                        echo "<img class='img-responsive' src='".$Zeilen["profilpic"]."' style='       
        border: 2px;
        object-fit: cover;
        width: 250px;
        height: 250px;
        '><br>";
                    }
                    ?>

                <h2 class="login-subtitle">Neues Profilbild hochladen!</h2>
                        <form action="Profilbild_hochladen.php" method="post" enctype="multipart/form-data">

                            <button type="file" class="btn btn-success" name="datei">Bild wählen</button>
                                <input type="text" placeholder="Bildname einfügen" name="Beschreibung">
                            <button type="submit" class="btn btn-success" value="Profilbild hochladen">Profilbild hochladen</button>
                     <!--    <button type="submit" class="btn btn-success btn-lg">Bild hochladen</button>
                        <button type="button" class="btn btn-success btn-lg">Datei auswählen...</button> -->


            </div>


            </div>
        </div>
    </div>

</div>
</body>
</html>



