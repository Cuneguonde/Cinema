<?php
$dsn = 'mysql:dbname=cinema;host=127.0.0.1';
$user = 'toto';
$password = 'password';
try {
$dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully\n";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
/*$sth =$dbh->prepare("Select title from movie where title like '%a'");
$sth->execute();
print_r("Fetch all of the remaining rows in the result set:\n");
$result = $sth->fetchAll();
foreach ($result as list($a)) {
    echo "<p>$a<p>\n";
}
try {  
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->beginTransaction();
    $dbh->exec("show tables");
    $dbh->commit();
}   catch (Exception $e) {
    $dbh->rollBack();
    echo "failled: " . $e->getMessage();
}
 */

