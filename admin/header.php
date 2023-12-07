<?php 

include("config.php");
if(!isset($_SESSION["username"])){
    header("location: {$hostname}/admin/");
}

$sqlsettings="select * from settings";
$ressettings=mysqli_query($conn,$sqlsettings) or die("did not get the settings value");
$rowsettings=mysqli_fetch_assoc($ressettings);


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="../css/font-awesome.css">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    <header style="margin-bottom:90px;">
        <nav>
            <div class="brand-info">
                <a href="index.php" id="logo_head"><img  src="<?php echo $rowsettings['logo']?>"> NEWS LELO</a>
            </div>
            <div class="nav-info">
                 <a href="logout.php" class="admin-logout" >Hello ! <?php echo $_SESSION['username'];?> logout</a>
            </div>
        </nav>
    </header>
        <!-- HEADER -->
        <!-- <div id="header-admin">
            container
            <div class="container">
                row
                <div class="row">
                    LOGO
                    <div class="col-md-2">
                        <a href="post.php"><img class="logo" src="<?php //echo $rowsettings['logo']?>"></a>
                    </div>
                    /LOGO
                      LOGO-Out
                    <div class="col-md-offset-9  col-md-3">

                        <a href="logout.php" class="admin-logout" >Hello ! <?php //echo $_SESSION['username'];?> logout</a>
                    </div>
                    /LOGO-Out
                </div>
            </div>
        </div> -->
        <!-- /HEADER -->
        <!-- Menu Bar -->
        <div id="admin-menubar" style="margin-top:70px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <ul class="admin-menu">
                            <li>
                                <a href="post.php">Post</a>
                            </li>
                            <?php 
                                if($_SESSION['role']=='1'){

                              
                            ?>
                            <li>
                                <a href="category.php">Category</a>
                            </li>
                            <li>
                                <a href="users.php">Users</a>
                            </li>
                            <li>
                                <a href="authorrequest.php">Author Request</a>
                            </li>
                            <li>
                                <a href="settings.php">Settings</a>
                            </li>
                            <?php 
                                

                                }
                            
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Menu Bar -->
