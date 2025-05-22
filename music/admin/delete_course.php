<?php
include('authenticate.php');
include('db_config.php');

$id = $_GET['id'];
$query = "DELETE FROM courses WHERE id='$id'";
mysqli_query($conn, $query);
header("Location: admin_dashboard.php");
exit();
?>
