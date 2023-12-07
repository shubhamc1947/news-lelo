<?php 
    include("config.php");//SESSION STARTS


    if(isset($_SESSION['username'])){
        header("location: {$hostname}/admin/post.php");
    }
    if(isset($_POST["login"])){
        $username = mysqli_real_escape_string($conn,$_POST["username"]);
        $password = mysqli_real_escape_string($conn,md5($_POST["password"]));

        
        echo $sql="select user_id,username,role from user where username='{$username}' AND password='{$password}'";
        $result = mysqli_query($conn, $sql) or die("Did not run ");
        if(mysqli_num_rows($result)> 0){
            while($row = mysqli_fetch_assoc($result)){
                echo $_SESSION['username'] = $row['username'];
                echo "<br>";
                echo $_SESSION['userid'] = $row['user_id'];
                echo "<br>";
                echo $_SESSION['role'] = $row['role'];
                echo "<br>";
         
                 //session unique id
                echo $_SESSION['session_id']=bin2hex(random_bytes(10));
                
                $sessionSql="insert into session(session_id,user_name,userid,role,st_time)
                                            values('".$_SESSION['session_id']."',
                                            '".$_SESSION['username']."',
                                            '".$_SESSION['userid']."',
                                            '".$_SESSION['role']."',
                                            '".$_SESSION['st_time']."'
                                            )";
                $sessionFire=mysqli_query($conn,$sessionSql)  or die("Did not fill Seession");
                header("location: {$hostname}/admin/post.php");
            }
        }
    }

    
$sqlsettings="select * from settings";
$ressettings=mysqli_query($conn,$sqlsettings) or die("did not get the settings value");
$rowsettings=mysqli_fetch_assoc($ressettings);

?>


<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <div style="display:flex; justify-content:center;"><img  src="<?php echo $rowsettings['logo']?>" width="" height="70px" style=""></div>
                        <h3 class="heading">Admin</h3>
                        <!-- Form Start -->
                        <form  action="" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login"  class="btn" style="background-color:#637E76;color:#f2f2f2;width:100%" value="login" />
                        </form>
                        <!-- /Form  End -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
