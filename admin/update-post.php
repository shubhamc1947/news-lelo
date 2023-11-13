<?php include "header.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql="select * from post where post_id={$id}";
    $result=mysqli_query($conn,$sql) or die("did not fetched data");
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
    }else{
        echo "Have more than one row";
    }
    



?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <form action="update-save.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $row['post_id'];?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $row['title'];?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>

                <textarea name="postdesc" class="form-control"  required rows="5">
                    <?php echo $row['description'];?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="category">
                <?php 
                    $sql1="select * from category";
                    $result1=mysqli_query($conn,$sql1);
                    if(mysqli_num_rows($result1)>0){
                        while($row1 = mysqli_fetch_array($result1)){
                            ?>
                            <option <?php echo $row1['category_id']==$row['category']?"selected":""?> value="<?php echo $row1['category_id']?>"><?php echo $row1['category_name']?></option>
                            
                            <?php
                        }
                    }
                
                ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <img  src="upload/<?php echo $row['post_img']?>" height="150px">
                <input type="hidden" name="old-image" value="<?php echo $row['post_img']?>">
            </div>
            <input type="hidden" name="catid" value="<?php echo $_GET['catid'];?>">
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->       
      </div>
    </div>
  </div>
</div>

<?php 

}
?>
<?php include "footer.php"; ?>
