<a href="https://localhost/cinema/index.html">accueil</a>
<?php
require_once 'connect.php';
$name = $_GET['username'];
$email =$_GET['email'];
$html = "";
//$genre =$_GET['color'];
if (isset($_GET['username'])) && (isset($_GET[' {

if (isset($_GET['color'])) &&{
$sql = 'select genre.name, movie.id, movie.title, movie_genre.id_movie, movie_genre.id_genre
from movie
inner join movie_genre on movie.id = movie_genre.id_movie 
inner join genre on genre.id = movie_genre.id_genre 
where genre.name like :iusername';
$sth = $dbh->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$sth->bindValue(':iusername', '%' . $_GET['color'] . '%', PDO::PARAM_STR);
$sth->execute(); 
$red = $sth->fetchAll();
foreach ($red as list($a, $b, $c, $d)) {
    $html .= "<p>$a $b $c $d<p>\n";
echo $html;
} 
else{
    echo "false";
}

/* Execute a prepared statement by passing an array of values */ $sql = 'SELECT *
    FROM user
    WHERE firstname like :iusername or lastname like :iusername';
$sth = $dbh->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$sth->bindValue(':iusername', '%' . $name . '%', PDO::PARAM_STR);
$sth->execute(); 
//$sth->execute(['calories' => 150, 'colour' => 'red']);
$red = $sth->fetchAll();
/*
foreach ($red as list($a, $b, $c, $d)) {
    $html .= "<p>$a $b $c $d<p>\n";
}
 */
/* Array keys can be prefixed with colons ":" too (optional) */
//$sth->execute([':calories' => 175, ':colour' => 'yellow']);
$yellow = $sth->fetchAll();
?>

