
<?php
// config/db.php
$host = 'localhost';
$dbname = 'dbs13342332';
$username = 'root';
$password = '';

//$host = 'db5016421573.hosting-data.io';
//$dbname = 'dbs13342332';
//$username = 'dbu3737837';
//$password = 'proyecto7Udg*karina';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}
?>

