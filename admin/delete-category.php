<?php 

include("config.php");

if(isset($_SESSION['role'])){

    if($_SESSION['role']=='0'){
        header("location: {$hostname}/admin/post.php");
    }
}

if(isset($_GET["cat-id"])){
    $id=$_GET["cat-id"];

    $sql="delete from category where category_id='{$id}'";
    $result=mysqli_query($conn,$sql);
    header("location: {$hostname}/admin/category.php");

}

?>