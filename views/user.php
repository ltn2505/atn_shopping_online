<?php
if (!isset($_SESSION['admin']) or $_SESSION['admin'] == 0) {
    echo '<script>alert("You are not administrator");</script>';
    echo '<meta http-equiv="Refresh" content="0;URL=index.php"/>';
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <?php
    include_once("connect.php");

    if (isset($_GET["function"]) == "del") {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            pg_query($conn, "delete from public.user where user_name='$id'");
        }
    }
    ?>

    <body>
        <div class="container">
            <h1>User Manage</h1>
            <table class="table table-striped table-hover">
                <tr>
                    <th><strong>No.</strong></th>
                    <th><strong>User Name</strong></th>
                    <th><strong>Password</strong></th>
                    <th><strong>Full Name</strong></th>
                    <th><strong>Email</strong></th>
                    <th><strong>Phone</strong></th>
                    <th><strong>Address</strong></th>
                    <th><strong></strong></th>
                </tr>
                <tbody>
                    <?php
                    $id = 1;
                    $result = pg_query($conn, "SELECT * FROM public.user");
                    while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
                    ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $row["user_name"]; ?></td>
                            <td><?php echo $row["password"]; ?></td>
                            <td><?php echo $row["full_name"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["phone"]; ?></td>
                            <td><?php echo $row["address"]; ?></td>
                            <td>
                                <button><a href="">Edit</a></button>
                                <button><a href="?page=user&&function=del&&id=<?php echo $row["user_name"]; ?>" onClick="return confirm ('Are you sure delete')">Delete</a></button>
                            </td>
                        </tr>
                    <?php $id++;
                    } ?>
                </tbody>
            </table>
        </div>
    </body>

    </html>
<?php
}
?>