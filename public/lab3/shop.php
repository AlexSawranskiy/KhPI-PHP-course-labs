<?php
session_start();

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 300)) {
    session_unset();
    session_destroy();
    session_start();
}
$_SESSION['last_activity'] = time();

if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
if (!isset($_COOKIE['previous_cart'])) $_COOKIE['previous_cart'] = '';

if (isset($_POST['add'])) {
    $item = $_POST['item'];
    $_SESSION['cart'][] = $item;

    $previous = isset($_COOKIE['previous_cart']) ? explode(',', $_COOKIE['previous_cart']) : [];
    $previous[] = $item;
    setcookie('previous_cart', implode(',', $previous), time() + 30*24*60*60); // 30 днів
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Shop</title>
</head>
<body>
<h2>Корзина покупок</h2>

<form method="post">
    <label>Додати товар:</label>
    <input type="text" name="item" required>
    <button type="submit" name="add">Додати</button>
</form>

<h3>Ваші покупки зараз (сесія):</h3>
<?php if(!empty($_SESSION['cart'])): ?>
    <ul>
        <?php foreach($_SESSION['cart'] as $product): ?>
            <li><?= htmlspecialchars($product) ?></li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Корзина порожня</p>
<?php endif; ?>

<h3>Попередні покупки (cookie):</h3>
<?php
if (!empty($_COOKIE['previous_cart'])) {
    echo "<ul>";
    foreach(explode(',', $_COOKIE['previous_cart']) as $product) {
        echo "<li>" . htmlspecialchars($product) . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Немає попередніх покупок</p>";
}
?>
</body>
</html>
