<?php
// Виводимо текст "Hello, World!"
echo "Hello, World!<br><br>";

// Оголошення змінних різних типів
$stringVar = "Привіт, PHP!";
$intVar = 25;
$floatVar = 3.14;
$boolVar = true;

// Виведення значень змінних
echo "Рядок: $stringVar<br>";
echo "Ціле число: $intVar<br>";
echo "Число з плаваючою комою: $floatVar<br>";
echo "Булеве значення: " . ($boolVar ? "true" : "false") . "<br><br>";

// Виведення типів змінних
echo "Типи змінних:<br>";
var_dump($stringVar);
var_dump($intVar);
var_dump($floatVar);
var_dump($boolVar);
echo "<br>";

$firstName = "Олександр";
$lastName = "Савранський";

// Об'єднуємо два рядки
$fullName = $firstName . " " . $lastName;
echo "Повне ім'я: " . $fullName . "<br><br>";


$number = 7;

// Перевіряємо, чи число парне
if ($number % 2 == 0) {
    echo "Число $number є парним.<br><br>";
} else {
    echo "Число $number є непарним.<br><br>";
}

// Цикл for — числа від 1 до 10
echo "Числа від 1 до 10 (for):<br>";
for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
}
echo "<br><br>";

echo "Числа від 10 до 1 (while):<br>";
$j = 10;
while ($j >= 1) {
    echo $j . " ";
    $j--;
}
echo "<br><br>";

// Асоціативний масив студента
$student = [
    "ім'я" => "Олександр",
    "прізвище" => "Савранський",
    "вік" => 19,
    "спеціальність" => "122. Комп'ютерні науки"
];

// Виведення значень елементів
echo "Інформація про студента:<br>";
foreach ($student as $key => $value) {
    echo ucfirst($key) . ": $value<br>";
}

// Додаємо новий елемент — середній бал
$student["середній_бал"] = 91.5;

echo "<br>Оновлений масив:<br>";
print_r($student);
echo "<br><br>";

?>

<!-- HTML-форма -->
<form method="post" action="">
    <label>Ім'я:</label>
    <input type="text" name="fname"><br><br>

    <label>Прізвище:</label>
    <input type="text" name="lname"><br><br>

    <input type="submit" value="Надіслати">
</form>

<?php
// Перевіряємо, чи форма була відправлена
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Отримуємо дані з форми
    $fname = trim($_POST["fname"]);
    $lname = trim($_POST["lname"]);

    // Перевіряємо, чи не пусті поля
    if (!empty($fname) && !empty($lname)) {

        // Перевіряємо, що це рядки
        if (is_string($fname) && is_string($lname)) {
            echo "<br>Вітаємо, $fname $lname!";
        } else {
            echo "<br>Будь ласка, введіть правильні дані.";
        }
    } else {
        echo "<br>Поля не можуть бути порожніми!";
    }
}
?>


