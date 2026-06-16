<?php
session_start();

if(isset($_SESSION['role'])){
    
    if($_SESSION['role'] == 'admin'){
        header("Location: admin-dashboard.php");
        exit;
    }

    if($_SESSION['role'] == 'mahasiswa'){
        header("Location: submit-task.php");
        exit;
    }
}

$error = "";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    // ADMIN
    if($username == "admin" && $password == "admin123"){

        $_SESSION['role'] = "admin";

        header("Location: task-list.php");
        exit;
    }

    // MAHASISWA
    elseif($username == "mahasiswa" && $password == "mhs123"){

        $_SESSION['role'] = "mahasiswa";

        header("Location: submit-task.php");
        exit;
    }

    else{
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login Praktikum</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg,#0078d4,#00b4db);
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:20px;
}

.container{
    background:#fff;
    width:100%;
    max-width:420px;
    border-radius:20px;
    padding:35px;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
}

h2{
    text-align:center;
    margin-bottom:10px;
    color:#333;
}

.subtitle{
    text-align:center;
    color:#777;
    margin-bottom:25px;
}

input{
    width:100%;
    padding:14px;
    margin-bottom:15px;
    border:1px solid #ddd;
    border-radius:10px;
    font-size:16px;
}

input:focus{
    outline:none;
    border-color:#0078d4;
}

button{
    width:100%;
    padding:14px;
    border:none;
    border-radius:10px;
    background:#0078d4;
    color:white;
    font-size:16px;
    cursor:pointer;
    transition:.3s;
}

button:hover{
    background:#005ea6;
}

.error{
    background:#ffe5e5;
    color:#d8000c;
    padding:12px;
    border-radius:8px;
    margin-bottom:15px;
    text-align:center;
}

.role-box{
    background:#f4f7fb;
    border-radius:12px;
    padding:15px;
    margin-top:20px;
}

.role-box h4{
    margin-bottom:10px;
}

.role-box p{
    margin:5px 0;
    color:#555;
}

</style>
</head>
<body>

<div class="container">

    <h2>Login Sistem Praktikum</h2>
    <p class="subtitle">
        Login sebagai Admin atau Mahasiswa
    </p>

    <?php if($error != "") : ?>
        <div class="error">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <input 
            type="text" 
            name="username" 
            placeholder="Username"
            required
        >

        <input 
            type="password" 
            name="password" 
            placeholder="Password"
            required
        >

        <button type="submit" name="login">
            Login
        </button>

    </form>

    <div class="role-box">
        <h4>Demo Account</h4>

        <p><b>Admin</b><br>
        Username: admin<br>
        Password: admin123</p>

        <br>

        <p><b>Mahasiswa</b><br>
        Username: mahasiswa<br>
        Password: mhs123</p>
    </div>

</div>

</body>
</html>