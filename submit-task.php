<?php

$message = "";

include 'config.php';
include 'storage-config.php';

if(isset($_POST['submit'])){

    $nim = $_POST['nim'];
    $name = $_POST['name'];
    $class = $_POST['class'];
    $course = $_POST['course'];

    if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){

        $fileTmp = $_FILES['file']['tmp_name'];
        $originalName = $_FILES['file']['name'];

        $extension = strtolower(
            pathinfo($originalName, PATHINFO_EXTENSION)
        );

        $allowed = ['pdf','docx','zip'];

        if(in_array($extension, $allowed)){

            $newFileName =
                $nim . "_" .
                strtolower(str_replace(' ','_',$name))
                . "_tugas." .
                $extension;

            $content = fopen($fileTmp, "r");

            $blobClient->createBlockBlob(
                $containerName,
                $newFileName,
                $content
            );

            $file_url =
                "https://praktikumsubmit017.blob.core.windows.net/tugas-praktikum/"
                . $newFileName;

            mysqli_query($conn,
            "INSERT INTO submissions
            (nim,name,class,course,file_url,status)
            VALUES
            ('$nim','$name','$class','$course',
            '$file_url','Submitted')");

            $message = "Tugas berhasil diupload!";
        }
        else{
            $message = "Format file harus PDF, DOCX, atau ZIP!";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>PraktikumSubmit</title>

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:#eef2f7;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:20px;
}

.container{
    width:100%;
    max-width:550px;
    background:#fff;
    border-radius:20px;
    padding:35px;
    box-shadow:0 10px 30px rgba(0,0,0,.12);
}

h1{
    text-align:center;
    margin-bottom:8px;
    color:#222;
}

.subtitle{
    text-align:center;
    color:#666;
    margin-bottom:30px;
}

label{
    display:block;
    margin-top:16px;
    margin-bottom:8px;
    font-weight:bold;
}

input{
    width:100%;
    padding:14px;
    border:1px solid #ddd;
    border-radius:12px;
    outline:none;
    transition:.3s;
}

input:focus{
    border-color:#0078d4;
}

button{
    width:100%;
    margin-top:25px;
    padding:15px;
    border:none;
    border-radius:12px;
    background:#0078d4;
    color:white;
    font-size:16px;
    cursor:pointer;
}

button:hover{
    background:#005ea6;
}

.success{
    background:#dcfce7;
    color:#166534;
    padding:14px;
    border-radius:10px;
    margin-bottom:20px;
    text-align:center;
}

.link{
    margin-top:20px;
    text-align:center;
}

.link a{
    color:#0078d4;
    text-decoration:none;
    font-weight:bold;
}

</style>
</head>

<body>

<div class="container">

    <h1>PraktikumSubmit</h1>

    <p class="subtitle">
        Form Pengumpulan Tugas Praktikum
    </p>

    <?php if($message != ""){ ?>
        <div class="success">
            <?= $message ?>
        </div>
    <?php } ?>

    <form method="POST"
          enctype="multipart/form-data">

        <label>NIM</label>
        <input type="text"
               name="nim"
               required>

        <label>Nama Mahasiswa</label>
        <input type="text"
               name="name"
               required>

        <label>Kelas</label>
        <input type="text"
               name="class"
               required>

        <label>Mata Kuliah</label>
        <input type="text"
               name="course"
               required>

        <label>Upload Tugas</label>
        <input type="file"
               name="file"
               accept=".pdf,.docx,.zip"
               required>

        <button type="submit"
                name="submit">
            Submit Tugas
        </button>

    </form>

    <div class="link">
        <a href="task-list.php">
            Lihat Daftar Pengumpulan →
        </a>
    </div>

</div>

</body>
</html>