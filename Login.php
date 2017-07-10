<html>
<head>
    <link rel="stylesheet" href="CSS/New_Stylesheet.css">
</head>
<body>
<?php

require_once "Includes/db-connection.php";

session_start();

?>


<form action="Login.php" name="login" method="post">
    <div class="imgcontainer">
        <img src="IMG/OGF8C40.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        <label><b>E-Mail</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>

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

<?php

if(!empty($_POST)) {


    $form = $_POST;
    $email = $form['email'];
    $password = $form['password'];

    $select = "SELECT * FROM gv_user WHERE email = :email";

    $stmt = $db->prepare($select);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $result = $stmt->fetch();

    var_dump($result);
   if($result != false && password_verify($password, $result["password"])){
       $_SESSION["email"] = $result["email"];
       $_SESSION["id"] = $result["id"];
       header("location: News_Feed.php");
       echo "hallo";
   }
}

#hallo