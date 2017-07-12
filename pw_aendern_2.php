<html>
<?php
if(isset($_GET["success"])){
    echo "Dein Passwort wurde erfolgreich geändert!";

}
if (isset($_GET["false"])) {
    echo "Das eingegebene Passwort ist falsch. Bitte versuche es erneut";
}
?>
<form action="pw_aendern.php" method="post">

    <input type="password" name="password_a">
    <input type="password" name="password_n">
    <input type="submit" value="Passwort ändern">
</form>

<?php
$link_address2 = 'News_Feed.php';
echo "<a href='".$link_address2."'>Zurück zur Startseite</a>";
?>
</html>