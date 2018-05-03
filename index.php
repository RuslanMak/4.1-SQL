<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=netology_4.1', 'root', '');
} catch (PDOException $error) {
    print "Error!: " . $error->getMessage() . "<br/>";
    die();
}

$pdo->exec('SET NAMES utf8');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $isbn = $_POST['isbn'];
    $name = $_POST['name'];
    $author = $_POST['author'];
    $sql = "SELECT * FROM books WHERE ((name LIKE :name) AND (isbn LIKE :isbn) AND (author LIKE :author))";
    $statement = $pdo->prepare($sql);
    $statement->execute(["name"=>"%{$name}%","isbn"=>"%{$isbn}%","author"=>"%{$author}%"]);
} else {
    $sql = "SELECT * FROM books";
    $statement = $pdo->prepare($sql);
    $statement->execute();
}