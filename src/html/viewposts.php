<?php session_start();
      include '../includes/sidebar.php';  
      include '../includes/header.php'; 
      include '../includes/connection.php';
      
      ?>
<div class="container-fluid">
<h5 class="card-title fw-semibold mb-4">All Posts</h5>
<div class="card">
<div class="card-body">
<?php
$result = mysqli_query($conn,"SELECT * FROM posts");
if (mysqli_num_rows($result) > 0) {
?>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Category</th>
      <th scope="col">Author</th>
      <th scope="col">Status</th>
      <th scope="col">Image</th>
      <th scope="col">Tags</th>
      <th scope="col">Comments</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
			$i=0;
			while($row = mysqli_fetch_array($result)) {
			?>
    <tr>
    <td><?php echo $row["post_id"]; ?></td>
    <td><?php echo $row["posttitle"]; ?></td>
    <td><?php echo $row["postcategory"]; ?></td>
    <td><?php echo $row["postauthor"]; ?></td>
    <td><?php echo $row["poststatus"]; ?></td>
    <td><img src="images/<?php echo $row['postimage']; ?>"  alt="Image" style="width:100px;" ></td>
    <td><?php echo $row["posttag"]; ?></td>
    <td><?php echo $row["postcomment"]; ?></td>
    <td><?php echo $row["postdate"]; ?></td>
	<td><a href="editpost.php?Id=<?php echo $row["post_id"]; ?>"><i class="ti ti-edit fs-8"></i></a>
  <a href="deletepost.php?Id=<?php echo $row["post_id"]; ?>"><i class="ti ti-trash fs-8 text-danger"></i></a></td>
    </tr>
    <?php
			$i++;
			}
      
			?>
  </tbody>
</table>
<?php
echo "<a href='addpost.php'>Add New Data</a>";

}
else
{
    echo "No result found";
}

?>
</div>
</div>
</div>

<?php include '../includes/footer.php'; ?>
