<?php

session_start();
include "Includes/db-connection.php";


$status = $_POST['status'];

$uploaddir = 'upload/';
$uploadfile = $uploaddir . basename($_FILES['datei']['name']);

if(!$status)
{
    echo "No status entered...";
}
elseif($_FILES['datei'] ['name'] == NULL )
{
    $sql = "INSERT INTO gv_post (content, created, user_id) VALUES (:content, now(), :user_id)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":content", $status);
    $stmt->bindParam(":user_id", $_SESSION["id"]);
    $stmt->execute();
    header("Location: News_Feed.php");
}

else {
    $sql = "INSERT INTO gv_post (content, created, user_id, image) VALUES (:content, now(), :user_id, :image)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":content", $status);
    $stmt->bindParam(":user_id", $_SESSION["id"]);
    $stmt->bindParam(":image", $uploadfile);
    $stmt->execute();
    (move_uploaded_file($_FILES['datei']['tmp_name'], $uploadfile));
    header("Location: News_Feed.php");
}

?>

