<?php
session_start();
include 'config.php';

if(!isset($_GET['id'])){
    die("Task not found");
}

$id = $_GET['id'];

$query =
mysqli_query($conn,
"SELECT * FROM submissions WHERE id='$id'");

$data = mysqli_fetch_assoc($query);

/* CONDITIONAL BACK BUTTON */

$backLink = "submit-task.php";

if(isset($_SESSION['role'])){

    if($_SESSION['role'] == "admin"){
        $backLink = "admin-dashboard.php";
    }

    if($_SESSION['role'] == "mahasiswa"){
        $backLink = "submit-task.php";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task Detail</title>

<style>

body{
    font-family:Arial,sans-serif;
    background:#eef2f7;
    padding:40px;
}

.container{
    max-width:700px;
    margin:auto;
    background:white;
    padding:35px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,.1);
}

h2{
    text-align:center;
    margin-bottom:25px;
}

.row{
    margin:15px 0;
    padding:14px;
    background:#f8fafc;
    border-radius:10px;
}

.label{
    font-weight:bold;
}

.btn{
    display:inline-block;
    padding:12px 18px;
    border-radius:10px;
    text-decoration:none;
    color:white;
    margin-top:20px;
}

.back{
    background:#0078d4;
}

.file{
    background:#16a34a;
}

</style>
</head>
<body>

<div class="container">

<h2>Task Detail</h2>

<div class="row">
<b>NIM:</b>
<?= $data['nim']; ?>
</div>

<div class="row">
<b>Name:</b>
<?= $data['name']; ?>
</div>

<div class="row">
<b>Class:</b>
<?= $data['class']; ?>
</div>

<div class="row">
<b>Course:</b>
<?= $data['course']; ?>
</div>

<div class="row">
<b>Status:</b>
<?= $data['status']; ?>
</div>

<div class="row">
<b>Submitted At:</b>
<?= $data['submitted_at']; ?>
</div>

<div class="row">
<b>File URL:</b><br><br>

<a href="<?= $data['file_url']; ?>"
target="_blank"
class="btn file">
Open File
</a>

</div>

<a href="<?= $backLink ?>"
class="btn back">
Back
</a>

</div>

</body>
</html>