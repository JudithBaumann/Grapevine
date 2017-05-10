<html>
<head>

</head>
<body>
<?php
if (empty($_POST)) {
    ?>
    <h1>Registration</h1>
    <form name="registration" action="register.php" method="POST">
        <label for "Vorname">Vorname: </label>
        <input type="text" name="Vorname"/> <br/>
        <label for 'Nachname'>Nachname: </label>
        <input type="text" name="Nachname"/> <br/>
        <label for 'E-mail'>E-mail: </label>
        <input type="text" name="E-mail"/> <br/>
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
    echo ("Vielen Dank! Sie wurden registriert");




$form = $_POST;
$Vorname = $form[ "Vorname" ];
$Nachname = $form["Nachname"];
$Email = $form["E-mail"];
$Passwort = $form ["Passwort"];
$Wohnort = $form ["Wohnort"];
$Geburtsdatum = $form["Geburtsdatum"];

    include "db-include.php";

$sql = "Insert Into Nutzer (Vorname, Nachname, Email, Passwort, Wohnort, Geburtsdatum) Values (:Vorname, :Nachname, :E-Mail, :Passwort, :Wohnort, :Geburtsdatum)";

$query = $db->prepare($sql);
$query->execute(array(":Vorname"=>$Vorname, ":Nachname"=>$Nachname, ":E-Mail"=>$Email, ":Passwort"=>$Passwort, ":Wohnort"=>$Wohnort, ":Geburtsdatum"=>$Geburtsdatum));

}
?>
</body>
</html>