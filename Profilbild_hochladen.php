<?php

session_start();

require_once "Includes/db-connection.php"; //verbindung zur datenbank benutzername und passwort nochmal einschreiben)

if (!isset($_SESSION["id"]))// (Variable im Log in Benennen)
{
    header("location:Login.php");

}

$profilpic = $_POST['Beschreibung'];

$uploadpic = 'profilpic/';
$uploadfile = $uploadpic . basename($_FILES['datei']['name']);


if (!$profilpic) {

    echo "Es wurde kein Profilbild ausgewählt";
}

else {

    $sql = "UPDATE gv_user SET profilpic = :profilpic WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":profilpic", $uploadfile);
    $stmt->bindParam(":id", $_SESSION["id"]);
    $stmt->execute();
    (move_uploaded_file($_FILES['datei']['tmp_name'], $uploadfile));
    header("Location: Profil.php");
}