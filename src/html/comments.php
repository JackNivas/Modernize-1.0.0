<?php session_start();
      ob_start();
      include '../includes/sidebar.php';  
      include '../includes/header.php'; 
      include '../includes/connection.php';
      
      ?>
<div class="container-fluid">

<div class="card">
<h5 class="card-title fw-semibold mb-4">All Comments</h5>
<div class="card-body">
<?php
$result = mysqli_query($conn,"SELECT * FROM comments");
if (mysqli_num_rows($result) > 0) {
?>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Author</th>
      <th scope="col">Email</th>
      <th scope="col">Comments</th>
      <th scope="col">Post</th>
      <th scope="col">Status</th>
      <th scope="col">Date</th>
      <th scope="col">Approved</th>
      <th scope="col">UnApproved</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
			$i=0;
			while($row = mysqli_fetch_array($result)) {
			?>
    <tr>
    <td><?php echo $row["comment_id"]; ?></td>
    <td><?php echo $row["comment_author"]; ?></td>
    <td><?php echo $row["comment_email"]; ?></td>
    <td><?php echo $row["comment_content"]; ?></td>
    <td><?php echo $row["comment_post_id"]; ?></td>
    <td><?php echo $row["comment_status"]; ?></td>
    <td><?php echo $row["comment_date"]; ?></td>
    <td><a href="comments.php?approve=<?php echo $row["comment_id"]; ?>">Approved</a></td>
    <td><a href="comments.php?unapprove=<?php echo $row["comment_id"]; ?>">UnApprove</a></td>
    <td>  <a href="comments.php?delete=<?php echo $row["comment_id"]; ?>"><i class="ti ti-trash fs-8 text-danger"></i></a></td>
    </tr>
    <?php
			$i++;
			}
            }
			?>
  </tbody>
</table>
<?php

if(isset($_GET['approve'])){
  $approve_commentid = $_GET['approve'];
  $sql = "UPDATE comments SET comment_status='Published' 
WHERE comment_id=$approve_commentid";
if (mysqli_query($conn, $sql)){
  header('Location: comments.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
}
if(isset($_GET['unapprove'])){
  $unapprove_commentid = $_GET['unapprove'];
  $sql = "UPDATE comments SET comment_status='UnPublished' WHERE comment_id=$unapprove_commentid";
if (mysqli_query($conn, $sql)){
  header('Location: comments.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
}
?>
</div>
</div>
</div>
<?php
//Delete query 
if(isset($_GET['delete'])){
      $delete_catid = $_GET['delete'];
$sql = "DELETE FROM comments WHERE comment_id=$delete_catid";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    // echo "<a href='updatepro.php'>Update Record</a><br>";
    // echo "<a href='Form_Database.php'>Add New Data</a>";
    header('Location: comments.php');

} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
}
?>
<?php include '../includes/footer.php'; ?>
