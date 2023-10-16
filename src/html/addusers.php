<?php ob_start();
      session_start();
      include '../includes/sidebar.php';  
      include '../includes/header.php';
      include '../includes/connection.php'; 
      
 
      
?>
      
        <div class="container-fluid">
        <div class="card">
                <div class="card-body">
                  <h5 class="card-title fw-semibold mb-4">Add New Users</h5>
              <div class="card">
                <div class="card-body">
                  <form action="addusers.php" method="POST">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">User Name</label>
                      <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">User Firstname</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="userfirstname"> 
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">User Lastname</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="userlastname">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">User Email</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="useremail">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">User Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" name="userpassword">
                    </div>
                    
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">User Image</label>
                      <input type="file" class="form-control" id="exampleInputPassword1" name="userimage">
                    </div>
                    
                    <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
                  </form>
                  <?php 
                  
                  if(isset($_POST['submit'])){
                    
                    if($_FILES["userimage"]["error"]===4)
                    {
                      echo "<script> alert('Image does not exist); </script>";
                    }              
                    else{
                      $fileName = $_FILES["userimage"]["name"];
                      $fileSize = $_FILES["userimage"]["size"];
                      $tmpName = $_FILES["userimage"]["tmp_name"];
                      $folder = "images/".$fileName;
                      // $validImageExtension = ['jpg', 'jpeg', 'png'];
                      // $imageExtension = explode('.', $fileName);
                      // $imageExtension = strtolower(end($imageExtension));
                      // if(!in_array($imageExtension, $validImageExtension))
                      // {
                      //   echo "<script>alert('Invalid Image Extension');</script>";
                      // }
                      // elseif($fileSize>1000000){
                      //   echo "<script>alert('Image size is too large');</script>";
                      // }
                      // else{
                        // $newImageName = uniqid();
                        // $newImageName.='.'.$imageExtension;
                        move_uploaded_file($tmpName, $folder);
                      // }
                    }
                    $uname = $_POST['username'];
                    $ufirstname = $_POST['userfirstname'];
                    $ulastname = $_POST['userlastname'];
                    $uemail = $_POST['useremail'];
                    $upassword = $_POST['userpassword'];
                    $uimage = $_POST['userimage'];

                    

                    if(empty($uname)){
                      echo "This field is required";
                    }
                    else{
                    $sql = "INSERT INTO users (username,user_firstname,user_lastname,user_email,user_password,user_image)
                            VALUES ('$uname','$ufirstname','$ulastname','$uemail','$upassword','$uimage')";
 
                        if(mysqli_query($conn, $sql)){
                          echo "New record has been added successfully !";
                          header('Location: viewusers.php');

                              }
                          else{
                              echo "ERROR: Hush! Sorry $sql. "
                                  . mysqli_error($conn);
                              }
                          
                          // Close connection
                          mysqli_close($conn);
                  }
                }
                  ?>
                </div>
              </div>
              </div>
              </div>
              </div>
              <?php include '../includes/footer.php'; ?>