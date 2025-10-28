<?php
require_once "classes.php";

$product1 = new Product("Смартфон", 12000, "Сучасний смартфон з гарною камерою");
$product2 = new Product("Ноутбук", 25000, "Потужний ноутбук для роботи та навчання");

$discounted1 = new DiscountedProduct("Планшет", 8000, "Легкий планшет для навчання", 15);
$discounted2 = new DiscountedProduct("Навушники", 2000, "Бездротові навушники", 25);

$category1 = new Category("Електроніка");
$category2 = new Category("Аксесуари");

$category1->addProduct($product1);
$category1->addProduct($product2);
$category1->addProduct($discounted1);

$category2->addProduct($discounted2);

$category1->showProducts();
$category2->showProducts();
?>

