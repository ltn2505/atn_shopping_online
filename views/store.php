<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <div class="container">
        <h1>Store Manage</h1>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Store ID</th>
                    <th scope="col">Store Address</th>
                    <th scope="col">Store Phone</th>
                    <th scope="col"><a href="?page=add_store">Addnew Category</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id = 1;
                $result = pg_query($conn, "SELECT * FROM public.store");
                while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $row["store_id"]; ?></td>
                        <td><?php echo $row["store_address"]; ?></td>
                        <td><?php echo $row["store_phone"]; ?></td>
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