<?php
if (isset($_POST['search'])) {

    //Nhúng file kết nối với database
    include_once('./connect.php');

    //Lấy dữ liệu từ file 
    $search   = $_POST['txtSearch'];

    $result = pg_query($conn, "SELECT product_name,price,quantity,cate_id,image,description FROM public.product 
    WHERE product_name LIKE '%{$search}%'");

    if ($result) {
        echo "Search with keyword: $search";
    } else
        echo "Có lỗi xảy ra trong quá trình tìm kiếm. <a href='?page=add_category'>Again</a>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Category ID</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Description</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id = 1;
                while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $id ?></td>
                        <td><?php echo $row["product_name"]; ?></td>
                        <td><?php echo $row["price"]; ?></td>
                        <td><?php echo $row["quantity"]; ?></td>
                        <td><?php echo $row["cate_id"]; ?></td>
                        <td>
                            <img src="public/image/<?php echo $row["image"]; ?>" style="height: 100px; width: 100px;">
                        </td>
                        <td><?php echo $row["description"]; ?></td>
                        <td>
                            <button><a href="">Buy Now</a></button>
                        </td>
                    </tr>
                <?php $id++;
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>