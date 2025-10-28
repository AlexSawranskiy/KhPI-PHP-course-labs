<?php
interface AccountInterface {
    public function deposit($amount);   // Поповнення
    public function withdraw($amount);  // Зняття
    public function getBalance();       // Поточний баланс
}

class BankAccount implements AccountInterface {
    const MIN_BALANCE = 0;

    protected $balance;
    public $currency;

    public function __construct($currency = "USD", $initialBalance = 0) {
        $this->currency = $currency;
        $this->balance = 0;
        if ($initialBalance > 0) {
            $this->deposit($initialBalance);
        }
    }

    public function deposit($amount) {
        if (!is_numeric($amount) || $amount <= 0) {
            throw new Exception("Сума для поповнення некоректна!");
        }
        $this->balance += $amount;
        echo "Поповнено: $amount {$this->currency}<br>";
    }

    public function withdraw($amount) {
        if (!is_numeric($amount) || $amount <= 0) {
            throw new Exception("Сума для зняття некоректна!");
        }
        if ($amount > $this->balance) {
            throw new Exception("Недостатньо коштів для зняття!");
        }
        $this->balance -= $amount;
        echo "Знято: $amount {$this->currency}<br>";
    }

    public function getBalance() {
        return $this->balance;
    }
}

class SavingsAccount extends BankAccount {
    public static $interestRate = 5; // відсоткова ставка %

    // Метод для нарахування відсотків
    public function applyInterest() {
        $interest = $this->balance * self::$interestRate / 100;
        $this->balance += $interest;
        echo "Нараховано відсотки: $interest {$this->currency}<br>";
    }
}

?>

