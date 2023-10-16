<?php session_start();
      include '../includes/sidebar.php';  
      include '../includes/header.php'; 
      include '../includes/connection.php';
      
      ?>
<div class="container-fluid">
<h5 class="card-title fw-semibold mb-4">All Users</h5>
<div class="card">
<div class="card-body">
<?php
$result = mysqli_query($conn,"SELECT * FROM users");
if (mysqli_num_rows($result) > 0) {
?>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Image</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
			$i=0;
			while($row = mysqli_fetch_array($result)) {
			?>
    <tr>
    <td><?php echo $row["user_id"]; ?></td>
    <td><?php echo $row["username"]; ?></td>
    <td><?php echo $row["user_firstname"]; ?></td>
    <td><?php echo $row["user_lastname"]; ?></td>
    <td><?php echo $row["user_email"]; ?></td>
    <td><?php echo $row["user_password"]; ?></td>
    <td><img src="images/<?php echo $row['user_image']; ?>"  alt="Image" style="width:100px;" ></td>
    <td><?php echo $row["user_role"]; ?></td>
	<td><a href="edituser.php?Id=<?php echo $row["user_id"]; ?>"><i class="ti ti-edit fs-8"></i></a>
  <a href="deleteuser.php?Id=<?php echo $row["user_id"]; ?>"><i class="ti ti-trash fs-8 text-danger"></i></a></td>
    </tr>
    <?php
			$i++;
			}
      
			?>
  </tbody>
</table>
<?php
echo "<a href='addusers.php'>Add New Data</a>";

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
