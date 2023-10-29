<?php 
include("config.php");

// session Settings
// session update
// updating the ending time of user
$_SESSION['en_time']= "".date("d-m-Y h:i:sa")."";
//echo $_SESSION['session_id'];

$sessions="update session set en_time='".$_SESSION['en_time']."' where session_id='".$_SESSION['session_id']."' ";
$sessionFire=mysqli_query($conn,$sessions) or die("Could not Store ending");
session_unset();
session_destroy();


header("location: {$hostname}/admin/");

mysqli_close($conn);

?>
