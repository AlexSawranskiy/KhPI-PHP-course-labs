<?php
$uploadDir = "uploads/";

echo "<h2>Список завантажених файлів</h2>";

if (is_dir($uploadDir)) {
    $files = array_diff(scandir($uploadDir), ['.', '..']);

    if (count($files) > 0) {
        echo "<ul>";
        foreach ($files as $file) {
            $filePath = $uploadDir . $file;
            echo "<li><a href='$filePath' download>$file</a></li>";
        }
        echo "</ul>";
    } else {
        echo "Папка 'uploads' порожня.";
    }
} else {
    echo "Папки 'uploads' не існує.";
}

echo "<br><a href='index.html'>Повернутися на головну</a>";
?>

