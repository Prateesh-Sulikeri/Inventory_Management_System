<?php
include_once "config.php";
session_start();

$product_id = $_GET['product_id'];
$query = "SELECT name, price, image FROM products WHERE id = $product_id";
$result = mysqli_query($conn, $query);
$product = mysqli_fetch_assoc($result);

$name = $product['name'];
$price = $product['price'];
$image = $product['image'];


if (isset($_POST['place_order'])) {
    $username = $_POST['username'];
    $quantity = $_POST['quantity'];
    $address = $_POST['address'];


    $sql = "INSERT INTO orders (`name`, `username`, `quantity`, `address`,`price_per_piece`) VALUES ('$name',  '$username', '$quantity', '$address', '$price')";
    $result = mysqli_query($conn, $sql);
    echo "<script>alert('Order placed successfully!');</script>";
}

?>
<html>

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

<body style="background-color: #eee">
    <div class="container-fluid my-3 text-center border border-dark w-75" style="border-radius: 15px">

        <div class="product-info text-center my-4 ">
            <h2 class="my-3 fw-bold fs-1">
                <?php echo $name; ?>
            </h2>
            <hr>
            <img src="images\<?php echo $image ?>" alt="" class="w-25 ">
            <hr>
            <p class="my-4 fs-3 fw-bold"> Price: $<?php echo $price; ?> </p>
            <hr>

        </div>

        <form method="post" class="text-center">
            <div class="row">

                <div class="my-3 col-md-4">
                    <input type="text" name="username" placeholder="Username" class="form-control">

                </div>
                <div class="my-3 col-md-4">

                    <input type="number" name="quantity" placeholder="Quantity" class="form-control">
                </div>
                <div class="my-3 col-md-4">

                    <input type="text" name="address" placeholder="Address" class="form-control">
                </div>
            </div>
            <div class="my-3">

                <input class="btn btn-outline-primary mx-3" type="submit" name="place_order" value="Place Order">
                <a class="btn btn-outline-success mx-3" href="home.php">View More</a>
            </div>
        </form>

    </div>

</body>

</html>