<?php 
    include ("config.php");
    //all done working fine
    $flag=0;
    $delid = $_GET['id'];
    $catid=$_GET['catid'];
    $picname=$_GET['picname'];
    
    
    $delimgpath="upload/".$picname;

    if (file_exists($delimgpath)) {
        if (unlink( $delimgpath)) {
            echo "Image deleted successfully.";
            
        } else {
            $flag=1;
            echo "Unable to delete the image.";
        }
    } else {
        echo "Image not found.";
    }

    //deleting post from the post table of database;
    $sql="delete from post where post_id={$delid}";
    $result=mysqli_query($conn,$sql) or die("did not delete the data");


    // updating the category values

    //  $catValue=mysqli_fetch_assoc(mysqli_query($conn,"select post from category where category_id={$catid};"))['post'];
    //  echo $catValue;
    //  $catValue--;
    // $catid--;
     $sql1="UPDATE category SET post=post-1 where category_id={$catid}";
     $res1=mysqli_query($conn,$sql1) or die("did not update the category values");
    



    header("location: {$hostname}/admin/post.php");




?>