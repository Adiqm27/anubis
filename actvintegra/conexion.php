<?php
$user = 'root';
$pass = 'adilene';

$link = 'mysql:host=localhost;dbname=joyeria';

try {
$pdo = new PDO($link, $user, $pass);
    //echo 'conectado';

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>