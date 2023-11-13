<?php
    include('config.php');

    if(isset($_POST['submit'])){
        $id=$_POST['post_id'];
        $catid=$_POST['catid'];
        $title=$_POST['post_title'];
        $desc=$_POST['postdesc'];
        $cat=$_POST['category'];
        $date=date('d M,Y');
        $oldImgName="upload/".$_POST['old-image'];
        $img =$_FILES['new-image'];
        $imgtemp=$img['tmp_name'];
        // echo "<pre>";
        // print_r($img);
        // echo "</pre>";

        // subscracting category values

        $catValue=mysqli_fetch_assoc(mysqli_query($conn,"select post from category where category_id={$catid};"))['post'];
        echo $catValue;
        $catValue--;


        $sql1="UPDATE category SET post={$catValue} where category_id={$catid}";
        $res1=mysqli_query($conn,$sql1) or die("did not update the category values");
    

        //         Array
        // (
        //     [name] => 
        //     [full_path] => 
        //     [type] => 
        //     [tmp_name] => 
        //     [error] => 4
        //     [size] => 0
        // )
        
            
        
        if($img['name']!=""){
            if (file_exists($oldImgName)) {
                if (unlink( $oldImgName)) {
                    echo "Image deleted successfully.";
                    if(move_uploaded_file($imgtemp,$oldImgName)){
                        
                        
                         echo "file successfully uploaded on server";
                        
                    }else{
                          echo "image could not move";
                    }
                    
                }else {
                   echo "image could not deleted"   ;
                }
            } else {
                echo "Image not found.";
            }
        }

        $sql="UPDATE post SET title='{$title}',
                                    description='{$desc}',
                                    category={$cat},
                                    post_date='{$date}',
                                    author={$_SESSION['userid']}
                                    WHERE post_id={$id};";
         $sql.="UPDATE category SET post=post+1 WHERE category_id={$cat}";
         $res=mysqli_multi_query($conn,$sql) or die("did not update cateotry");
      
        header("location: {$hostname}/admin/post.php");
        
        
    }

       

?>