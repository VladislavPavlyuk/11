<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
<head>
    <meta http-equiv="Content-type" content="text/html;UTF-8">
    <title>Upload</title>
</head>

<body>


<form enctype="multipart/form-data" action="LoadingFile.php" method="post">

    <div class="input-group mb-3">
        <label class="input-group-text" id="inputGroup">Upload</label>

        <input class="form-control" id="inputGroup" type="hidden" name="MAX_FILE_SIZE" value="30000000" />

        <input class="form-control" id="inputGroup" type="file" name="myfile" /><br>

        <br><input class="form-control" id="inputGroup" type="submit"  value="Send" />
    </div>


</form>
</body>
</html>