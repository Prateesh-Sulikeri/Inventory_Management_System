<?php
// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'imsv2');

// Check if the registration form has been submitted
if (isset($_POST['register'])) {
  // Retrieve the form data
  $username = $_POST['username'];
  $password = $_POST['password'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $password_confirm = $_POST['confirm_password'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $email = $_POST['email'];

  // Validate the form data
  if ($password != $password_confirm) {
    $error = 'Passwords do not match';
  } else {
    // Check if the username is already taken
    $query = "SELECT * FROM customer WHERE name = '$username'";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
      $error = 'Username is already taken';
    } else {
      // Insert the new user into the database
      $query = "INSERT INTO customer (name, gender, age, email, phone, address,password) VALUES ('$username', '$gender' ,'$age', '$email', '$phone', '$address', '$password')";
      mysqli_query($db, $query);
      $message = 'Registration successful';
      header('Location: login.php');
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

  <title>Customer registration</title>

</head>

<body style="background-color: #eee;">

  <section>
    <div class="container my-3 h-100">
      <div class="row d-flex my-3 justify-content-center align-items-center h-100">
        <div class="col-lg-12 my-3 col-xl-11">
          <div class="card my-3 text-black" style="border-radius: 25px;">
            <div class="card-body my-3 p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-4">Sign up</p>
                  <p class="text-center  mx-1  mt-4">Aready a member? <a class="text-decoration-none"
                      href="login.php">Sign in</a></p>

                  <form class="mx-1 mx-md-4" method="post">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c"> Name</label>
                        <input type="text" name="username" id="form3Example1c" class="form-control" />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c"> Gender</label>
                        <input type="radio" name="gender" value="M" class="mx-2" id="">Male
                        <input type="radio" name="gender" value="F" class="mx-2" id="">Female
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c"> Phone</label>
                        <input type="number" name="phone" id="form3Example3c" class="form-control" />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c"> Address</label>
                        <input type="text" name="address" id="form3Example3c" class="form-control" />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c"> Email</label>
                        <input type="email" name="email" id="form3Example3c" class="form-control" />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c"> Age</label>
                        <input type="number" name="age" id="form3Example3c" class="form-control" />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c">Password</label>
                        <input type="password" name="password" id="form3Example4c" class="form-control" />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4cd">Confirm password</label>
                        <input type="password" name="confirm_password" id="form3Example4cd" class="form-control" />
                      </div>
                    </div>



                    
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">

                      <button type="submit" class="btn btn-primary" name="register">Register</button>
                    </div>

                  </form>

                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <img src="images\register.svg" class="img-fluid w-70" alt="Sample image">

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



<!-- 

<form action="register.php" method="post">
                  <div class="form-outline mb-4">
                    <input type="text" name="username" placeholder="Username">
                  </div>
                  <div class="form-outline mb-4">
                    <input type="password" name="password" placeholder="Password">
                  </div>
                  <div class="d-flex justify-content-center">
                    <input type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" value="Register">
                  </div>
                </form> -->