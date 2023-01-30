<?php

session_start();
$db = mysqli_connect("localhost", "root", "", "imsv2");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($db, $query);
  if (mysqli_num_rows($result) == 1) {
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
  } else {
    echo "<script>alert('Invalid username or password')</script>";
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <title>Document</title>

</head>

<body style="background-color: #eee;">
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-light text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 text-dark text-uppercase">Login</h2>
                <p class="text-dark mb-5">Please enter your login and password!</p>


                <form action="adminlogin.php" method="post">
                  <div class="form-outline form-white mb-4">
                    <label class="form-label text-dark " for="typeEmailX">Username</label>
                    <input type="text" id="typeEmailX" name="username"
                      class="form-control form-control-lg border-dark" />
                  </div>

                  <div class="form-outline form-white mb-4">
                    <label class="form-label text-dark " for="typePasswordX">Password</label>
                    <input type="password" id="typePasswordX" name="password"
                      class="form-control form-control-lg border-dark" />
                  </div>


                  <div class="">
                    <input type="submit" class="btn btn-outline-primary btn-lg px-5  mt-3" name="login" value="Log In">
                  </div>


                </form>
              </div>

              <div>
                <p class="text-dark">Don't have an account? <a href="adminReg.php"
                    class="fw-bold text-decoration-none">Sign-Up</a>
                </p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
<?php
if (isset($error)) {
  echo '<p>' . $error . '</p>';
}
?>