<?php  
include 'inc/config.php';

if (isset($_GET['del'])) {
$id = (int)$_GET['del'];
$sql = "DELETE FROM complaints WHERE id = '{$id}'";
$query = mysqli_query($connect, $sql);
header("location: complaints.php");
}
?>