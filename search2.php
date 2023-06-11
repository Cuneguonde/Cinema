<a href="https://localhost/cinema/index.html">accueil</a>
<?php

require_once 'connect.php'; 

strlen($_GET['movie']) != 0  ? yes($dbh) : no($dbh); 
function no(){ echo 'no'; };
function yes($dbh) {  
$html = "";
if (isset($_GET['genre']) && strlen($_GET['distributor']) != 0){
 $sql = 'select movie.title, genre.name, distributor.name 
from movie
 join movie_genre on movie.id = movie_genre.id_movie 
 join genre on genre.id = movie_genre.id_genre
 join distributor on distributor.id = movie.id_distributor
 where movie.title like :movie and genre.name like :genre and distributor.name like :distributor';
$sth = $dbh->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$sth->bindValue(':movie', '%' . $_GET['movie'] . '%', PDO::PARAM_STR);
$sth->bindValue(':genre', '%' . $_GET['genre'] . '%', PDO::PARAM_STR);
$sth->bindValue(':distributor', '%' . $_GET['distributor'] . '%', PDO::PARAM_STR);
$sth->execute(); 
$red = $sth->fetchAll();
foreach ($red as list($a, $b, $c)) {
    $html .= "<p>$a $b $c<p>\n";
}
echo $html;
}
elseif (!isset($_GET['genre']) && strlen($_GET['distributor']) != 0){ 
 $sql = 'select movie.title, genre.name, distributor.name 
from movie
 join movie_genre on movie.id = movie_genre.id_movie 
 join genre on genre.id = movie_genre.id_genre
 join distributor on distributor.id = movie.id_distributor
 where movie.title like :movie and distributor.name like :distributor';
$sth = $dbh->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$sth->bindValue(':movie', '%' . $_GET['movie'] . '%', PDO::PARAM_STR);
$sth->bindValue(':distributor', '%' . $_GET['distributor'] . '%', PDO::PARAM_STR);
$sth->execute(); 
$red = $sth->fetchAll();
foreach ($red as list($a, $b, $c)) {
    $html .= "<p>$a $b $c<p>\n";
}
echo $html;
}
elseif (isset($_GET['genre']) && strlen($_GET['distributor']) != 0){ 
 $sql = 'select movie.title, genre.name, distributor.name 
from movie
 join movie_genre on movie.id = movie_genre.id_movie 
 join genre on genre.id = movie_genre.id_genre
 join distributor on distributor.id = movie.id_distributor
 where movie.title like :movie and distributor.name like :distributor and genre.name like :genre';
$sth = $dbh->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$sth->bindValue(':movie', '%' . $_GET['movie'] . '%', PDO::PARAM_STR);
$sth->bindValue(':distributor', '%' . $_GET['distributor'] . '%', PDO::PARAM_STR);
$sth->bindValue(':genre', '%' . $_GET['genre'] . '%', PDO::PARAM_STR);
$sth->execute(); 
$red = $sth->fetchAll();
foreach ($red as list($a, $b, $c)) {
    $html .= "<p>$a $b $c<p>\n";
}
echo $html;
}
else {
 $sql = 'select movie.title, genre.name, distributor.name 
from movie
 join movie_genre on movie.id = movie_genre.id_movie 
 join genre on genre.id = movie_genre.id_genre
 join distributor on distributor.id = movie.id_distributor
 where movie.title like :movie';
$sth = $dbh->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$sth->bindValue(':movie', '%' . $_GET['movie'] . '%', PDO::PARAM_STR);
$sth->execute(); 
$red = $sth->fetchAll();
foreach ($red as list($a, $b, $c)) {
    $html .= "<p>$a $b $c<p>\n";
}
echo $html;
}
}
