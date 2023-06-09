<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">


    <script src="https://kit.fontawesome.com/4631c0acdf.js" crossorigin="anonymous"></script>
    <title>task-1</title>
</head>
<body>
    
<div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
    <div id="drag_upload_file">
        <p>
            Drop file here
        </p>
        <i class="fa fa-light fa-cloud-arrow-up"></i>
        <p>
            or
        </p>
        <p>
            <input class="btn" type="button" value="Select File" onclick="file_explorer()"/>
        </p>
        <input type="file" id="selectfile"/>

    </div>


</div>
<div class="txt-area">
    <form action="ajax.php" method="POST">
        <p> Write some text to upload </p>
        <textarea type="textarea" rows="10" cols="70" name="text"></textarea>
        <input class="btn" type="submit" name="submit" value="Submit"/>
    </form>

</div>
<div id="img-content"></div>
<script src="custom.js"></script>

</body>
</html>