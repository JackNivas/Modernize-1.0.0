<?php
include '../includes/connection.php';
$sql = "DELETE FROM posts WHERE post_id='" . $_GET["Id"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record " . $_GET["Id"] . " deleted successfully";
    // echo "<a href='updatepro.php'>Update Record</a><br>";
    // echo "<a href='Form_Database.php'>Add New Data</a>";
    header('Location: viewposts.php');

} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>