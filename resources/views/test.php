<?php

if (!isset($_SESSION)) {
    session_start();
}
//    var_dump($_SESSION);
$cuid = "cuid";
$id = "id";
if (!empty($_SESSION['cuid'])) {
    $cuid = $_SESSION['cuid'];
}
if (!empty($_SESSION['id'])) {
    $id = $_SESSION['id'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test the backend web-api</title>
    <style>
        div div {
            width: 50%;
            margin-bottom: 10px;
            padding: 5px 0px;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
        }
        input {
            margin: 2px 0px;
        }
        input[type=submit] {
            margin-bottom: 5px;
        }
        input[name=cuid], input[type=number], label {
            background: #EEE;
            padding: 0px 3px;
        }
    </style>
</head>
<body>

<div>
    <h2>Testing your web-api</h2>
    <p style="font-weight: bold; font-style: italic">Using a web-interface</p>
    <div>
        Show the <a href="/">web-api</a> interface
    </div>
    <div>
        Check the <a href="/api/health">health</a> of the web-api
    </div>
    <div>
        Get a <a href="/test/get_cuid">new CUID<a/>
    </div>
    <div>
        <form action="/test" method="post">
            <input type="text" name="cuid" placeholder="cuid" value="<?=$cuid?>" required>
            <input type="submit" name="set_cuid" value="Use this CUID" >
        </form>
    </div>
    <div>
        <b>Upload a GPX-file</b>
        <form action="/api/routes/upload/<?=$cuid?>" method="post" enctype="multipart/form-data">
            <i>Select gpx-file to upload:</i><br>
            Route = <label>/upload/<?=$cuid?></label><br>
            <input type="file" name="route" id="fileToUpload"><br>
            <input type="submit" value="Upload GPX-file" >
        </form>
    </div>
    <div>
        <b>Get all the routes</b><br>
        <i>For a specific CUID</i><br>
        Route = <label>/routes/<?=$cuid?></label><br>
        <form action="/api/routes/<?=$cuid?>" method="get">
            <input type="submit" value="Get all routes" >
        </form>
    </div>
    <div>
        <b>Delete a GPX-file</b><br>
        <i>using CUID and ID</i>
        <form action="/test" method="post">
            <input type="number" name="id" placeholder="route id" value="<?=$id?>" required>
            <input type="submit" name="set_id" value="Use this ID">
        </form>
        Route = <label>/delete/<?=$id?>/<?=$cuid?></label><br>
        <form action="/api/delete/<?=$id?>/<?=$cuid?>" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <input type="submit" value="Delete route">
        </form>
    </div>
</div>

</body>
</html>

