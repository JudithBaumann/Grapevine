<?php
session_start();

require_once "Includes/db-connection.php"; //verbindung zur datenbank benutzername und passwort nochmal einschreiben)

include "header.php";

if (!isset($_SESSION["email"]))// (Variable im Log in Benennen)
{
    header("location:Login.php");

}

// include "header.php";


$sql ="SELECT * FROM gv_post ORDER by created DESC"; //SQL befehl zum abfragen in diesem Fall die Posttabelle in der DB "*" bedeutet alle Spalten auswählen
$Statement= $db->prepare ($sql);
$Statement->execute();
$Ergebnisabfragedb= $Statement->fetchAll();
?>

<!Doctype html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <title>Grapevine</title>

    <script src="jquery.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

    <body>


    <div class="container">
        <form action="post_status.php" method="post" enctype="multipart/form-data">
            <textarea rows="4" cols="160" name="status"></textarea> <br>

            <input type="file" name="datei"><br>
            <input type="submit" value="Posten">

        </form>



        <?php
        foreach ($Ergebnisabfragedb as $Zeilen)
        {
            $sql = "SELECT firstname, lastname FROM gv_user WHERE id = :id";
            $Statement= $db->prepare ($sql);
            $Statement->bindParam(":id", $Zeilen["user_id"]);
            $Statement->execute();
            $username= $Statement->fetch();

            ?>
            <div class="panel panel-default">
                <div class="panel-heading"> <a href="Profil_user.php"> <?= $username["firstname"]?> <?= $username["lastname"] ?> </a></div>
                <div class="panel-body">
                <?php if($Zeilen["image"] != NULL){
                        echo "<img class='img-responsive' src='".$Zeilen["image"]."'><br>";
                    }
                    ?>
                <?= $Zeilen["content"] ?>
                </div>
            </div>
        <?php
        }

        ?>
    </div>

    </body>
</html>

