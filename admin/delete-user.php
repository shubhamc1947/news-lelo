<?php

include 'config.php';
if(isset($_SESSION['role'])){

    if($_SESSION['role']=='0'){
        header("location: {$hostname}/admin/post.php");
    }
}

if(isset($_GET['id'])){
	$userid=$_GET['id'];
	$sql="delete from user where user_id='{$userid}'";
	$result=mysqli_query($conn,$sql) or die("did not delete");
	
	header("location: {$hostname}/admin/users.php");
	
}


?>