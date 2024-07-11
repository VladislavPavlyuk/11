<?php

$absolutePath = 'c:/xampp/htdocs/phpHomeworks/11'; // будем сохранять загружаемые  файлы в эту директорию
$uploaddir = '/site/images/';
$destination = $absolutePath.$uploaddir.$_FILES['myfile']['name'];    // имя файла оставим неизменным
/* перемещаем файл из временной папки в выбранную директорию для хранения */
if (move_uploaded_file($_FILES['myfile']['tmp_name'], $destination)) {
    try {
        $user = "root";
        $pass = "";
        $db = new PDO('mysql:host=localhost;dbname=pictures', $user, $pass);

        $name = $_FILES['myfile']['name'];
        $size = filesize($destination);
        $imagepath =  $uploaddir;

        // Prepare the query
        $sql = "INSERT INTO `pictures` (`name`, `size`, `imagepath`) VALUES (?,?,?)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $size);
        $stmt->bindParam(3, $imagepath);

        $stmt->execute();
        $sql = $stmt = null;

        print 'File '.$name.' uploaded successfully! <br>';
    } catch (PDOException $e) {
        //Вывести сообщение и прекратить выполнение текущего скрипта
        die("Error: " . $e->getMessage());
    }
}

else
{
    echo "Uploadfile error. Debug info :<br>";
    print_r($_FILES);
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loading File</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
</head>
<body>
<br>
<button type="button" class="btn btn-success" onclick="location.href = 'http://localhost:63342/Site/index.php';">Home</button>
</body>
</html>
