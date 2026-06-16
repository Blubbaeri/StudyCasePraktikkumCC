<?php
session_start();

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "admin" && $password == "admin123"){
        $_SESSION['admin'] = true;
        header("Location: task-list.php");
        exit;
    }

    $error = "Username or password incorrect!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>

    <style>
        body{
            background:#eef2f7;
            font-family:Arial;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .login-box{
            background:white;
            padding:35px;
            border-radius:15px;
            width:350px;
            box-shadow:0 5px 15px rgba(0,0,0,.15);
        }

        h2{
            text-align:center;
            margin-bottom:25px;
        }

        input{
            width:100%;
            padding:12px;
            margin:10px 0;
            border:1px solid #ddd;
            border-radius:8px;
        }

        button{
            width:100%;
            padding:12px;
            border:none;
            background:#0078d4;
            color:white;
            border-radius:8px;
            cursor:pointer;
        }

        button:hover{
            background:#005ea2;
        }

        .error{
            color:red;
            text-align:center;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Admin Login</h2>

    <?php if(isset($error)) : ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit" name="login">
            Login
        </button>
    </form>

    <p style="text-align:center;margin-top:15px;">
        admin / admin123
    </p>
</div>

</body>
</html>