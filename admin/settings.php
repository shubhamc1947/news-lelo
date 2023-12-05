<?php 
include("header.php");

$sql="select * from settings";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);

?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Admin Setting</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <form action="update-settings.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <label for="exampleInputTile">Website Name</label>
                <input type="text" name="web-title"  class="form-control" id="exampleInputUsername" value="<?php echo $row['title']?>">
            </div>
            <div class="form-group">
                <label for="">Logo image</label>
                <input type="file" name="web-img">
                <img  src="<?php echo $row['logo']?>" height="100px">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Footer</label>
                <input type="text" name="web-footer"  class="form-control" id="exampleInputUsername" value="<?php echo $row['footer']?>">
            </div>
            
            
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->       
      </div>
    </div>
  </div>
</div>

<?php include "footer.php"; ?>
