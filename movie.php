<a href="https://localhost/cinema/index.html">accueil</a>
<?php

require_once 'connect.php'; 
echo strlen($_GET['distributor']);
if (((strlen($_GET['distributor']) != 0)) || ((strlen($_GET['movie']) != 0)) || (isset($_GET['genre'])))
echo "nothing to seach";
elseif (((strlen($_GET['distributor']) == 0)) && ((strlen($_GET['movie']) == 0)) && (isset($_GET['genre']))) {
    echo "c' est beau la vie";
$sql = 'select genre.name,  movie.title 
from movie
 join movie_genre on movie.id = movie_genre.id_movie 
 join genre on genre.id = movie_genre.id_genre 
where genre.name like :genre';
$sth = $dbh->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$sth->bindValue(':genre', '%' . $_GET['genre'] . '%', PDO::PARAM_STR);
$sth->execute(); 
$red = $sth->fetchAll();
foreach ($red as list($a, $b, $c, $d)) {
    $html .= "<p>$a $b $c $d<p>\n";
}
echo $html;
}
elseif ((strlen($_GET['distributor']) == 0) && ((strlen($_GET['movie']) != 0)) && (isset($_GET['genre'])))
{
$sql = 'select genre.name, movie.id, movie.title, movie_genre.id_movie, movie_genre.id_genre
from movie
 join movie_genre on movie.id = movie_genre.id_movie 
 join genre on genre.id = movie_genre.id_genre 
where genre.name like :genre and movie.title like :movie';
$sth = $dbh->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$sth->bindValue(':genre', '%' . $_GET['genre'] . '%', PDO::PARAM_STR);
$sth->bindValue(':movie', '%' . $_GET['movie'] . '%', PDO::PARAM_STR);
$sth->execute(); 
$red = $sth->fetchAll();
foreach ($red as list($a, $b, $c, $d)) {
    $html .= "<p>$a $b $c $d<p>\n";
}
echo $html;
}
elseif ((strlen($_GET['distributor']) != 0) && ((strlen($_GET['movie']) != 0)) && (isset($_GET['genre'])))
{
$sql = 'select genre.name, movie.id, movie.title, movie_genre.id_movie, movie_genre.id_genre
from movie
 join movie_genre on movie.id = movie_genre.id_movie 
 join genre on genre.id = movie_genre.id_genre 
join distributor on distributor.id = movie.id
where genre.name like :genre and movie.title like :movie and distributor.name like :distributor';
$sth = $dbh->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$sth->bindValue(':genre', '%' . $_GET['genre'] . '%', PDO::PARAM_STR);
$sth->bindValue(':movie', '%' . $_GET['movie'] . '%', PDO::PARAM_STR);
$sth->bindValue(':distributor', '%' . $_GET['distributor'] . '%', PDO::PARAM_STR);
$sth->execute(); 
$red = $sth->fetchAll();
foreach ($red as list($a, $b, $c, $d)) {
    $html .= "<p>$a $b $c $d<p>\n";
}
echo $html;
}
/*
elseif (($_GET['distributor'] != "") && ($_GET['movie'] != "")) {
echo "perlainpainpain";
} 
    else {
    echo "No result"; 
}
    function movie($dbh) {
$html = "";
    $sql ='select movie.title from movie 
        where movie.title like :title';
$sth = $dbh->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$sth->bindValue(':title', '%' . $_GET['movie'] . '%', PDO::PARAM_STR);
$sth->execute();
$title = $sth->fetchAll();
foreach ($title as list($a)) {
    $html .= "<p>$a<p>\n";
}
echo $html;
}

// base de mes requêtes
// SELECT movie.title FROM `distributor` join movie on movie.id_distributor = distributor.id where distributor.name like '%lumb%' and movie.title like '%spider%';
// */
//
/*$sql = 'select genre.name, movie.id, movie.title, movie_genre.id_movie, movie_genre.id_genre
from movie
 join movie_genre on movie.id = movie_genre.id_movie 
 join genre on genre.id = movie_genre.id_genre 
    where genre.name like :iusername';
     */
