<?php

session_start();
$db = mysqli_connect("localhost","root","","imsv2");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM customer WHERE name = '$username' AND password = '$password'";
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: home.php");
    } else {
        echo "<script>alert('Invalid username or password')</script>";
    }

    $_SESSION['id'] = $user_id;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <title>Customer Login</title>

</head>

<body style="background-color: #eee;">
  
<section >
  <div class="container my-3 h-100">
    <div class="row d-flex my-3 justify-content-center align-items-center h-100">
      <div class="col-lg-12 my-3 col-xl-11">
        <div class="card my-3 text-black" style="border-radius: 25px;">
          <div class="card-body my-3 p-md-5">
            <div class="row justify-content-center">


            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center ">

                <img src="images\log.svg"
                  class="img-fluid w-70" alt="Sample image">

              </div>
            
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4">Sign in</p>

                <form class="mx-1 mx-md-4" method="post">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example1c"> Username</label>
                      <input type="text"  name="username" id="form3Example1c" class="form-control" />
                    </div>
                  </div>

                  
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="form3Example4c">Password</label>
                      <input type="password" name="password" id="form3Example4c" class="form-control" />
                    </div>
                  </div>

           

                 
                  
                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                  </div>
                  <p class="text-center  mx-1  mt-4">Not a member? <a class="text-decoration-none" href="index.php">Sign up</a></p>

                </form>

              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>

</html>