

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Landing Page - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
</head>
<style>
    .nav {
        display: flex;
        flex-wrap: wrap;
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;

        padding: 4px;
    }
</style>

<body>
    <?php
    session_start();
    ?>
    <!-- Navigation-->
    <nav class="nav bg-light" style="background-color: #294061 !important;">
        <div class="container">
            <div class="row">
                <div class="container col-lg-2">
                    <a class="navbar-brand" href="index.php"><b style="color: white;">Login</b></a>

                </div>

                <div class="container col-lg-6"> 
               

                </div>
                <?php
                
                // echo $_SESSION["id"];
                if (isset($_SESSION["user_name"])) {
                ?>
                 <div class="container col-lg-3">
                 <!-- <a class="navbar-brand" style="color: white;">User-<?php // echo $_SESSION["user_name"]; ?></a> -->
                 <a class="navbar-brand" style="color: white;" href="home.php">Home</a>
                <a class="navbar-brand" style="color: white;" href="productlist.php">Product</a>
                 <a class="btn btn-danger" href="logout.php">Logout</a>
                    
                </div>
                <?php
                }else{ ?>
                <div class="container col-lg-2">
                    <a class="btn btn-success" href="login.php">Login</a>
                    <a class="btn btn-primary" href="registration.php">Sign Up</a>
                </div>
                <?php
                }
                ?>
            </div>
        </div>


    </nav>

</body>

</html>
<!-- Masthead-->