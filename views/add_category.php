<?php
// Nếu là sự kiện đăng ký thì xử lý
if (isset($_POST['addnew'])) {

    //Nhúng file kết nối với database
    include_once('./connect.php');

    //Lấy dữ liệu từ file 
    $cateid   = $_POST['txtCateid'];
    $catename = $_POST['txtCatename'];
    $des      = $_POST['txtDes'];

    $result = pg_query($conn, "INSERT INTO public.category(cate_id,cate_name,description) VALUES ('{$cateid}','{$catename}','{$des}')");

    if ($result) {
        echo "Quá trình thêm mới thành công.";
        echo '<meta http-equiv="refresh" content="0;URL=?page=category"/>';
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
                <label for="exampleInput">Category ID</label>
                <input type="text" name="txtCateid" class="form-control" id="exampleInput" aria-describedby="" placeholder="xe123">
            </div>
            <div class="form-group">
                <label for="example">Category Name</label>
                <input type="text" name="txtCatename" class="form-control" id="exampleInput" placeholder="Thanh Nhan company">
            </div>
            <div class="form-group">
                <label for="exampleInput">Description</label>
                <input type="text" name="txtDes" class="form-control" id="exampleInput" aria-describedby="emailHelp" placeholder="Number phone, address,v.v..">
            </div>
            <button type="submit" name="addnew" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-primary" value="Submit">Reset</button>
        </form>
    </div>
</body>

</html>