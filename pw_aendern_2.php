<html>
<?php
if(isset($_GET["success"])){
    echo "Dein Passwort wurde erfolgreich geändert!";
}
?>
<form action="pw_aendern.php" method="post">

    <input type="password" name="password_a">
    <input type="password" name="password_n">
    <input type="submit" value="Passwort ändern">
</form>
</html>