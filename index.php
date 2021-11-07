<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
        } elseif ($page == "test") {
            include_once("test.php");
        }
    } else {
        include_once("views/home.php");
    }
    ?>

    <?php
    include_once("views/footer.php")
    ?>

</body>

</html>