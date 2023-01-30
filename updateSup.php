<?php
    // Get the employee id from the URL
    $id = $_GET['id'];

    // Connect to the database
include_once "config.php";

    // Check for form submission
    if(isset($_POST['submit'])) {
        // Get the updated information from the form
        $sup_name = $_POST['sup_name'];
        $prod_name = $_POST['prod_name'];
        $type = $_POST['type'];
        $price = $_POST['price'];
        $email = $_POST['email'];
        $quantity = $_POST['quantity'];

        // Update the employee information in the database
        $query = "UPDATE suppliers SET sup_name='$sup_name', prod_name='$prod_name', type ='$type', price='$price', email='$email', quantity='$quantity' WHERE id='$id'";
        mysqli_query($conn, $query);

        // Redirect to the EmpView.php page
        header('Location: SupView.php');
    }

    // Get the current employee information from the database
    $query = "SELECT * FROM suppliers WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $employee = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IMS Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.1.2/chart.min.js"
        integrity="sha512-fYE9wAJg2PYbpJPxyGcuzDSiMuWJiw58rKa9MWQICkAqEO+xeJ5hg5qPihF8kqa7tbgJxsmgY0Yp51+IMrSEVg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css\add.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="">
                    <i class="fas fa-dolly"></i>
                </div>
                <div class="sidebar-brand-text mx-2">I M S</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                options
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Employees</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Employee Options:</h6>
                        <a class="collapse-item" href="EmpAdd.php">Add</a>
                        <a class="collapse-item" href="EmpView.php">View</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-desktop"></i>
                    <span>Product</span>
                </a>
                <div id="collapseProducts" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Product Options:</h6>
                        <a class="collapse-item" href="ProdAdd.php">Add</a>
                        <a class="collapse-item" href="ProdView.php">View</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSources"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-handshake"></i>
                    <span>Suppliers</span>
                </a>
                <div id="collapseSources" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Supplier Options:</h6>
                        <a class="collapse-item" href="SupAdd.php">Add</a>
                        <a class="collapse-item" href="SupView.php">View</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="Orders.php">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Orders</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="customerInfo.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Customer Info</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="analytics.php">
                    <i class="fas fa-chart-column"></i>
                    <span>Analytics</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid my-4">

                    <section class="box">
                        <header class="mb-3 font-weight-bold">Edit Supplier Details</header>
                        <hr>
                        <form action="#" class="form" method="POST">
                            <div class="column">
                                
                                <div class="input-box">
                                    <label>Supplier Name</label>
                                    <input type="text" name="sup_name" placeholder="Enter Supplier Name" required />
                                </div>
                            </div>

                            <div class="column">

                                <div class="input-box">
                                    <label>Product Name</label>
                                    <input type="text" name="prod_name" placeholder="Enter Product Name" required />
                                </div>

                                <div class="input-box">
                                    <label>Product Type</label>
                                    <input type="text" name="type" placeholder="Enter Product Type" required />
                                </div>

                            </div>

                            <div class="column">
                                <div class="input-box">
                                    <label>Purchase Price</label>
                                    <input type="number" name="price" placeholder="Enter Purchase Price" required />
                                </div>
                                <div class="input-box">
                                    <label>Email</label>
                                    <input type="email" name="email" placeholder="Enter Email" required />
                                </div>
                            </div>
                            <div class="column">
                                
                                
                                <div class="input-box">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" placeholder="Enter Quantity" required />
                                </div>
                            </div>
                        
                            <input type="submit" class="btn btn-primary text-center my-3" name="submit" value="submit">
                        </form>
                    </section>


                    <!-- Content Row -->


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Inventory Management System &copy; 2022-23</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>