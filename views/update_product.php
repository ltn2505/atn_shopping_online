<?php
//Get id
$id = $_GET['id'];

//link  category
$sql_category = "SELECT * FROM public.category";
$query_category = pg_query($conn, $sql_category);

$result = pg_query($conn, "SELECT* FROM public.product WHERE product_id='{$id}'");
$row = pg_fetch_assoc($result);

// lấy dữ liệu
if (isset($_POST['update'])) {

    //Nhúng file kết nối với database
    include_once('./connect.php');

    $proid   = $_POST['txtID'];
    $proname = $_POST['txtName'];
    $price      = $_POST['txtPrice'];
    $oldprice     = $_POST['txtOldPrice'];
    $quantity      = $_POST['txtQty'];
    $procate      = $_POST['cate_id'];
    $description      = $_POST['txtShort'];
    $proimage      = $_FILES['Image'];

    if ($_FILES['Image'] == '') {
        $result = pg_query($conn, "UPDATE public.product 
        SET product_name='{$proname}',price={$price},old_price={$oldprice},quantity={$quantity},cate_id='{$procate}',description='{$description}',product_date='" . date('Y-m-d H:i:s') . "'
        WHERE product_id='$id'");
        if ($result) {
            echo "Quá trình cập nhật thành công.";
            echo '<meta http-equiv="refresh" content="0;URL=?page=product"/>';
        } else
            echo "Có lỗi xảy ra trong quá trình cập nhật. <a href='?page=product'>Again</a>";
    } else {
        copy($proimage['tmp_name'], "public/image/" . $proimage['name']);
        $filePic = $proimage['name'];
        $result = pg_query($conn, "UPDATE public.product 
        SET product_name='{$proname}',price={$price},old_price={$oldprice},quantity={$quantity},cate_id='{$procate}',image='{$filePic}',description='{$description}',product_date='" . date('Y-m-d H:i:s') . "'
        WHERE product_id='$id'");
        if ($result) {
            echo "Quá trình cập nhật thành công.";
            echo '<meta http-equiv="refresh" content="0;URL=?page=product"/>';
        } else
            echo "Có lỗi xảy ra trong quá trình cập nhật. <a href='?page=product'>Again</a>";
    }
}
?>

<div class="container">
    <h2>Update Product</h2>

    <form id="frmProduct" name="frmProduct" method="POST" enctype="multipart/form-data" action="" class="form-horizontal" role="form">
        <div class="form-group">
            <label for="txtTen" class="col-sm-2 control-label">Product ID(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Product ID" value='<?php echo $row['product_id'] ?>' readonly />
            </div>
        </div>
        <div class="form-group">
            <label for="txtTen" class="col-sm-2 control-label">Product Name(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Product Name" value='<?php echo $row['product_name'] ?>' />
            </div>
        </div>

        <div class="form-group">
            <label for="lblGia" class="col-sm-2 control-label">Price(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="Price" value='<?php echo $row['price'] ?>' />
            </div>
        </div>

        <div class="form-group">
            <label for="lblGia" class="col-sm-2 control-label">Old Price(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtOldPrice" id="txtOldPrice" class="form-control" placeholder="Price" value='<?php echo $row['old_price'] ?>' />
            </div>
        </div>

        <div class="form-group">
            <label for="lblSoLuong" class="col-sm-2 control-label">Quantity(*): </label>
            <div class="col-sm-10">
                <input type="number" name="txtQty" id="txtQty" class="form-control" placeholder="Quantity" value="<?php echo $row['quantity'] ?>" />
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Product category(*): </label>
            <div class="col-sm-10">
                <select class="form-control" name="cate_id">
                    <?php
                    while ($row_category = pg_fetch_assoc($query_category)) { ?>
                        <option value="<?php echo $row_category['cate_id']; ?>"><?php echo $row_category['cate_name'] ?></option>}
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="sphinhanh" class="col-sm-2 control-label">Image(*): </label>
            <div class="col-sm-10">
                <input type="file" name="Image" id="txtImage" class="form-control" value="" />
            </div>
        </div>

        <div class="form-group">
            <label for="lblShort" class="col-sm-2 control-label">Short description(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtShort" id="txtShort" class="form-control" placeholder="Short description" value='<?php echo $row['description'] ?>' />
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary" name="update" id="btnAdd" value="Update" />
                <input type="button" class="btn btn-primary" name="btnIgnore" id="btnIgnore" value="Ignore" onclick="window.location='product.php'" />

            </div>
        </div>
    </form>
</div>