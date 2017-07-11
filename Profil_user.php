<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Grapevine</title>
    <link rel="stylesheet" href="CSS/newsfeed.css"
    <script src="jquery.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<?php
session_start();

require_once "Includes/db-connection.php"; //verbindung zur datenbank benutzername und passwort nochmal einschreiben)

if (!isset($_SESSION["id"]))// (Variable im Log in Benennen)
{
    header("location:Login.php");

}

$sql ="SELECT user_id FROM gv_post WHERE :content = user_id";
$Statement= $db->prepare ($sql);
$Statement->bindParam(":content", )
$Statement->execute();
$Ergebnisabfragedb= $Statement->fetchAll();


for ($Ergebnisabfragedb;;) {


    $sql = "SELECT id FROM gv_user WHERE id = :id";
    $Statement = $db->prepare($sql);
    $Statement->bindParam(":id", $Ergebnisabfragedb["user_id"]);
    $Statement->execute();
    $Ergebnisabfragedb = $Statement->fetchAll();
?>

<div class="panel panel-default">
                <div class="panel-heading"> <?= $username["firstname"]?> <?= $username["lastname"] ?></div>
<div class="panel-body">
    <?php if($Ergebnisabfragedb["profilpic"] != NULL){
        echo "<img class='img-responsive' src='".$Ergebnisabfragedb["profilpic"]."'><br>";
    }

}
?>