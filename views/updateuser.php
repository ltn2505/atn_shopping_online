<?php
// hiển thị thông tin user

$us = $_SESSION["user_name"];
$result = pg_query($conn, "SELECT password,full_name,email,phone,address FROM public.user WHERE user_name='{$us}'");
$row = pg_fetch_assoc($result);
$pass = $row["password"];
$full_name = $row["full_name"];
$em = $row["email"];
$telephone = $row["phone"];
$addr = $row["address"];

// Nếu là sự kiện update thì xử lý
if (isset($_POST['update'])) {
    //Lấy dữ liệu từ file 
    $password  = $_POST['txtPassword'];
    $fullname   = $_POST['txtFullname'];
    $email      = $_POST['txtEmail'];
    $phone   = $_POST['txtPhone'];
    $address       = $_POST['txtAddress'];
    //update data
    $result = pg_query($conn, "UPDATE public.user SET password='{$password}',full_name='{$fullname}',email='{$email}',phone='{$phone}',address='{$address}' 
    WHERE user_name='" . $_SESSION["user_name"] . "'");
    if ($result) {
        echo "Quá trình cập nhật thành công.";
        echo '<meta http-equiv="refresh" content="0;URL=?page=updateuser"/>';
    } else
        echo "Có lỗi xảy ra trong quá trình cập nhật. <a href='index.php'>Thử lại</a>";
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
        <h1>Update Profile</h1>
        <form action="" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">User name</label>
                <input type="text" name="txtUsername" value="<?php echo $us ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nhan123" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword">Password</label>
                <input type="text" name="txtPassword" value="<?php echo $pass ?>" class="form-control" id="exampleInputPassword1" placeholder="12345678">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Full Name</label>
                <input type="text" name="txtFullname" value="<?php echo $full_name ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Le Thanh Nhan">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="txtEmail" value="<?php echo $em ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nhan@gmail.com">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Number Phone</label>
                <input type="text" name="txtPhone" value="<?php echo $telephone ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0123456789">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" name="txtAddress" value="<?php echo $addr ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ca Mau">
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-primary" value="Submit">Reset</button>
        </form>
    </div>
</body>

</html>