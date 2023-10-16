<?php 

include "../includes/connection.php";



?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NivModernize</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.php" class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="../assets/images/logos/dark-logo.svg" width="180" alt="">
                </a>
                <p class="text-center">Your Social Campaigns</p>
                <form class ="form"  method="post" action="" >
                  <div class="mb-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name"
                     aria-describedby="textHelp" name="name">
                  </div>
                  <div class="mb-2">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" 
                    aria-describedby="emailHelp" name="email">
                  </div>
                  <div class="mb-2">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control"
                    name="password" id="password">
                  </div>
                  <div class="mb-2">
                    <label for="cpassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control"
                    name="cpassword" id="cpassword">
                  </div>
                  <div class="mb-2">
                    <label for="mobile" class="form-label">Phone Number</label>
                    <input type="text" class="form-control"
                    name="mobile" id="mobile">
                  </div>
                  <input type="submit" name="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2"
                   value="Sign Up" />
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                    <a class="text-primary fw-bold ms-2" href="./userlogin.php">Sign In</a>
                    <a class="text-primary fw-bold ms-2" href="./login.php">If You Are Admin User?</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
if (isset($_POST['submit'])) {
    
    
  $first_name = $_POST['name'];
  $email1 = $_POST['email'];
  $password1 = $_POST['password'];
  $cpassword1 = $_POST['cpassword'];
  $mobile1 = $_POST['mobile'];
//   function validate($data){

//     $data = trim($data);

//     $data = stripslashes($data);

//     $data = htmlspecialchars($data);

//     return $data;

//  }  
  
//   if (empty($first_name) && empty($email) && empty($password) && empty($cpassword) && empty($mobile)) {

//       header("Location: register.php?error=All fields are required");

//       exit();

//   }
  
  
// else    
// {
  $sql = "INSERT into formvalidation (name, email, password, cpassword, mobile)
  VALUES ('$first_name','$email1','$password1','$cpassword1','$mobile1')";

//   $result = mysqli_query($conn, $sql);

  if (mysqli_query($conn, $sql)) {

    echo "New record created successfully.";
    header("Location: userlogin.php");
  }else{

    echo "Error:". $sql . "<br>". $conn->error;

  } 

  mysqli_close($conn);

}

?>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>