<?php
//Xử lý đăng nhập
if (isset($_POST['dangnhap'])) {
    //Kết nối tới database
    include_once('connect.php');

    //Lấy dữ liệu nhập vào
    $username = addslashes($_POST['txtUserName']);
    $password = addslashes($_POST['txtPassword']);

    //Kiểm tra tên đăng nhập có tồn tại không
    $result = pg_query($conn, "SELECT user_name, password,state FROM public.user WHERE user_name='{$username}'");
    if (pg_num_rows($result) == 0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }
    //Lấy mật khẩu trong database ra
    $row = pg_fetch_array($result);

    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['password']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    if (pg_num_rows($result) == 1) {
        $_SESSION["user_name"] = $username;
        $_SESSION["admin"] = $row['state'];
        echo "thanh cong";
        echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
    } else {
        echo "You loged in fail!";
        echo '<meta http-equiv="refresh" content="0;URL=?page=login"/>';
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <div class="form-group">
                <label for="exampleInput">User name</label>
                <input type="text" name="txtUserName" class="form-control" id="exampleInput" aria-describedby="" placeholder="User Name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="txtPassword" class="form-control" id="exampleInputPassword" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary" name="dangnhap" value="Submit">Submit</button>

        </form>
    </div>
</body>

</html>