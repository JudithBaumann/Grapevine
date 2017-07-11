<?php
session_start();
$password_a = ($_POST["password_a"]);
$password_n = ($_POST["password_n"]);
$email = $_SESSION["email"];


require "Includes/db-connection.php"; //verbindung zur datenbank benutzername und passwort nochmal einschreiben)
$abfrage = "SELECT password FROM gv_user WHERE email = :email";
$Statement= $db->prepare($abfrage);
$Statement->bindParam(":email", $email);
$Statement->execute();
$Ergebnisabfragedb= $Statement->fetch();


$password_n = password_hash($password_n, PASSWORD_DEFAULT);

if (password_verify($password_a, $Ergebnisabfragedb["password"])){
$aendern = "UPDATE gv_user SET password = :password WHERE email = :email";

$Statement = $db->prepare($aendern);
$Statement->bindParam(":password", $password_n);    //einfügen der Parameter durch bindParam
$Statement->bindParam(":email", $email);      //einfügen der Parameter durch bindParam
$Statement->execute();
header("location: pw_aendern_2.php?success=1");

    }


    else {
echo "Falsches Passwort!!"
   ."<br /><a href='pw_aendern_2.php'>Zurück</a>";
   }
?>


