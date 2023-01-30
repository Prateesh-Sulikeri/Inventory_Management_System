<?php
include_once "config.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
$user_id = $_SESSION['id'];
$customer = "SELECT id FROM customer where id = $user_id";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Shop Homepage</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/home.css" rel="stylesheet" />
</head>

<body>



    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: rgb(11, 128, 246);">
        <div class="container-fluid">
            <a class="navbar-brand text-white px-5 mx-5" href="home.php">I.M.S</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item text-white px-3">
                        <a class="nav-link active text-decoration-none text-white" aria-current="page" href="home.php">
                            <i class="fas fa-home mx-2"></i> Home</a>
                    </li>
                    <li class="nav-item dropdown px-3">
                        <a class="nav-link dropdown-toggle text-decoration-none text-white" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-tags mx-2"></i>
                            Categories
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Clothing</a></li>
                            <li><a class="dropdown-item" href="#">Electronics</a></li>
                            <li><a class="dropdown-item" href="#">Grocery</a></li>
                            <li><a class="dropdown-item" href="#">Life style</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown px-3">
                        <a class="nav-link dropdown-toggle text-decoration-none text-white" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-circle-user mx-2"></i>
                            <?php echo $_SESSION['username']; ?>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="logout.php"> <i class="fa-solid fa-arrow-right-from-bracket mx-2"></i> Logout</a>
                            </li>

                        </ul>
                    </li>



                </ul>
            </div>
        </div>
    </nav>

    <!-- Header-->

    <header class="py-5" style="background-color: rgb(11, 128, 246);">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
                <p class="lead fw-normal text-white-50 mb-0">Just do it</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        ?>

                        <div class="col mb-5">
                            <div class="card h-100">
                                <img class="card-img-top" src="images\<?php echo $row['image']; ?>" alt="..." />
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <h5 class="fw-bolder pb-2">
                                            <?php echo $row['name']; ?>
                                        </h5>
                                        <p>$<?php echo $row['price']; ?></p>
                                    </div>
                                </div>
                                <div class="card-footer pb-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a href="checkout.php?product_id=<?php echo $row['id']; ?>" class="btn btn-outline-primary">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                }
                ?>


            </div>
    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Inventory Management System &copy; 2022-23</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>