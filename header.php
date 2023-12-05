<?php
include('admin/config.php');
// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";
// echo $_SERVER['PHP_SELF'];

$titlename=basename($_SERVER['PHP_SELF']);
$title="";

switch($titlename){
    case "category.php":
        if(isset($_GET['catid'])){
            $catsql="select category_name from category where category_id='".$_GET['catid']."'";
            $catres=mysqli_query($conn,$catsql);
            $catrow=mysqli_fetch_assoc($catres);
            $title="Category type : ".$catrow['category_name'];
        }else{
            $title="NO record found";
        }
        break;
    case "author.php":
        if(isset($_GET['authorid'])){
            $autsql="select * from user where user_id='".$_GET['authorid']."'";
            $autres=mysqli_query($conn,$autsql);
            $autrow=mysqli_fetch_assoc($autres);
            $title="Author Name : ".$autrow['first_name']." ".$autrow['last_name'];
        }else{
            $title="NO record found";
        }
        // $title="Author Page";
        break;
    case "single.php":
        if(isset($_GET['id'])){
            $sinsql="select * from post where post_id='".$_GET['id']."'";
            $sinres=mysqli_query($conn,$sinsql);
            $sinrow=mysqli_fetch_assoc($sinres);
            $title="Title : ".$sinrow['title'];
        }else{
            $title="NO record found";
        }
        // $title="Author Page";
        // $title="Single Page";
        break;
    case "search.php":
        if(isset($_GET['searchterm'])){
            $title="Search result : ".$_GET['searchterm'];
        }else{
            $title="NO record found";
        }
        break;
    default:
        $title="NewsLelo";

}
?>

<?php
// settings code for logo 
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
    <title><?php echo $title;?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="admin/<?php echo $rowsettings['logo']?>"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                    
                    if(isset($_GET['catid'])){
                        $cid=$_GET['catid'];
                    }
                    $sql="select * from category where post>0";
                    $res=mysqli_query($conn,$sql) or die("Query failded : category");
                    if(mysqli_num_rows($res)>0){
                        $active="";
                ?>
                    <ul class='menu'>
                        <li><a href='index.php'>HOME</a></li>
                
                <?php
                        while($row=mysqli_fetch_assoc($res)){
                            if(isset($_GET['catid'])){
                                if($cid==$row['category_id']){
                                    $active="active";
                                }else{
                                    $active="";
                                }
                            }
                ?>
                            
                            <li><a class="<?php echo $active;?>" href='category.php?catid=<?php echo $row['category_id']?>'><?php echo $row['category_name']?></a></li>
                <?php
                        }
                    }
                ?>
                    </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
