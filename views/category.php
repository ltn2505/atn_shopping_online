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
        <h1>Category Manage</h1>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Category ID</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Description</th>
                    <th scope="col"><a href="?page=add_category">Addnew Category</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id = 1;
                $result = pg_query($conn, "SELECT * FROM public.category");
                while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $id ?></td>
                        <td><?php echo $row["cate_id"]; ?></td>
                        <td><?php echo $row["cate_name"]; ?></td>
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