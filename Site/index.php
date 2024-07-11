
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pictures";


// Создание подключения
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Установка режима обработки ошибок
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Запрос для получения количества изображений
$sql = "SELECT COUNT(*) AS image_count FROM Pictures";
$result = $conn->query($sql);

if ($result->rowCount() > 0) {
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $imageCount = $row["image_count"];
    echo "Uploaded pictures : " . $imageCount;
} else {
    echo "No pictures found";
}

// Закрытие подключения
$conn = null;
?>


<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">


<body>
<h2 class="text-center">Загрузка файлов на сервер</h2>
<h3 class="text-center">Взаимодействие с СУБД MySQL через PDO</h3>

<p><a href="pages\upload.php">Upload picture</a></p>
<p><a href="pages\show.php">Show picture</a></p>


</body>
</html>

