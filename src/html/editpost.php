<?php ob_start(); 
      session_start();
      include '../includes/sidebar.php';  
      include '../includes/header.php';
      include '../includes/connection.php'; 
      
      $result = mysqli_query($conn,"SELECT * FROM posts WHERE post_id='" . $_GET['Id'] . "'");
      $row= mysqli_fetch_array($result);
           
?>
      
        <div class="container-fluid">
        <div class="card">
                <div class="card-body">
                  <h5 class="card-title fw-semibold mb-4">Edit Posts</h5>
              <div class="card">
                <div class="card-body">
                  <form action="editpost.php" method="POST">
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Post Title</label>
                      <input type="text" class="form-control" name="postid"
                      value="<?php echo $row['post_id']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>  
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Post Title</label>
                      <input type="text" class="form-control" name="posttitle"
                      value="<?php echo $row['posttitle']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Post Category Id</label>
                      <select id="disabledSelect" class="form-select" 
                      name="postcategory">
                      <option ><?php echo $row['postcategory']; ?></option>    
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
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Post Author</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="postauthor" value="<?php echo $row['postauthor']; ?>"> 
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Post Status</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       name="poststatus" value="<?php echo $row['poststatus']; ?>">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Post Image</label>
                      <input type="file" class="form-control" id="exampleInputPassword1"
                       name="postimage" accept=".jpg, .jpeg, .png" value="images/<?php echo $row['postimage']; ?>">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Post Tags</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" 
                      name="posttag" value="<?php echo $row['posttag']; ?>">
                    </div>
                    
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Post Comment</label>
                      <textarea type="text" class="form-control" id="exampleInputPassword1"
                       name="postcomment"><?php echo $row['postcomment']; ?></textarea>
                    </div>
                    
                    <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Update" />
                  </form>
                  <?php
                  
                    if(count($_POST)>0) {
                        
                        mysqli_query($conn,"UPDATE posts set posttitle='" . $_POST['posttitle'] . "',
                          postcategory='" . $_POST['postcategory'] . "', postauthor='" . $_POST['postauthor'] . "',
                          poststatus='" . $_POST['poststatus'] . "' , postimage='" . $_POST['postimage'] . "' ,
                          posttag='" . $_POST['posttag']. "' , postcomment='" . $_POST['postcomment'] . "' 
                          WHERE post_id ='" . $_POST['postid']. "'");
                        
                        header('Location: viewposts.php');
                        }
                    ?>
                </div>
              </div>
              </div>
              </div>
              </div>
              <?php include '../includes/footer.php'; ?>