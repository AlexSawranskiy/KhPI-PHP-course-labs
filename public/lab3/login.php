<?php
session_start();

$valid_user = 'user';
$valid_pass = '1234';

if (isset($_POST['login'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if ($login === $valid_user && $password === $valid_pass) {
        $_SESSION['user'] = $login;
        $_SESSION['last_activity'] = time(); // для тайм-ауту
        header('Location: login.php');
        exit;
    } else {
        $error = "Невірний логін або пароль";
    }
}

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 300)) {
    session_unset();
    session_destroy();
    session_start();
    $error = "Сесія закінчилась через неактивність";
} else {
    $_SESSION['last_activity'] = time();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<h2>Робота з $_SESSION</h2>

<?php if(isset($_SESSION['user'])): ?>
    <p>Привіт, <?= $_SESSION['user'] ?>!</p>
    <form method="post" action="logout.php">
        <button type="submit">Вихід</button>
    </form>
<?php else: ?>
    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
        <label>Логін:</label>
        <input type="text" name="login" required>
        <br>
        <label>Пароль:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Увійти">
    </form>
<?php endif; ?>
</body>
</html>

