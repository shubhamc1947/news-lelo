<?php 
include "header.php";

if(isset($_POST["submit"])){
    $title=$_POST['post_title'];
    $desc=$_POST['postdesc'];
    $cat=$_POST['category'];
    $date=date('d M,Y');

    $sql1="insert into post(title,description,category,post_date,author)
                VALUES('{$title}','{$desc}','{$cat}','{$date}','{$_SESSION["userid"]}') ";
    $result1=mysqli_query($conn,$sql1) or die("did not store data");
    
    header("location: post.php");
}

?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Post</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form  action="<?php $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="post_title">Title</label>
                          <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="postdesc" class="form-control" rows="5"  required></textarea>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select name="category" class="form-control">
                              <option value="" disabled > Select Category</option>
                              <?php 
                               $sql="select * from category";
                               $result=mysqli_query($conn,$sql);
                               if(mysqli_num_rows($result)>0){
                                while($row=mysqli_fetch_assoc($result)){
                                    ?>
                                    <option value="<?php echo $row['category_id'];?>"><?php echo $row['category_name']?></option>
                                    
                                    <?php
                                }
                               }
                              ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Post image</label>
                          <input type="file" name="fileToUpload" >
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
