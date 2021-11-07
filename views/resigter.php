<?php

// Nếu là sự kiện đăng ký thì xử lý
if (isset($_POST['dangky'])) {

    //Nhúng file kết nối với database
    include_once('./connect.php');


    //Lấy dữ liệu từ file dangky.php
    $username   = addslashes($_POST['txtUsername']);
    $password   = addslashes($_POST['txtPassword']);
    $fullname   = addslashes($_POST['txtFullname']);
    $email      = addslashes($_POST['txtEmail']);
    $phone   = addslashes($_POST['txtPhone']);
    $address       = addslashes($_POST['txtAddress']);

    $result = pg_query($conn, "INSERT INTO public.user(user_name,password,full_name,email,phone,address,state) VALUES ('{$username}','{$password}','{$fullname}','{$email}','{$phone}','{$address}',0)");

    if ($result) {
        echo "Quá trình đăng ký thành công.";
        echo '<meta http-equiv="refresh" content="0;URL=?page=login"/>';
    } else
        echo "Có lỗi xảy ra trong quá trình đăng ký. <a href='index.php'>Thử lại</a>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">User name</label>
                <input type="text" name="txtUsername" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nhan123">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword">Password</label>
                <input type="password" name="txtPassword" class="form-control" id="exampleInputPassword1" placeholder="12345678">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Full Name</label>
                <input type="text" name="txtFullname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Le Thanh Nhan">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="txtEmail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nhan@gmail.com">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Number Phone</label>
                <input type="text" name="txtPhone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0123456789">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" name="txtAddress" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ca Mau">
            </div>
            <button type="submit" name="dangky" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary" value="Submit">Reset</button>
        </form>
    </div>
</body>

</html>