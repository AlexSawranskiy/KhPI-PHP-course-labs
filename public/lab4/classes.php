<?php
// Клас Product
class Product {
    public $name;          // Назва товару
    protected $price;      // Ціна товару
    public $description;   // Опис товару

    public function __construct($name, $price, $description) {
        $this->name = $name;
        $this->setPrice($price);
        $this->description = $description;
    }

    public function setPrice($price) {
        if ($price < 0) {
            throw new Exception("Ціна не може бути від'ємною!");
        }
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getInfo() {
        echo "Назва: {$this->name}<br>";
        echo "Ціна: {$this->price} грн<br>";
        echo "Опис: {$this->description}<br>";
    }
}

// Клас DiscountedProduct
class DiscountedProduct extends Product {
    public $discount; // Знижка у відсотках

    public function __construct($name, $price, $description, $discount) {
        parent::__construct($name, $price, $description);
        $this->discount = $discount;
    }

    public function getDiscountedPrice() {
        return $this->getPrice() * (1 - $this->discount / 100);
    }

    public function getInfo() {
        echo "Назва: {$this->name}<br>";
        echo "Ціна: {$this->getPrice()} грн<br>";
        echo "Знижка: {$this->discount}%<br>";
        echo "Ціна зі знижкою: {$this->getDiscountedPrice()} грн<br>";
        echo "Опис: {$this->description}<br>";
    }
}

class Category {
    public $name;      // Назва категорії
    public $products;  // Масив товарів

    public function __construct($name) {
        $this->name = $name;
        $this->products = [];
    }

    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    public function showProducts() {
        echo "<h3>Категорія: {$this->name}</h3>";
        if (empty($this->products)) {
            echo "<p>Товари відсутні.</p>";
        } else {
            foreach ($this->products as $product) {
                echo "<div style='margin-bottom:15px;'>";
                $product->getInfo();
                echo "</div>";
            }
        }
    }
}
?>

