<html>
<head>
    <link rel="stylesheet" href="New_Stylesheet.css">
</head>
<body>
<?php

include_once "db-include.php";

if(isset($_GET['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $statement = $pdo->prepare("SELECT * FROM Nutzer WHERE username = :username");
    $result = $statement->execute(array('username' => $username));
    $user = $statement->fetch();

    //Überprüfung des Passworts
    if ($user !== false && password_verify($passwort, $user['passwort'])) {
        $_SESSION['userid'] = $user['id'];
        die('Login erfolgreich. Weiter zu <a href="News_Feed.php">internen Bereich</a>');
    } else {
        $errorMessage = "E-Mail oder Passwort war ungültig<br>";
    }

}

if(isset($errorMessage)) {
    echo $errorMessage;
}
?>


<form action="News_Feed.php" name="login" method="post">
    <div class="imgcontainer">
        <img src="img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        <label><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit">Login</button>
        <input type="checkbox" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="password">Forgot <a href="#">password?</a></span>
    </div>
</form>

