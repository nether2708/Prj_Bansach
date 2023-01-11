<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
if (isset($_POST['dangnhap'])) 
{
    include('./database/db.php');
    $username = addslashes($_POST['txtUsername']);
    $password = addslashes($_POST['txtPassword']);
    $password = md5($password);
    $query = $connect->query("SELECT username, password FROM users WHERE username='$username'");
   
    if (mysqli_num_rows($query) == 0) {
        echo "Tên đăng nhập không tồn tại. <a href='index.php'>Quay lại</a>";
        exit;
    }
    $row = mysqli_fetch_array($query);
    if ($password != $row['password']) {
        echo "Mật khẩu không đúng.<a href='index.php'>Quay lại</a>";
        exit;
    }
    if ($username == "admin"||$password == "admin") 
    header("Location:dssp.php");
else
    header("location:trangChu.html"); 
die();
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css\login.css">
</head>

<body>      
 <div class="all">
     <div class="login">         
            <div class="formLogin">
                <form action='index.php?do=dangnhap' method='POST'>
                    <label for="">Đăng nhập</label>
                    <div class="User">
                        <input type="text" name="txtUsername" placeholder="Username" size="30" class="txt">
                        <input type="password" name="txtPassword" id="" placeholder="Password" size="30" class="txt">
                        <input type="submit" name="dangnhap" value="Đăng nhập" class="btndangnhap">
                    </div>
                </form>
                <button  onclick="window.location.href='./dangkytk.html'"  class="btndangky">Đăng ký</button>
            </div>
        </div>    
        </div>    
    </div>
    </div>
