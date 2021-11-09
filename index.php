<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATN-SHOP</title>
    <link rel="shortcut icon" href="./public/image/logoATN.png" />
</head>

<body>
    <?php
    include_once("connect.php");
    //Khai báo sử dụng session
    session_start();
    include_once("views/header.php")
    ?>

    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page == "resigter") {
            include_once("views/resigter.php");
        } elseif ($page == "login") {
            include_once("views/login.php");
        } elseif ($page == "logout") {
            include_once("views/logout.php");
        } elseif ($page == "user") {
            include_once("views/user.php");
        } elseif ($page == "category") {
            include_once("views/category.php");
        } elseif ($page == "add_category") {
            include_once("views/add_category.php");
        } elseif ($page == "store") {
            include_once("views/store.php");
        } elseif ($page == "add_store") {
            include_once("views/add_store.php");
        } elseif ($page == "product") {
            include_once("views/product.php");
        } elseif ($page == "add_product") {
            include_once("views/add_product.php");
        } elseif ($page == "search") {
            include_once("views/search.php");
        } elseif ($page == "pronew") {
            include_once("views/viewproduct.php");
        }
    } else {
        include_once("views/home.php");
    }
    include_once("views/footer.php");
    ?>


</body>

</html>