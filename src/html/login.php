<?php
session_start();
include '../includes/connection.php';

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
                <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                <img src="../assets/images/logos/favicon.png" width="40" alt="" />
                <span class="hide-menu fs-5">NivModernize</span>
                </a>
                <p class="text-center">Your Social Campaigns</p>
                <form class ="form" method="post" action="login.php">
                  <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="email" class="form-control" id="name" placeholder="Enter Name"
                     name="email" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" 
                    name="password" >
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label>
                    </div>
                    <a class="text-primary fw-bold" href="#">Forgot Password ?</a>
                  </div>
                  <input type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2"
                   value="Sign In" />
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">New to Modernize?</p>
                    <a class="text-primary fw-bold ms-2" href="./register.php">Create an Account.</a>
                    <a class="text-primary fw-bold ms-2" href="./userlogin.php">If Your Are Subscriber?</a>
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
function validate($data){

    $data = trim($data);

    $data = stripslashes($data);

    $data = htmlspecialchars($data);

    return $data;

 }
if (isset($_POST['email']) && isset($_POST['password'])) {

    

    $uname = validate($_POST['email']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

        header("Location: login.php?error=User Name is required");

        exit();

    }
    else if(empty($pass)){

        header("Location: login.php?error=Password is required");

        exit();

    } 

if(isset($_POST['submit'])){

}
$email=$_POST['email'];
$password=$_POST['password'];

  $sql = "SELECT * FROM users WHERE user_email='$email'";

        $result = mysqli_query($conn, $sql);

            While($row = mysqli_fetch_assoc($result)){
              $db_name =$row['username'];
              $db_email =$row['user_email'];
              $db_password =$row['user_password'];
              $db_role =$row['user_role'];
            }

            if ($email !== $db_email  || $password !== $db_password ) {

              echo "Email or Password is not Correct!";
                // $_SESSION['user_name'] = $row['email'];

                // $_SESSION['name'] = $row['name'];

                // $_SESSION['id'] = $row['id'];



            }else if($email == $db_email  && $password == $db_password ){

              header("Location: index.php");
              $_SESSION['name'] = $db_name;
              $_SESSION['role'] = $db_role;

                exit();

            }
            else {
              echo 'Incorrect Password!';
            }

        }



?>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>