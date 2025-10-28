<?php
require_once "accounts.php";

echo "<h2>Тестування банківських рахунків</h2>";

try {
    $account1 = new BankAccount("USD", 1000);
    echo "<strong>Рахунок 1:</strong><br>";
    echo "Баланс: " . $account1->getBalance() . " USD<br>";
    $account1->deposit(500);
    $account1->withdraw(300);
    echo "Баланс після операцій: " . $account1->getBalance() . " USD<br><br>";

    $savings = new SavingsAccount("EUR", 2000);
    echo "<strong>Накопичувальний рахунок:</strong><br>";
    echo "Баланс: " . $savings->getBalance() . " EUR<br>";
    $savings->deposit(1000);
    $savings->withdraw(500);
    $savings->applyInterest();
    echo "Баланс після операцій та відсотків: " . $savings->getBalance() . " EUR<br><br>";

    echo "<strong>Перевірка винятку:</strong><br>";
    $account1->withdraw(5000); // Тут буде Exception
} catch (Exception $e) {
    echo "<span style='color:red;'>Помилка: " . $e->getMessage() . "</span><br>";
}

try {
    $savings->deposit(-100);
} catch (Exception $e) {
    echo "<span style='color:red;'>Помилка: " . $e->getMessage() . "</span><br>";
}

?>

