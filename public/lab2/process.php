<?php
$uploadDir = "uploads/";

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if (isset($_FILES['uploadedFile'])) {
    $file = $_FILES['uploadedFile'];

    $fileName = basename($file['name']);
    $fileTmp = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $targetFile = $uploadDir . $fileName;

    $allowedTypes = ['jpg', 'jpeg', 'png'];

    if (!in_array($fileType, $allowedTypes)) {
        die("Помилка: можна завантажувати лише зображення (jpg, jpeg, png).");
    }

    if ($fileSize > 2 * 1024 * 1024) {
        die("Помилка: розмір файлу перевищує 2 МБ.");
    }

    if (is_uploaded_file($fileTmp)) {

        if (file_exists($targetFile)) {
            $fileBase = pathinfo($fileName, PATHINFO_FILENAME);
            $fileName = $fileBase . "_" . time() . "." . $fileType;
            $targetFile = $uploadDir . $fileName;
            echo "Файл з такою назвою вже існував. Нове ім'я: $fileName<br>";
        }

        if (move_uploaded_file($fileTmp, $targetFile)) {
            echo "<h3>Файл успішно завантажено!</h3>";
            echo "Ім'я файлу: $fileName<br>";
            echo "Тип: $fileType<br>";
            echo "Розмір: " . round($fileSize / 1024, 2) . " КБ<br>";
            echo "<a href='$targetFile' download>Завантажити файл</a><br>";
        } else {
            echo "Помилка під час збереження файлу.";
        }

    } else {
        echo "Помилка: файл не був завантажений.";
    }

} else {
    echo "Файл не обрано.";
}
?>
