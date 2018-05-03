<?php

//http://university.netology.ru/u/rmakarov/4.1-SQL/index.php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=global', 'rmakarov', 'neto1741');
} catch (PDOException $error) {
    print "Error!: " . $error->getMessage() . "<br/>";
    die();
}

$pdo->exec('SET NAMES utf8');


$sql = "SELECT name FROM books";

foreach ($pdo->query($sql) as $row) {
    echo $row['name'] . "<br>";
}

//echo "<pre>";
//
