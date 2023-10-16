<?php  include '../includes/sidebar.php';  
      include '../includes/header.php';
      include '../includes/connection.php'; 
      
      $result = mysqli_query($conn,"SELECT * FROM users WHERE user_id='" . $_GET['Id'] . "'");
      $row= mysqli_fetch_array($result);
           
?>
      
        <div class="container-fluid">
        <div class="card">
                <div class="card-body">
                  <h5 class="card-title fw-semibold mb-4">Edit Users</h5>
              <div class="card">
                <div class="card-body">
                  <form action="edituser.php" method="POST">
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">User Id</label>
                      <input type="text" class="form-control" name="userid"
                      value="<?php echo $row['user_id']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>  
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Full Name</label>
                      <input type="text" class="form-control" name="username"
                      value="<?php echo $row['username']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">First Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="user_firstname" value="<?php echo $row['user_firstname']; ?>"> 
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Last Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="user_lastname" value="<?php echo $row['user_lastname']; ?>">
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Email Id</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" 
                      name="user_email" value="<?php echo $row['user_email']; ?>">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" 
                      name="user_password" value="<?php echo $row['user_password']; ?>">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">User Image</label>
                      <input type="file" class="form-control" id="exampleInputPassword1"
                       name="user_image" accept=".jpg, .jpeg, .png" value="images/<?php echo $row['user_image']; ?>">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Role</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" 
                      name="user_role" value="<?php echo $row['user_role']; ?>">
                    </div>
                    
                    
                    <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Update" />
                  </form>
                  <?php
                  
                    if(count($_POST)>0) {
                        
                        mysqli_query($conn,"UPDATE users set user_id='" . $_POST['userid'] . "',
                          username='" . $_POST['username'] . "', user_firstname='" . $_POST['user_firstname'] . "',
                          user_lastname='" . $_POST['user_lastname'] . "' , user_email='" . $_POST['user_email'] . "' ,
                          user_password='" . $_POST['user_password']. "' , user_image='" . $_POST['user_image'] . "',
                          user_role='" . $_POST['user_role'] . "' 
                          WHERE user_id ='" . $_POST['userid']. "'");
                        
                        
                        }
                        echo "<a href='viewusers.php'>View Users</a>";
                    ?>
                </div>
              </div>
              </div>
              </div>
              </div>
              <?php include '../includes/footer.php'; ?>