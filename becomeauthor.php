
<?php 
include('admin/config.php');


$errormsg="";
$usernameerror='';
if(isset($_POST["submit"])){
    if(isset($_FILES['resume'])){
        // [name] => kid5.png
        //         [full_path] => kid5.png
        //         [type] => image/png
        //         [tmp_name] => C:\xampp\tmp\phpC397.tmp
        //         [error] => 0
        //         [size] => 803344
         
        $imgname=$_FILES['resume']['name'];
        $imgsize=$_FILES['resume']['size'];
        $imgtype=$_FILES['resume']['type'];
        $imgtemp=$_FILES['resume']['tmp_name'];

        $imgnamearray=(explode('.',$imgname));
        $imgext=strtolower(end($imgnamearray));

        $extension=array("jpeg","png","jpg","pdf");
        
        if(in_array($imgext,$extension)===false){
            // $error="File Type is not valid<br>";
            $errormsg .="<div class='alert alert-danger'>File Type is not valid</div>";
        }

        if($imgsize>5*1024*1024){
            // $error="File Size is more than 5MB<br>";
            $errormsg .="<div class='alert alert-danger'>File Size is more than 5MB</div>";
        }


        //now first we need to insert the other info of table so that we can get the current sno

        if($errormsg==''){
            $fname=mysqli_real_escape_string($conn,$_POST['fname']);
            $lname=mysqli_real_escape_string($conn,$_POST['lname']);
            $user=mysqli_real_escape_string($conn,$_POST['user']);
            $pass=mysqli_real_escape_string($conn,md5($_POST['pass']));
            $desc=mysqli_real_escape_string($conn,$_POST['desc']);
            
           $sql1="INSERT INTO `requestforauthor`( `fname`, `lname`, `user`, `pass`, `about`, `resume`, `accepted`) VALUES ('$fname','$lname','$user','$pass','$desc','$imgname','0')";
            $res1=mysqli_query($conn,$sql1) or die("did not insert into requestforauthor");


        //    mysqli_multi_query($conn, $sql);
                $newid=mysqli_insert_id($conn);
                $dbimgname="file_".$newid.".".$imgext;
                if(move_uploaded_file($imgtemp,"requestedforauthor/".$dbimgname)){
                        // echo "sab kuch badiya tha phir bhi image could not uploaded";
                        $updateimgnamesql="UPDATE requestforauthor SET resume ='{$dbimgname}' WHERE sno={$newid}";
                        $updateimgnameres=mysqli_query($conn,$updateimgnamesql) or die("could not update image name in db");
                        // header("location: index.php");
                        // Set success message
                        $_SESSION['success_message'] = "Your request has been submitted successfully.";
                        
                }else{
                     $errormsg .="<div class='alert alert-danger'>File Could Not Move</div>";
                }
        }
    }else{
         $errormsg .="<div class='alert alert-danger'>File upload is a must</div>";
    }

    
}

    // Display alert based on success or error
    if (isset($_SESSION['success_message'])) {
        
        echo '<script>alert("' . $_SESSION['success_message'] . '");</script>';
        unset($_SESSION['success_message']); // Clear the session variable
        echo '<script>window.location.replace("index.php");</script>'; // Redirect to index.php
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Become an Author</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <!-- sweet alert css and js -->
    <script src="js/sweetAlert.js"></script>
    <link rel="stylesheet" href="css/sweetAlert.css">
</head>
<body>
<!-- HEADER -->
<header>
<div id="become-author">
   <div class="" style="">Become an Author</div>
</div>
</header>
<div class="errorBox" style="margin-top:70px;">
    <?php
        echo $errormsg;
    ?>
</div>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <!-- <h1 class="admin-heading">Become Author</h1> -->
              </div>
              <div class="col-md-offset-3 col-md-6 " style="margin-top:5rem;">
                  <!-- Form Start -->
                  <form  action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                      <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
						  <small style="color:red;"><?php echo $usernameerror;?></small>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="pass" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label for=""> Tell Us about yourself </label>
                          <textarea name="desc" class="form-control" rows="5"  required placeholder="Maximum in 100 words"></textarea>
                      </div>
                      <div class="form-group">
                          <label for="">Resume</label>
                          <input type="file" name="resume" >
                      </div>

                      <input type="submit"  name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
