<?php
include 'config.php';

$message = "";

if(isset($_POST['submit'])){

    $nim = $_POST['nim'];
    $name = $_POST['name'];
    $class = $_POST['class'];
    $course = $_POST['course'];

    $query = "INSERT INTO submissions
    (nim, name, class, course, file_url, status)
    VALUES
    ('$nim','$name','$class','$course',
    'file-belum-upload','Submitted')";

    if(mysqli_query($conn, $query)){
        $message = "Data berhasil disimpan!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PraktikumSubmit</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            background:#f4f6f9;
            display:flex;
            justify-content:center;
            align-items:center;
            min-height:100vh;
            padding:20px;
        }

        .container{
            background:white;
            width:100%;
            max-width:500px;
            padding:35px;
            border-radius:18px;
            box-shadow:0 10px 30px rgba(0,0,0,0.1);
        }

        h1{
            text-align:center;
            margin-bottom:10px;
            color:#222;
        }

        p.subtitle{
            text-align:center;
            color:#666;
            margin-bottom:30px;
        }

        label{
            font-weight:bold;
            display:block;
            margin-bottom:8px;
            margin-top:15px;
        }

        input{
            width:100%;
            padding:14px;
            border:1px solid #ddd;
            border-radius:10px;
            outline:none;
            transition:.3s;
        }

        input:focus{
            border-color:#2563eb;
        }

        button{
            width:100%;
            margin-top:25px;
            padding:15px;
            border:none;
            border-radius:12px;
            background:#2563eb;
            color:white;
            font-size:16px;
            cursor:pointer;
            transition:.3s;
        }

        button:hover{
            transform:translateY(-2px);
        }

        .success{
            background:#dcfce7;
            color:#166534;
            padding:12px;
            border-radius:10px;
            margin-bottom:20px;
            text-align:center;
        }

        .link{
            text-align:center;
            margin-top:20px;
        }

        .link a{
            text-decoration:none;
            color:#2563eb;
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

    <form method="POST">

        <label>NIM</label>
        <input type="text" name="nim" required>

        <label>Nama Mahasiswa</label>
        <input type="text" name="name" required>

        <label>Kelas</label>
        <input type="text" name="class" required>

        <label>Mata Kuliah</label>
        <input type="text" name="course" required>

        <button type="submit" name="submit">
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
