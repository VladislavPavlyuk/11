<?php

$targetFile = "";
if (isset($_POST['submit']) && isset($_POST["image"]))
    $targetFile = $_POST["image"];

    try {
        $user = "root";
        $pass = "";
        $absolutePath = 'c:/xampp/htdocs/phpHomeworks/11';
        $db = new PDO('mysql:host=localhost;dbname=pictures', $user, $pass);

        //$tempStr = "SELECT imagepath FROM Pictures WHERE name LIKE ".$targetFile." GROUP BY imagepath";
            //$query = $tempStr;
        $query = "SELECT imagepath FROM Pictures";
            $stmt = $db->query($query);
            $imagepath = $stmt->fetch();
            $fullImageFileName = $imagepath["imagepath"].$targetFile;

        $fileSize = filesize($absolutePath.$fullImageFileName);
        $fullImageFileName = str_replace("\\", "/", $fullImageFileName);



    }
    catch(PDOException $e) {
        //Вывести сообщение и прекратить выполнение текущего скрипта
        die("Error: ".$e->getMessage());
    }
    ?>

<html>
<head>
    <meta http-equiv="Content-type" content="text/html;UTF-8">
    <title>Show</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
</head>

<form action="show.php" method="post" enctype="multipart/form-data">

<?php

try{
    $user = "root";
    $pass = "";
    $db = new PDO('mysql:host=localhost;dbname=pictures', $user, $pass);

        $query = "SELECT name FROM Pictures";
        $stmt = $db->query($query);
        $number_fields = $stmt->columnCount();

        echo '<div class="input-group mb-3">';
        echo '<label for="filenames" class="input-group-text" id="inputGroup">Please select file:</label><br>';
        echo '<select class="form-select" aria-label="Default select example" name="image" id="filenames" required>';

        while ($row = $stmt->fetch())
        {
            for ($j = 0; $j < $number_fields; $j++)
                {
                    if($row['name'])
                        echo '<option value = "'.$row[$j].'">'.$row[$j].'</option>';
                    else
                        echo '<option>&nbsp;</option>';
                }
        }
        echo "</select>";
    }
catch(PDOException $e)
    {
        //Вывести сообщение и прекратить выполнение текущего скрипта
        die("Error: ".$e->getMessage());
    }
?>

    <br><input class="form-control" id="inputGroup" name="submit" type="submit" value="Show" />

</div>

</form>

<br><button type="button" class="btn btn-success" onclick="location.href = 'http://localhost:63342/Site/index.php';">Home</button>

<div class="mb-3 row">
    <label  class="col-sm-7 col-form-label"><?php echo $fullImageFileName; ?></label>
    <label  class="col-sm-2 col-form-label"><?php echo '  Size : '.$fileSize; ?></label>
    <br><img src="<?php echo $fullImageFileName ?>" class="rounded float-start" alt="Pic">
</div>
</body>
</html>
