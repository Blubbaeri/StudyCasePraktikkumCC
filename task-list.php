<?php
include 'config.php';

$data = mysqli_query(
$conn,
"SELECT * FROM submissions ORDER BY id DESC"
);
?>

<!DOCTYPE html>
<html>
<head>
<title>Daftar Tugas</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>

body{
    font-family:Arial, sans-serif;
    background:#f4f6f9;
    padding:30px;
}

.container{
    max-width:1100px;
    margin:auto;
    background:white;
    padding:30px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

h1{
    text-align:center;
    margin-bottom:25px;
}

.table-wrapper{
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#2563eb;
    color:white;
    padding:15px;
}

td{
    padding:14px;
    border-bottom:1px solid #ddd;
}

tr:hover{
    background:#f9fafb;
}

.badge{
    background:#dcfce7;
    color:#166534;
    padding:8px 14px;
    border-radius:20px;
    font-size:13px;
}

.back{
    margin-top:20px;
}

.back a{
    text-decoration:none;
    color:#2563eb;
    font-weight:bold;
}

</style>

</head>
<body>

<div class="container">

<h1>Daftar Pengumpulan Tugas</h1>

<div class="table-wrapper">
<table>

<tr>
    <th>ID</th>
    <th>NIM</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>Mata Kuliah</th>
    <th>Status</th>
</tr>

<?php while($row = mysqli_fetch_assoc($data)) { ?>

<tr>
    <td><?= $row['id']; ?></td>
    <td><?= $row['nim']; ?></td>
    <td><?= $row['name']; ?></td>
    <td><?= $row['class']; ?></td>
    <td><?= $row['course']; ?></td>
    <td>
        <span class="badge">
            <?= $row['status']; ?>
        </span>
    </td>
</tr>

<?php } ?>

</table>
</div>

<div class="back">
    <a href="submit-task.php">
        ← Kembali ke Form
    </a>
</div>

</div>

</body>
</html>

