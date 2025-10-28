<?php
$logFile = "log.txt";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $text = trim($_POST['textData']);

    if (!empty($text)) {
        file_put_contents($logFile, $text . PHP_EOL, FILE_APPEND);
        echo "<h3>Текст успішно записано у файл!</h3>";
    } else {
        echo "<h3>Поле тексту не може бути порожнім.</h3>";
    }
}

if (file_exists($logFile)) {
    echo "<h2>Вміст файлу log.txt:</h2>";
    $content = file_get_contents($logFile);
    echo nl2br(htmlspecialchars($content));
} else {
    echo "Файл log.txt ще не створено.";
}

echo "<br><br><a href='index.html'>Повернутися на головну</a>";
?>

