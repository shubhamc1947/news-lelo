<?php 
include("config.php");
// checking is the submit button is clicked
if(isset($_POST["submit"])){
    //checking if the img have some imgage or not


    if(isset($_FILES['newsImg'])){
        // [name] => kid5.png
        //         [full_path] => kid5.png
        //         [type] => image/png
        //         [tmp_name] => C:\xampp\tmp\phpC397.tmp
        //         [error] => 0
        //         [size] => 803344
         
         echo $imgname=$_FILES['newsImg']['name'];
         echo $imgsize=$_FILES['newsImg']['size'];
         echo $imgtype=$_FILES['newsImg']['type'];
         echo $imgtemp=$_FILES['newsImg']['tmp_name'];

        $imgnamearray=(explode('.',$imgname));
        $imgext=strtolower(end($imgnamearray));

        $extension=array("jpeg","png","jpg");
        
        if(in_array($imgext,$extension)===false){
            $error="Image Type is not valid<br>";
        }

        if($imgsize>2097152){
            $error="File Size is more than 2MB<br>";
        }


        //now first we need to insert the other info of table so that we can get the current sno

        if(empty($error)===true){
            $title=$_POST['post_title'];
            $desc=$_POST['postdesc'];
            $cat=$_POST['category'];
            $date=date('d M,Y');
            $sql="UPDATE category SET post=post+1 WHERE category_id={$cat}";
            $res=mysqli_query($conn,$sql) or die("did not update cateotry");


            
           $sql1="INSERT INTO post(title,description,category,post_date,author,post_img)
                       VALUES('{$title}','{$desc}',{$cat},'{$date}',{$_SESSION['userid']},'{$imgname}')";
            $res1=mysqli_query($conn,$sql1) or die("did not insert into post");


        //    mysqli_multi_query($conn, $sql);
                echo $newid=mysqli_insert_id($conn);
                echo $dbimgname="img_".$newid.".".$imgext;
                if(move_uploaded_file($imgtemp,"upload/".$dbimgname)){
                        // echo "sab kuch badiya tha phir bhi image could not uploaded";
                        $updateimgnamesql="UPDATE post SET post_img ='{$dbimgname}' WHERE post_id={$newid}";
                        $updateimgnameres=mysqli_query($conn,$updateimgnamesql) or die("could not update image name in db");
                        header("location: {$hostname}/admin/post.php");
                        
                }else{
                    echo "image could not move";
                }
            
            

            //header("location: {$hostname}/admin/post.php");

        }else{
            print_r($error);
        }
    }else{
        echo "image upload is a must ";
        header("location: {$hostname}/admin/post.php");
    }

    
}

?>