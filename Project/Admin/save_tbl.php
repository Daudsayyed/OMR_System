<?php 
include_once('config.php');
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
        header('Location: login.php');
}

$update=$_POST['value'];
$id=$_POST['id'];

$query="UPDATE ".DB_USERDB2." Set total='".$update."' where id='".$id."'";
//echo $query;

$data=mysql_query($query);
echo $update;

?>