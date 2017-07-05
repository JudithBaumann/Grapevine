<html>
<head>
    <link rel="stylesheet" href="New_Stylesheet.css">
</head>
<body>
<?php

include_once "db-include.php";

//$con = mysqli_connect("localhost", "jb184", "Eithee9OhK", "Posting");

session_start();
if (isset($_POST["register"]))
{
    if(empty($_POST["password"]) || empty($_POST["confirmpassword"]))
    {
        echo '<script>alert("Both Fields are required")</script>';
    }
    else
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
    }
}
/*
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// two passwords are equal to each other
    if ($_POST ['password'] == $_POST ['confirmpassword']) {

        $username= $db->prepare($_POST['username']);
        $firstname = $db->prepare($_POST['firstname']);
        $lastname = $db->prepare($_POST['lastname']);
        $email = $db->prepare($_POST['email']);
        $password = md5($_POST['password']); //hash Passwort
    }

}
*/

if (empty($_POST)) {
    ?>
    <h1>Sign up to Grapevine</h1>
    <form name="registration" action="register.php" method="POST">
        <input type="text"  placeholder="Username" name="username" required> <br/>
        <input type="text" placeholder="First Name" name="firstname" required> <br/>
        <input type="text" placeholder="Last Name" name="lastname" required> <br/>
        <input type="email" placeholder="Email" name="email" required> <br/>
        <input type="password" placeholder="Password" name="password" required> <br/>
        <input type="password" placeholder="Confirm Password" name="confirmpassword" required> <br/>
        <input type="date" placeholder="Date of Birth" name="birthday" required> <br/>
        <input type="submit" name="register">
    </form>



    <?php


}

else {



        $form = $_POST;
        $username = $form['username'];
        $firstname = $form['firstname'];
        $lastname = $form['lastname'];
        $email = $form['email'];
        $password = $form ['password'];
        $birthday = $form['birthday'];



    $passwordmd5 = md5($password);

        $sql = "Insert Into Nutzer (username, firstname, lastname, email, password, birthdate) Values (:username, :firstname, :lastname, :email, :passwordmd5, :birthday)";


        $query = $db->prepare($sql);
        $result = $query->execute(array("username" => $username, ":firstname" => $firstname, ":lastname" => $lastname, ":email" => $email, ":passwordmd5" => $passwordmd5, ":birthday" => $birthday));

        if ($result) {
            echo "<p>Thank you. You have been registered!</p>";
        }
        else {
            echo "<p>Sorry, there has been a problem inserting your details. Please contact admin.</p>";
        }



    

   }
?>
</body>
</html>