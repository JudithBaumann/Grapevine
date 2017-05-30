<html>
<head>
    <link rel="stylesheet" href="Stylesheet.css">
</head>
<body>
<?php
session_start();#
$SESSION ['message'] = '';

include_once "db-include.php";

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
        <div class="alert alert-error"><?php $SESSION['message']?> </div>
        <input type="text" placeholder="Username" name="username" required/> <br/>
        <input type="text" placeholder="First Name" name="firstname" required/> <br/>
        <input type="text" placeholder="Last Name" name="lastname" required/> <br/>
        <input type="text" placeholder="Email" name="email" required><br/>
        <input type="password" placeholder="Password" name="password" required/> <br/>
        <input type="password" placeholder="Confirm Password" name="confirmpassword" required/> <br/>
        <input type="datetime-local" placeholder="Date of Birth" name="birthday" required/> <br/>
        <button type="submit">Submit</button>
    </form>


    <?php


}

else {

    $firstName=$lastName="";
    $firstNameErr=$lastNameErr="";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (empty($_POST["firstName"])) {
            $firstNameErr = "First name is required";
        } else {
            $firstName = test_input($_POST["firstName"]);
        }
        if (empty($_POST["lastName"])) {
            $lastNameErr = "Last name is required";
        } else {
            $lastName = test_input($_POST["lastName"]);
        }
        }

    }

    if (!empty($_POST['firstname']) && !empty($_POST['lastname']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

        $form = $_POST;
        $username = $form['username'];
        $firstname = $form['firstname'];
        $lastname = $form['lastname'];
        $email = $form['email'];
        $password = $form ['password'];
        $birthday = $form['birthday'];


        $sql = "Insert Into Nutzer (username, firstname, lastname, email, password, birthdate) Values (:username, :firstname, :lastname, :email, :password, :birthday)";


        $query = $db->prepare($sql);
        $result = $query->execute(array("username" => $username, ":firstname" => $firstname, ":lastname" => $lastname, ":email" => $email, ":password" => $password, ":birthday" => $birthday));

        if ($result) {
            echo "<p>Thank you. You have been registered!</p>";
        }
        else {
            echo "<p>Sorry, there has been a problem inserting your details. Please contact admin.</p>";
        }


    }
    

   if (empty($_POST['firstname']) or empty($_POST['lastname']) or filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
       echo ("There has been a problem");
   }
?>
</body>
</html>