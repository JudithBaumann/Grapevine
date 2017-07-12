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

<!--<div class="panel panel-default">
                <div class="panel-heading"> <?= $username["firstname"]?> <?= $username["lastname"] ?></div> -->
<div class="panel-body">
    <?php if($Zeilen["profilpic"] != NULL){
        echo "<img class='img-responsive' src='".$Zeilen["profilpic"]."'><br>";
    }
    ?>

    <?php
    if (!isset($_GET["user"])){


    ?>
    <html>
    <body>
    <a href="News_Feed.php">Zum Newsfeed</a>
    <div class="container">
        <form action="Profilbild_hochladen.php" method="post" enctype="multipart/form-data">
            <input type="text" name="Beschreibung">
            <input type="file" name="datei"><br>
            <input type="submit" value="Profilbild hochladen">

            <br>
            <br>
        </form>
    </div>

    <?php
    }

?>


<div class="panel panel-default">
                <div class="panel-heading"> <?= $username["firstname"]?> <?= $username["lastname"] ?></div>
<div class="panel-body">


</body>
</html>
