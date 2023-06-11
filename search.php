
<a href="https://localhost/cinema/index.html">accueil</a>
<?php

require_once 'connect.php'; 

strlen($_GET['movie']) != 0  ? yes($dbh) : no($dbh); 


function yes($dbh) { echo "find";  
 $sql = 'select movie.title, genre.name, movie.distributor
from movie
 join movie_genre on movie.id = movie_genre.id_movie 
 join genre on genre.id = movie_genre.id_genre
 join distributor on distributor.id = movie.distributor' ;
    if (( strlen($_GET['distributor']) != 0) && (isset($_GET['genre'])))  
    $sql .= ' where movie.title like :movie and genre.name like :genre and distributor like :distributor';
    elseif (( strlen($_GET['distributor']) != 0) && (!isset($_GET['genre'])))
        $sql .= ' where movie.title like :movie and distributor like :distributor';
    elseif (( strlen($_GET['distributor']) == 0) && (isset($_GET['genre'])))
       $sql .= ' where movie.title like :movie and genre like :genre';
    else
        $sql .= ' where movie like :movie';
$sth = $dbh->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
$sth->bindValue(':genre', '%' . $_GET['genre'] . '%', PDO::PARAM_STR);
$sth->bindValue(':movie', '%' . $_GET['movie'] . '%', PDO::PARAM_STR);
$sth->bindValue(':distributor', '%' . $_GET['distributor'] . '%', PDO::PARAM_STR);
$sth->execute(); 
$red = $sth->fetchAll();
foreach ($red as list($a, $b, $c)) {
    $html .= "<p>$a $b $c<p>\n";
}
echo $html;
}
function no($dbh) { echo "nofind"; } 
