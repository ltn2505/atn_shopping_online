<?php
// Nếu là sự kiện đăng ký thì xử lý
if (isset($_POST['addnew'])) {

    //Nhúng file kết nối với database
    include_once('./connect.php');

    //Lấy dữ liệu từ file 
    $storeid   = $_POST['txtId'];
    $storeaddress = $_POST['txtStoreAddress'];
    $phone      = $_POST['txtPhone'];

    $result = pg_query($conn, "INSERT INTO public.store(store_id,store_address,store_phone) VALUES ('{$storeid}','{$storeaddress}','{$phone}')");

    if ($result) {
        echo "Quá trình thêm mới thành công.";
        echo '<meta http-equiv="refresh" content="0;URL=?page=store"/>';
    } else
        echo "Có lỗi xảy ra trong quá trình thêm mới. <a href='?page=add_category'>Again</a>";
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
                <label for="exampleInput">Store ID</label>
                <input type="text" name="txtId" class="form-control" id="exampleInput" aria-describedby="" placeholder="CH1">
            </div>
            <div class="form-group">
                <label for="example">Store Address</label>
                <input type="text" name="txtStoreAddress" class="form-control" id="exampleInput" placeholder="Can Tho">
            </div>
            <div class="form-group">
                <label for="exampleInput">Store Phone</label>
                <input type="text" name="txtPhone" class="form-control" id="exampleInput" aria-describedby="emailHelp" placeholder="0980000...">
            </div>
            <button type="submit" name="addnew" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary" value="Submit">Reset</button>
        </form>
    </div>
</body>

</html>