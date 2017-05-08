<html>
<body>
<?php
$servername = "mars.iuk.hdm-stuttgart.de";
$dbname = "u-jb184";
$passwort = "Eithee90hK";

$dsn="mysql:: host=mars.iuk.hdm-stuttgart.de; dbname=u-jb184";

try{$db= new PDO($dsn, "jb184", "Eithee9OhK", array('charset'=>'utf8'));

}

catch (PDOException$p)
{
    echo ("Fehler bei Aufbau der Datenbankverbindung.".$p->getMessage());

}

?>

</body>
</html>
