<?php  session_start();
       include '../includes/sidebar.php';  
       include '../includes/header.php'; 
       include '../includes/connection.php';
?>

<div class="container-fluid">
<div class="row">
      <?php
      $result = mysqli_query($conn,"SELECT * FROM category WHERE categoryid='" . $_GET['Id'] . "'");
      $row= mysqli_fetch_array($result);
      ?>
      <div class="col-xl-6 col-lg-6" style="height:200px;">
            <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
              <h4 class="m-0 font-weight-bold text-primary">Edit Categories</h4>
            </div>
                <div class="card-body">
                  <form action="editcategory.php" method="POST" enctype="multipart/form-data">
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Category ID</label>
                      <input type="text" class="form-control" name="categoryid"
                      value="<?php echo $row['categoryid']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>  
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Category Title</label>
                      <input type="text" class="form-control" value="<?php echo $row['categorytitle']; ?>" name="cat_title"
                       id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Update" />
                  </form>
                  <?php
                  
                    if(count($_POST)>0) {
                        
                        mysqli_query($conn,"UPDATE category set categorytitle='" . $_POST['cat_title'] . "' 
                          WHERE categoryid ='" . $_POST['categoryid']. "'");
                        
                          echo "<script>document.location.href=category.php;</script>";
                        }
                        
                    ?>
            </div>
      </div>
</div>
</div>