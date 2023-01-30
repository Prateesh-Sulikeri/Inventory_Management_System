<?php
$db = mysqli_connect('localhost', 'root', '', 'imsv2');

if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $password_confirm = $_POST['password_confirm'];


  if ($password != $password_confirm) {
    $error = 'Passwords do not match';
  } else {
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
      $error = 'Username is already taken';
    } else {
      $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
      mysqli_query($db, $query);
      $message = 'Registration successful';
      header('Location: adminlogin.php');
    }
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
  <title>Register Now</title>
</head>

<body style="background-color: #eee">
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration bg-light" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
              <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-dark text-center">Registration Form</h3>
              
              <form action="adminReg.php" method="post">
                <div class="form-outline text-center">
                  <label class="form-label text-dark fw-bold py-2"  for="firstName "> Username</label>
                  <input type="text" id="firstName" name="username" class="form-control form-control-lg border-dark" />
                </div>
                <div class="form-outline text-center">
                  <label class="form-label text-dark fw-bold py-2" for="firstName "> Password</label>
                  <input type="password" id="firstName" name="password"  class="form-control form-control-lg border-dark" />
                </div>
                <div class="form-outline text-center">
                  <label class="form-label text-dark fw-bold py-2" for="firstName "> Confirm Password</label>
                  <input type="password" id="firstName"  name="password_confirm" class="form-control form-control-lg border-dark" />
                </div>
                
                <div class="text-center my-4">
                <p class="mb-0 text-dark">Already have an account? <a href="adminlogin.php" class="fw-bold text-decoration-none">Sign-In</a>
                </p>
              </div>

                <div class="mt-4 pt-2 text-center">
                <button type="submit" class="btn btn-outline-primary" name="register">Register</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>