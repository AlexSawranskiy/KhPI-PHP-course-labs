<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Server Info</title>
</head>
<body>
<h2>Робота з $_SERVER</h2>
<ul>
    <li>IP клієнта: <?= $_SERVER['REMOTE_ADDR'] ?></li>
    <li>Браузер: <?= $_SERVER['HTTP_USER_AGENT'] ?></li>
    <li>Назва скрипта: <?= $_SERVER['PHP_SELF'] ?></li>
    <li>Метод запиту: <?= $_SERVER['REQUEST_METHOD'] ?></li>
    <li>Шлях до файлу на сервері: <?= __FILE__ ?></li>
</ul>
</body>
</html>
