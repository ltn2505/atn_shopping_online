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
                    <th scope="col"><a href="?page=add_product">Addnew Category</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id = 1;
                $result = pg_query($conn, "Select product_id, product_name, price, old_price, quantity, cate_id, image, description from product");
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
                        <td><?php echo $row["image"]; ?>
                            <img src="public/image/<?php echo $row["image"]; ?>" style="height: 100px; width: 100px;">
                        </td>
                        <td><?php echo $row["description"]; ?></td>
                        <td>
                            <button><a href="">Edit</a></button>
                            <button><a onClick="return confirm ('Are you sure delete')" a href="">Delete</a></button>
                        </td>
                    </tr>
                <?php $id++;
                } ?>
            </tbody>
        </table>
    </div>
</body>

</html>