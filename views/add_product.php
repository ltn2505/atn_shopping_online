<?php
//link  category
$sql_category = "SELECT * FROM public.category";
$query_category = pg_query($conn, $sql_category);

// lấy dữ liệu
if (isset($_POST['btnAdd'])) {

    //Nhúng file kết nối với database
    include_once('./connect.php');

    $proid   = $_POST['txtID'];
    $proname = $_POST['txtName'];
    $price      = $_POST['txtPrice'];
    $oldprice     = $_POST['txtOldPrice'];
    $quantity      = $_POST['txtQty'];
    $procate      = $_POST['cate_id'];
    $proimage      = $_FILES['Image'];
    $description      = $_POST['txtShort'];

    copy($proimage['tmp_name'], "public/image/" . $proimage['name']);
    $filePic = $proimage['name'];
    $result = pg_query($conn, "INSERT INTO public.product(product_id,product_name,price,old_price,quantity,cate_id,image,description,product_date)
    VALUES('{$proid}','{$proname}',{$price},{$oldprice},{$quantity},'{$procate}','{$filePic}','{$description}','" . date('Y-m-d H:i:s') . "')");

    if ($result) {
        echo "Quá trình thêm mới thành công.";
        echo '<meta http-equiv="refresh" content="0;URL=?page=product"/>';
    } else
        echo "Có lỗi xảy ra trong quá trình thêm mới. <a href='?page=add_product'>Again</a>";
}
?>

<div class="container">
    <h2>Add new Product</h2>

    <form id="frmProduct" name="frmProduct" method="POST" enctype="multipart/form-data" action="" class="form-horizontal" role="form">
        <div class="form-group">
            <label for="txtTen" class="col-sm-2 control-label">Product ID(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Product ID" value='' />
            </div>
        </div>
        <div class="form-group">
            <label for="txtTen" class="col-sm-2 control-label">Product Name(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Product Name" value='' />
            </div>
        </div>

        <div class="form-group">
            <label for="lblGia" class="col-sm-2 control-label">Price(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtPrice" id="txtPrice" class="form-control" placeholder="Price" value='' />
            </div>
        </div>

        <div class="form-group">
            <label for="lblGia" class="col-sm-2 control-label">Old Price(*): </label>
            <div class="col-sm-10">
                <input type="text" name="txtOldPrice" id="txtOldPrice" class="form-control" placeholder="Price" value='' />
            </div>
        </div>

        <div class="form-group">
            <label for="lblSoLuong" class="col-sm-2 control-label">Quantity(*): </label>
            <div class="col-sm-10">
                <input type="number" name="txtQty" id="txtQty" class="form-control" placeholder="Quantity" value="" />
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Product category(*): </label>
            <div class="col-sm-10">
                <select class="form-control" name="cate_id">
                    <?php
                    while ($row_category = pg_fetch_assoc($query_category)) { ?>
                        <option value="<?php echo $row_category['cate_id']; ?>"> <?php echo $row_category['cate_name'] ?></option>}
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
                <input type="text" name="txtShort" id="txtShort" class="form-control" placeholder="Short description" value='' />
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary" name="btnAdd" id="btnAdd" value="Add new" />
                <input type="button" class="btn btn-primary" name="btnIgnore" id="btnIgnore" value="Ignore" onclick="window.location='product.php'" />

            </div>
        </div>
    </form>
</div>