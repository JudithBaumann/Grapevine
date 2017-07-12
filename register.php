<html>
<head>
    <link rel="stylesheet" href="CSS/New_Stylesheet.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<?php

require_once "Includes/db-connection.php";


session_start();

$_SESSION["login"] = "yes";



if (empty($_POST)) {
    ?>
    <div class="container">
    <h1>Sign up to Grapevine</h1>
    <form name="registration" action="register.php" method="POST">
        <input type="text" placeholder="Vorname" name="firstname" required> <br/>
        <input type="text" placeholder="Nachname" name="lastname" required> <br/>
        <input type="email" placeholder="Email" name="email" required> <br/>
        <input type="password" placeholder="Passwort" name="password" required> <br/>
        <input type="password" placeholder="Passwort bestätigen" name="confirmpassword" required> <br/>
        <input type="submit" name="register" value="Registrieren">
    </form>

    </div>


    <?php


}

else {



        $form = $_POST;
        $username = $form['username'];
        $firstname = $form['firstname'];
        $lastname = $form['lastname'];
        $email = $form['email'];
        $password = $form ['password'];
        $confirm = $form ['confirmpassword'];

    if ($password != $confirm) {
        echo "Die Passwörter stimmen nicht überein!";
        $link_address = 'register.php';
        echo "<br> <a href='".$link_address."'>Zurück</a>";

    }

    else {


        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "Insert Into gv_user (firstname, lastname, email, password) Values (:firstname, :lastname, :email, :password)";


        $query = $db->prepare($sql);
        $result = $query->execute(array(":firstname" => $firstname, ":lastname" => $lastname, ":email" => $email, ":password" => $password));

        if ($result) {
            echo "<p><div class=\"alert alert-success\" role=\"alert\">Glückwunsch! Du hast dich erfolgreich registriert</div></p>";
            $_SESSION["email"] = $result["email"];
            $_SESSION["id"] = $result["id"];
            $link_address1 = 'News_Feed.php';
            echo "<a href='".$link_address1."'>Zum News-Feed</a>";


        } else {
            echo "<p><div class=\"alert alert-danger\" role=\"alert\">Es gab ein Problem bei deiner Registrierung. Versuche es nochmal!</div></p>";
        }
    }

   }
?>
</body>
</html>