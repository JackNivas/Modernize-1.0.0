<?php ob_start();
      session_start();
      include '../includes/sidebar.php';  
      include '../includes/header.php'; 
      include '../includes/connection.php';

      if(isset($_POST['submit'])){
            $cat_title=$_POST['cat_title'];

      if(empty($cat_title)){
            echo "<script> alert('This field cannot be empty');</script>";
      }
      else
      {
            $add_query="INSERT INTO category(categorytitle) VALUES('$cat_title')";
            $result=mysqli_query($conn, $add_query);
      }
}
?>

<div class="container-fluid">
<div class="row">

      <div class="col-xl-6 col-lg-6" style="height:200px;">
            <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
              <h4 class="m-0 font-weight-bold text-primary">Add Categories</h4>
            </div>
                <div class="card-body">
                  <form action="category.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Category Title</label>
                      <input type="text" class="form-control" name="cat_title"
                       id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
                  </form>
            </div>
      </div>
</div>
<div class="col-xl-6 col-lg-6" style="height:200px;">
<div class="card shadow mb-4">
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
<h4 class="m-0 font-weight-bold text-primary">Categories</h4>
</div>
<div class="card-body">
<?php
$result = mysqli_query($conn,"SELECT * FROM category");
if (mysqli_num_rows($result) > 0) {
?>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
			$i=0;
			while($row = mysqli_fetch_array($result)) {
			?>
    <tr>
    <td><?php echo $row["categoryid"]; ?></td>
    <td><?php echo $row["categorytitle"]; ?></td>
    <td><a href="category.php?update=<?php echo $row["categoryid"]; ?>"><i class="ti ti-edit fs-8"></i></a>
  <a href="category.php?delete=<?php echo $row["categoryid"]; ?>"><i class="ti ti-trash fs-8 text-danger"></i></a></td>
</tr>
<?php
			$i++;
			}
      
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>



      <?php
      if(isset($_GET['update'])){
      $edit_catid = $_GET['update'];
      $result = mysqli_query($conn,"SELECT * FROM category WHERE categoryid=$edit_catid");
      $row= mysqli_fetch_array($result);
      ?>
<div class="col-xl-6 col-lg-6" style="height:200px;">
            <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
              <h4 class="m-0 font-weight-bold text-primary">Edit Categories</h4>
            </div>
                <div class="card-body">
                  <form action="category.php?id=<?php echo $edit_catid ?>" method="POST" enctype="multipart/form-data">
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Category ID</label>
                      <input type="text" class="form-control" name="categoryid"
                      value="<?php echo $row['categoryid']; ?>" 
                      id="exampleInputEmail1" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>  
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Category Title</label>
                      <input type="text" class="form-control" value="<?php echo $row['categorytitle']; ?>"
                       name="cat_title"
                       id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <input type="submit" class="btn btn-primary" name="update" value="Update" />
                  </form>
                  
            </div>
      </div>
</div>
</div>                       
<?php }?>

<?php
                  
if(isset($_POST['update'])) {
    $update_catid=$_POST['categoryid'];

    $update_cattitle=$_POST['cat_title'];
    mysqli_query($conn,"UPDATE category SET categorytitle='$update_cattitle' 
      WHERE categoryid =$update_catid");
      header('Location: category.php');                        
    //   echo "<script>document.location.href=category.php;</script>";
    }
    
?>

<?php
//Delete query 
if(isset($_GET['delete'])){
      $delete_catid = $_GET['delete'];
$sql = "DELETE FROM category WHERE categoryid=$delete_catid";
if (mysqli_query($conn, $sql)) {
    echo "Record " . $delete_catid. " deleted successfully";
    // echo "<a href='updatepro.php'>Update Record</a><br>";
    // echo "<a href='Form_Database.php'>Add New Data</a>";
    header('Location: category.php');

} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
}
?>