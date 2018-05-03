<?php

//http://university.netology.ru/u/rmakarov/4.1-SQL/index.php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=global', 'rmakarov', 'neto1741');
} catch (PDOException $error) {
    print "Error!: " . $error->getMessage() . "<br/>";
    die();
}

$pdo->exec('SET NAMES utf8');

$sql = "SELECT * FROM books";

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Библиотека</title>
    <style>
        form {
            margin-bottom: 1em;
        }
        table {
            border-spacing: 0;
            border-collapse: collapse;
        }
        table td, table th {
            border: 1px solid #ccc;
            padding: 5px;
        }

        table th {
            background: #eee;
        }
    </style>
</head>
<body>
    <h1>Библиотека успешного человека</h1>
    <form method="GET">
        <input type="text" name="isbn" placeholder="ISBN" value="" />
        <input type="text" name="name" placeholder="Название книги" value="" />
        <input type="text" name="author" placeholder="Автор книги" value="" />
        <input type="submit" value="Поиск" />
    </form>

    <table>
        <tr>
            <th>Название</th>
            <th>Автор</th>
            <th>Год выпуска</th>
            <th>Жанр</th>
            <th>ISBN</th>
        </tr>

        <?php foreach ($pdo->query($sql) as $row): ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['author'] ?></td>
                <td><?= $row['year'] ?></td>
                <td><?= $row['genre'] ?></td>
                <td><?= $row['isbn'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

