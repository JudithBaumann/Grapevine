<html>
<head>

</head>
<body>
<?php

include_once "db-include.php";

if (empty($_POST)) {
    ?>
    <h1>Registration</h1>
    <form name="registration" action="register.php" method="POST">
        <label for "ID">ID: </label>
        <input type="text" name="ID"/> <br/>
        <label for "Vorname">Vorname: </label>
        <input type="text" name="Vorname"/> <br/>
        <label for 'Nachname'>Nachname: </label>
        <input type="text" name="Nachname"/> <br/>
        <label for 'Email'>Email: </label>
        <input type="text" name="Email"/> <br/>
        <label for 'Passwort'>Passwort: </label>
        <input type="password" name="Passwort"/> <br/>
        <label for 'Wohnort'>Wohnort: </label>
        <input type="text" name="Wohnort"/> <br/>
        <label for 'Geburtsdatum'>Geburtsdatum: </label>
        <input type="text" name="Geburtsdatum"/>
        <br/>
        <button type="submit">Submit</button>
    </form>

    <?php

}



else {




$form = $_POST;
    $Vorname = $form['Vorname'];
$Nachname = $form['Nachname'];
$Email = $form['Email'];
$Passwort = $form ['Passwort'];
$Wohnort = $form ['Wohnort'];
$Geburtsdatum = $form['Geburtsdatum'];



$sql = "Insert Into Nutzer (Vorname, Nachname, Email, Passwort, Wohnort, Geburtsdatum) Values (:Vorname, :Nachname, :Email, :Passwort, :Wohnort, :Geburtsdatum)";

$query = $db->prepare($sql);
$result = $query->execute(array(":Vorname"=>$Vorname, ":Nachname"=>$Nachname, ":Email"=>$Email, ":Passwort"=>$Passwort, ":Wohnort"=>$Wohnort, ":Geburtsdatum"=>$Geburtsdatum));

    if ( $result ){
        echo "<p>Thank you. You have been registered</p>";
    } else {
        echo "<p>Sorry, there has been a problem inserting your details. Please contact admin.</p>";
    }
}
?>
</body>
</html>