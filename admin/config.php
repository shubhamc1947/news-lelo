<?php
if(isset($_SESSION['role'])){

    if($_SESSION['role']=='0'){
        header("location: {$hostname}/admin/post.php");
    }
}

$hostname="http://localhost/Learning_Backend/news-Lelo";

$conn=mysqli_connect("localhost","root","mysql","news_lelo") or die("DATABASE did not connect ". mysqli_connect_error());


// session Code here
// session start
session_start();


//session Start date and time 

date_default_timezone_set("Asia/Kolkata");
$_SESSION['st_time']= "".date("d-m-Y h:i:sa")."";

 
?>