<?php

session_start();
include "Includes/db-connection.php";


$status = $_POST['status'];

if(!$status)
{
    echo "No status entered...";
}
else
{
    $sql = "INSERT INTO gv_post (content, created, user_id) VALUES (:content, now(), :user_id)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":content", $status);
    $stmt->bindParam(":user_id", $_SESSION["id"]);
    $stmt->execute();
    header("Location: News_Feed.php");
}

?>

