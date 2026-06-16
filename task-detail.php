<?php
include 'config.php';

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM submissions WHERE id='$id'");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task Detail</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f5f7fb;
            padding:40px;
        }

        .container{
            max-width:700px;
            margin:auto;
            background:white;
            padding:30px;
            border-radius:15px;
            box-shadow:0 5px 15px rgba(0,0,0,.1);
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }

        .row{
            margin:12px 0;
        }

        .label{
            font-weight:bold;
        }

        a.button{
            display:inline-block;
            margin-top:20px;
            background:#0078d4;
            color:white;
            padding:10px 20px;
            text-decoration:none;
            border-radius:8px;
        }

        a.button:hover{
            background:#005ea2;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Task Detail</h2>

    <div class="row"><span class="label">NIM:</span> <?= $data['nim']; ?></div>
    <div class="row"><span class="label">Name:</span> <?= $data['name']; ?></div>
    <div class="row"><span class="label">Class:</span> <?= $data['class']; ?></div>
    <div class="row"><span class="label">Course:</span> <?= $data['course']; ?></div>
    <div class="row"><span class="label">Status:</span> <?= $data['status']; ?></div>
    <div class="row"><span class="label">Submitted At:</span> <?= $data['submitted_at']; ?></div>

    <div class="row">
        <span class="label">File:</span>
        <a href="<?= $data['file_url']; ?>" target="_blank">
            View Uploaded File
        </a>
    </div>

    <a href="task-list.php" class="button">
        Back to List
    </a>
</div>

</body>
</html>