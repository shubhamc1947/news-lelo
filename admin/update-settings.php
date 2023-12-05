<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
include('config.php');


if(isset($_POST['submit'])){
    $title=$_POST['web-title'];
    $footer=$_POST['web-footer'];
    $imgname= $_FILES['web-img']['name'];
    $imgtmpname= $_FILES['web-img']['tmp_name'];
    $imgsize= $_FILES['web-img']['size'];
    $sql="";
    if($imgname!=""){

        $errorexten="";
        $errorsize="";
        if($imgsize>2097152){
            $errorsize="File Size is more than 2MB<br>";
        }
    
        $exten=pathinfo($imgname, PATHINFO_EXTENSION);
        if(!($exten=='jpeg'||$exten=='jpg'||$exten=='png')){
            $errorexten= "Image type JPEG JPG PNG only allowed";
        }
    
    
        if($errorexten==""&&$errorsize==""){
            echo $name="images/logo.".$exten;
            if(move_uploaded_file($imgtmpname,$name)){
                    echo "image save to its path";
                    $sql="UPDATE settings SET title='{$title}',
                                            footer='{$footer}',
                                            logo='{$name}'";
                    $res=mysqli_query($conn,$sql) or die("did not work");
            }else{
                    echo "image could not move";
            }
        }
      
    }else{
        $sql1="UPDATE settings SET title='{$title}',
        footer='{$footer}'";
        $res=mysqli_query($conn,$sql1) or die("did not work");
    }
    
                    
        echo "all work done";

    header("location: {$hostname}/admin/settings.php");
    

}



?>