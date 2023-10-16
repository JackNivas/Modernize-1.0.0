<?php ob_start();
      session_start();
      include '../includes/sidebar.php';  
      include '../includes/header.php';
      include '../includes/connection.php'; 
      
 
      
?>
      
        <div class="container-fluid">
        <div class="card">
                <div class="card-body">
                  <h5 class="card-title fw-semibold mb-4">Add New Posts</h5>
              <div class="card">
                <div class="card-body">
                  <form action="addpost.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Post Title</label>
                      <input type="text" class="form-control" name="posttitle" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Post Category Id</label>
                      <select id="disabledSelect" class="form-select"
                       name="postcategory">
                      <option>Select post category</option>
                      <?php
                      
                      $select_query = "SELECT * FROM category";
                      $result = mysqli_query($conn, $select_query);
                      
                      if($result->num_rows> 0)
                      {
                        $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
                      }

                      
                

                        foreach ($options as $option) {
                        ?>
                          <option><?php echo $option['categorytitle']; ?> </option>
                          <?php 
                          }
                        ?>
                        </select>
                    
<!-- 
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"> -->
                    </div>
                    
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Post Author</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="postauthor"> 
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Post Status</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="poststatus">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Post Image</label>
                      <input type="file" class="form-control" id="exampleInputPassword1" name="postimage">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Post Tags</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" name="posttags">
                    </div>
                    
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Post Comment</label>
                      <textarea type="text" class="form-control" id="exampleInputPassword1" name="postcomment"></textarea>
                    </div>
                    
                    <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
                    
                  </form>
                  <?php 
                  
                  if(isset($_POST['submit'])){
                    $ptitle = $_POST['posttitle'];
                    $pcategory = $_POST['postcategory'];
                    $pauthor = $_POST['postauthor'];
                    $pstatus = $_POST['poststatus'];
                    $pimage = $_POST['postimage'];
                    $ptags = $_POST['posttags'];
                    $pcomment = $_POST['postcomment'];
                    
                    // print_r($_FILES["postimage"]);
                    
                    if($_FILES["postimage"]["error"]===4)
                    {
                      echo "<script> alert('Image does not exist); </script>";
                    }              
                    else{
                      $fileName = $_FILES["postimage"]["name"];
                      $fileSize = $_FILES["postimage"]["size"];
                      $tmpName = $_FILES["postimage"]["tmp_name"];
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

                    if(empty($ptitle)){
                      echo "This field is required";
                    }
                    
                    else{
                    $sql = "INSERT INTO posts 
                    (posttitle,postcategory,postauthor,poststatus,postimage,posttag,postcomment) VALUES
                    ('$ptitle','$pcategory','$pauthor','$pstatus','$newImageName','$ptags','$pcomment')";
 
                        if(mysqli_query($conn, $sql)){
                          echo "New record has been added successfully !";
                          header('Location: viewposts.php');
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