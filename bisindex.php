<h1>CINEMAs</h1>
<?php
$dsn = "mysql:host=127.0.0.1;dbname=cinema";
$user = 'toto';
$password = 'password';
$options = [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION];
try {
$dbh = new PDO($dsn, $user, $password, $options);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//if ($dbh->rowCount() <= 0) {
//	echo "got result";
	
echo "Connected successfully";
//}
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
    return "Error";
}
/*try {  
    $dbh->beginTransaction();
    $dbh->exec("show tables");
    $dbh->commit();
}   catch (Exception $e) {
    $dbh->rollBack();
    echo "failled: " . $e->getMessage();
}
*/
$res = $dbh->query("SELECT * from subscription");
var_dump($res->fetchAll());
