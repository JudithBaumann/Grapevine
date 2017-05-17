<html>
<head>
    <link rel="stylesheet" href="Stylesheet.css">
</head>
<body>
<?php

include_once "db-include.php";

if (empty($_POST)) {
    ?>
    <h1>Registration</h1>
    <form name="registration" action="register.php" method="POST">
        <label for "username">Username: </label>
        <input type="text" name="username"/> <br/>
        <label for "firstname">First name: </label>
        <input type="text" name="firstname"/> <br/>
        <label for 'lastname'>First name: </label>
        <input type="text" name="lastname"/> <br/>
        <label for 'email'>Email: </label>
        <input type="text" name="email"/> <br/>
        <label for 'password'>Password: </label>
        <input type="password" name="password"/> <br/>
        <label for 'birthday'>Date of Birth: </label>
                 <?php
                  echo '</select>';
                  echo '<select name="day">';
                  echo '<option></option>';
                  for ($i = 1; $i <= 31; $i++) {
                       $i = str_pad($i, 2, 0, STR_PAD_LEFT);
                       echo "<option value='$i'>$i</option>";
                 }

                  echo '</select>';
                  echo '<select name="month">';
                 echo '<option></option>';
                    for ($i = 1; $i <= 12; $i++) {
                      $i = str_pad($i, 2, 0, STR_PAD_LEFT);
                        echo "<option value='$i'>$i</option>";
                 }
                  echo '</select>';
                 echo '<select name="year">';
                 echo '<option></option>';
                 for ($i = date('Y'); $i >= date('Y', strtotime('-100 years')); $i--) {
                     echo "<option value='$i'>$i</option>";
                 }

                ?>


        <button type="submit">Submit</button>
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



$sql = "Insert Into Nutzer (username, firstname, lastname, email, password, birthdate) Values (:username, :firstname, :lastname, :email, :password, :birthday)";

$query = $db->prepare($sql);
$result = $query->execute(array("username"=>$username, ":firstname"=>$firstname, ":lastname"=>$lastname, ":email"=>$email, ":password"=>$password, ":birthday"=>$birthday));

    if ( $result ){
        echo "<p>Thank you. You have been registered</p>";
    } else {
        echo "<p>Sorry, there has been a problem inserting your details. Please contact admin.</p>";
    }
}
?>
</body>
</html>