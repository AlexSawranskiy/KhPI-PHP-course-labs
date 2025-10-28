<?php
session_start();

if (isset($_POST['username'])) {
    $username = htmlspecialchars($_POST['username']);
    setcookie('username', $username, time() + 7*24*60*60);
    $_COOKIE['username'] = $username; //
}

if (isset($_POST['delete_cookie'])) {
    setcookie('username', '', time() - 3600);
    unset($_COOKIE['username']);
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>LAB_3</title>
</head>
<body>
<h2>Робота з $_COOKIE</h2>

<?php if(isset($_COOKIE['username'])): ?>
    <p>Привіт, <?= $_COOKIE['username'] ?>!</p>
<?php else: ?>
    <form method="post">
        <label>Введіть ваше ім'я:</label>
        <input type="text" name="username" required>
        <input type="submit" value="Зберегти">
    </form>
<?php endif; ?>

<?php if(isset($_COOKIE['username'])): ?>
    <form method="post">
        <button type="submit" name="delete_cookie">Видалити cookie</button>
    </form>
<?php endif; ?>
</body>
</html>

