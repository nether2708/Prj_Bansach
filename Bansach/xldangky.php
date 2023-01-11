<?php
 header('Content-Type: text/html; charset=UTF-8');
    include './database/db.php';

    $username   = addslashes($_POST['txtUsername']);
    $password   = addslashes($_POST['txtPassword']);
    $email      = addslashes($_POST['txtEmail']);
    $fullname   = addslashes($_POST['txtFullname']);
    $birthday   = addslashes($_POST['txtBirthday']);

    $password = md5($password);      
    if (!$username || !$password || !$email || !$fullname || !$birthday)
    {
        echo "Vui lòng nhập đầy đủ thông tin. <a href='dangkytk.html'>Quay lại</a>";
        exit;
    }     
    if (mysqli_num_rows($connect->query("SELECT username FROM users WHERE username='$username'")) > 0){
        echo "Tên đăng nhập này đã sử dụng.<a href=dangkytk.html>Quay lại</a>";
        exit;
    }
    if (mysqli_num_rows($connect->query("SELECT email FROM users WHERE email='$email'")) > 0)
    {
        echo "Email này đã sử dụng.<a href='dangkytk.html'>Quay lại</a>";
        exit;
    }
    if (!mb_eregi("^[0-9]+/[0-9]+/[0-9]{2,4}", $birthday))
    {
        echo "Ngày tháng năm sinh không hợp lệ..<a href=dangkytk.html>Quay lại</a>";
        exit;
    }
          
    @$add = $connect->query("
        INSERT INTO users ( username,password, email,fullname, birthday) VALUE ('{$username}','{$password}','{$email}','{$fullname}','{$birthday}')");              
    if ($add)
        header("location:index.php");
?>