<?php
$dsn = "mysql:dbhost=https://mars.iuk.hdm-stuttgart.de;dbname=u-jb184";
$dbuser = "jb184";
$dbpass = "Eithee9OhK";
$db = new PDO($dsn, $dbuser, $dbpass);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

"Select from Posting (ALL)";

$status = $_POST['s'];

if(!$status)
{
    echo "No status entered...";
}
else
{
    echo "success";
}
?>

