<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <header id="head">
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary menu">
            <a class="navbar-brand" href="index.php">ATN</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>

                    <?php
                    if (isset($_SESSION['user_name']) && $_SESSION['admin'] == 1) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=user">User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=category">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=store">Store</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=product">Product</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=pronew">Product New</a>
                        </li>
                    <?php
                    }
                    ?>


                    <form class="form-inline" action="?page=search" method="POST">
                        <input style="width:400px" class="form-control mr-sm-2" type="text" name="txtSearch" placeholder="Search">
                        <button class="btn btn-success search" type="submit" name="search" style=" background-color: #e97a3a; border-color: #ffffff;">Search</button>
                    </form>
                </ul>
                <!-- Right -->
                <ul class="navbar-nav ml-auto">
                    <?php
                    if (isset($_SESSION['user_name']) && $_SESSION['user_name'] != "") {
                    ?>

                        <li class="nav-item">
                            <a class="nav-link" href="views/resigter.php">Hi! <?php echo $_SESSION['user_name'] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=logout">Logout</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=resigter">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=login">Login</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>
    </header>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>