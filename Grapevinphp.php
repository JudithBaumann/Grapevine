$minjahr = 1990;
$maxjahr = 2004;
$x = -1;
echo '<select name="jahr">';
    while(++$x < $maxjahr - $minjahr)
    {
    echo '<option>'.($x+ $minjahr).'</option>';
    }
    echo '</select>';

if($_POST['jahr'])
{
echo '<select name="art">';
    $artikel_res = mysql_query('SQL-Query');
    while($artikel = mysql_fetch_assoc($artikel_res))
    {
    echo '<option>'.$artikel['name'].'</option>'
    }
    echo '</select>';
}