<?php 
include "header.php"; 
if(isset($_SESSION['role'])){

    if($_SESSION['role']=='0'){
        header("location: {$hostname}/admin/post.php");
    }
}

if(isset($_GET["cat-id"])){
    $id=$_GET["cat-id"];
    $sql= "select * from category where category_id={$id}";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    
    //header("location: {$hostname}/admin/category.php");

}

if(isset($_POST['sumbit'])){
    echo $cat=$_POST['cat'];
    echo $catid=$_POST['cat_id'];
    $sql="update category set category_name='{$cat}' where category_id= '{$catid}' ";

    if(mysqli_query($conn,$sql)){
        header("location: {$hostname}/admin/category.php");
    }else{
        echo "DATA did not update";
    }
}





?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <form action="<?php $_SERVER['PHP_SELF']?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['category_id'];?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" value="<?php echo $row['category_name'];?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                  </form>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
