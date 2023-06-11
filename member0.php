<?php
require_once 'connect.php';
if(!empty($_GET['username']['email'])) {
} $sql = 'SELECT user.lastname, user.firstname FROM user WHERE user.firstname LIKE :firstname and user.lastname like :lastname';
$pdo_statement = $dbh->prepare($sql);
$pdo_statement->bindValue(':firstname', '%' . $_GET['firstname'] . '%', PDO::PARAM_STR);
$pdo_statement->bindValue(':lastname', '%' . $_GET['lastname'] . '%', PDO::PARAM_STR);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
foreach ($result as list($a, $b)) {
    echo "<p>$a $b<p>\n";
}
?>

