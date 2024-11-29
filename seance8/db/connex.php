<?php
try{
    $dbhost = "localhost";
    $dbname = "msanches";
    $dbuser = "msanches";
    $dbpass = "XODB6VqF6J51zRnYh6Gf";
    $dbport = 3306;
    $pdo = new PDO("mysql:host=$dbhost; dbname=$dbname; port=$dbport charset=utf8", $dbuser, $dbpass);
}catch (PDOException $e){
    echo "Error: ". $e->getMessage();
    die();
}

?>