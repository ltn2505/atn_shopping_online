<?php
 
    // Nếu không phải là sự kiện đăng ký thì không xử lý
    if (!isset($_POST['txtUsername'])){
        die('');
    }
     
    //Nhúng file kết nối với database
    include_once('../connect.php');
          
    //Khai báo utf-8 để hiển thị được tiếng việt
    header('Content-Type: text/html; charset=UTF-8');
          
    //Lấy dữ liệu từ file dangky.php
    $username   = addslashes($_POST['txtUsername']);
    $password   = addslashes($_POST['txtPassword']);
    $fullname   = addslashes($_POST['txtFullname']);
    $email      = addslashes($_POST['txtEmail']);
    $phone   = addslashes($_POST['txtPhone']);
    $address       = addslashes($_POST['txtAddress']);
    
    $result=pg_query($conn,"INSERT INTO public.user(user_name,password,full_name,email,phone,address) VALUES ('{$username}','{$password}','{$fullname}','{$email}','{$phone}','{$address}')");

    if ($result)
        echo "Quá trình đăng ký thành công. <a href='../test.php'>Về trang chủ</a>";
    else
        echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='../index.php'>Thử lại</a>";
?>