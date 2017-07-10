<?php
session_start();

include "Includes/db-connection.php"; //verbindung zur datenbank benutzername und passwort nochmal einschreiben)

if (!isset($_SESSION["email"]))// (Variable im Log in Benennen)
{
    header("location: Login.php");

}

$sql ="SELECT * FROM gv_post"; //SQL befehl zum abfragen in diesem Fall die Posttabelle in der DB "*" bedeutet alle Spalten auswählen
$Statement= $db->prepare ($sql);
$Statement->execute();
$Ergebnisabfragedb= $Statement->fetchAll();
?>

<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Grapevine</title>
    <link rel="stylesheet" href="CSS/newsfeed.css"
    <script src="jquery.js"></script>

</head>

    <body>
<form action="post_status.php" method="post">
    <textarea rows="4" cols="50" name="status"></textarea>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="datei"><br>
        <input type="submit" value="Hochladen">
        </form>

    <input type="submit" value="posten">
</form>

<a href="Ausloggen.php">Ausloggen</a>
<a href="pw_aendern_2.php">PW ändern</a>

<?php
foreach ($Ergebnisabfragedb as $Zeilen)
{
    echo $Zeilen["content"]; // ausgeben des Inhalts der Spalte jeder zeile in der Tabelle

}

?>
    </body>
</html>