<?php
include_once("connect.php");

if (isset($_GET["function"]) == "del") {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $result = pg_query("select image from public.product where product_id='$id'");
        $image = pg_fetch_array($result);
        $del = $image["image"];
        unlink("public/image/$del");
        pg_query($conn, "delete from product where product_id='$id'");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <div class="container">
        <h1>Product Manage</h1>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Product ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Old Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Category ID</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Product Added Date</th>
                    <th scope="col">Product of Store</th>
                    <th scope="col"><a href="?page=add_product">Addnew Product</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id = 1;
                $result = pg_query($conn, "Select * from product");
                while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $id ?></td>
                        <td><?php echo $row["product_id"]; ?></td>
                        <td><?php echo $row["product_name"]; ?></td>
                        <td><?php echo $row["price"]; ?></td>
                        <td><?php echo $row["old_price"]; ?></td>
                        <td><?php echo $row["quantity"]; ?></td>
                        <td><?php echo $row["cate_id"]; ?></td>
                        <td>
                            <img src="public/image/<?php echo $row["image"]; ?>" style="height: 100px; width: 100px;">
                        </td>
                        <td><?php echo $row["description"]; ?></td>
                        <td><?php echo $row["product_date"]; ?></td>
                        <td><?php echo $row["store_id"]; ?></td>
                        <td>
                            <button><a href="?page=update_product&&id=<?php echo $row["product_id"]; ?>">Edit</a></button>
                            <button><a href="?page=product&&function=del&&id=<?php echo $row["product_id"]; ?>" onClick="return confirm ('Are you sure delete')">Delete</a></button>
                        </td>
                    </tr>
                <?php $id++;
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>