<?php
include 'config.php';

$query = mysqli_query($conn,
"SELECT * FROM submissions
ORDER BY submitted_at DESC");

$total = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>

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
    background:#eef3f8;
}

/* NAVBAR */

.navbar{
    background:#0078d4;
    color:white;
    padding:20px 40px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
}

.navbar h1{
    font-size:28px;
}

.navbar p{
    opacity:.9;
}

.logout{
    background:white;
    color:#0078d4;
    text-decoration:none;
    padding:12px 20px;
    border-radius:10px;
    font-weight:bold;
}

/* CONTENT */

.container{
    max-width:1300px;
    margin:35px auto;
    padding:0 20px;
}

/* SUMMARY */

.summary{
    display:grid;
    grid-template-columns:
    repeat(auto-fit,minmax(240px,1fr));

    gap:20px;
    margin-bottom:30px;
}

.card{
    background:white;
    padding:25px;
    border-radius:20px;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
}

.card h3{
    color:#666;
    margin-bottom:10px;
}

.card h2{
    font-size:35px;
    color:#0078d4;
}

/* TABLE */

.table-box{
    background:white;
    padding:25px;
    border-radius:20px;
    box-shadow:0 8px 25px rgba(0,0,0,.08);
    overflow-x:auto;
}

.table-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
    flex-wrap:wrap;
    gap:10px;
}

.search{
    padding:12px;
    border:1px solid #ddd;
    border-radius:10px;
    width:300px;
    max-width:100%;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#f5f7fb;
    padding:16px;
    text-align:left;
}

td{
    padding:16px;
    border-bottom:1px solid #eee;
}

tr:hover{
    background:#fafafa;
}

.status{
    background:#dcfce7;
    color:#166534;
    padding:8px 14px;
    border-radius:999px;
    font-size:13px;
    font-weight:bold;
}

.btn{
    padding:10px 14px;
    border-radius:10px;
    text-decoration:none;
    color:white;
    font-size:14px;
    display:inline-block;
    margin:2px;
}

.detail{
    background:#0078d4;
}

.file{
    background:#16a34a;
}

.footer{
    text-align:center;
    margin-top:35px;
    color:#666;
    padding-bottom:30px;
}

@media(max-width:768px){

    .navbar{
        padding:20px;
    }

    .navbar h1{
        font-size:22px;
    }

    table{
        font-size:14px;
    }
}

</style>
</head>

<body>

<div class="navbar">

    <div>
        <h1>Admin Dashboard</h1>
        <p>PraktikumSubmit Monitoring</p>
    </div>

    <a href="logout.php"
       class="logout">
       Logout
    </a>

</div>

<div class="container">

<div class="summary">

    <div class="card">
        <h3>Total Submission</h3>
        <h2><?= $total ?></h2>
    </div>

    <div class="card">
        <h3>Status</h3>
        <h2>Submitted</h2>
    </div>

</div>

<div class="table-box">

<div class="table-header">

    <h2>Daftar Pengumpulan</h2>

    <input type="text"
           id="searchInput"
           class="search"
           placeholder="Cari mahasiswa...">

</div>

<table id="submissionTable">

<thead>
<tr>
    <th>ID</th>
    <th>NIM</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>Course</th>
    <th>Status</th>
    <th>Upload Time</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>

<?php while($row =
mysqli_fetch_assoc($query)){ ?>

<tr>

<td><?= $row['id'] ?></td>

<td><?= $row['nim'] ?></td>

<td><?= $row['name'] ?></td>

<td><?= $row['class'] ?></td>

<td><?= $row['course'] ?></td>

<td>
<span class="status">
<?= $row['status'] ?>
</span>
</td>

<td>
<?= $row['submitted_at'] ?>
</td>

<td>

<a href="task-detail.php?id=
<?= $row['id'] ?>"
class="btn detail">
Detail
</a>

<a href="<?= $row['file_url'] ?>"
target="_blank"
class="btn file">
File
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

<div class="footer">
PraktikumSubmit Azure Cloud System
</div>

<script>

document
.getElementById("searchInput")
.addEventListener("keyup",
function(){

const keyword =
this.value.toLowerCase();

const rows =
document.querySelectorAll(
"#submissionTable tbody tr"
);

rows.forEach(row => {

const text =
row.innerText.toLowerCase();

row.style.display =
text.includes(keyword)
? ""
: "none";

});

});

</script>

</body>
</html>
