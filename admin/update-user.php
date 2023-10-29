<?php include "header.php";
if(isset($_SESSION['role'])){

    if($_SESSION['role']=='0'){
        header("location: {$hostname}/admin/post.php");
    }
}


if(isset($_POST['submit'])){
	
	$userid=$_POST['userid'];
	
	$fname=mysqli_real_escape_string($conn,$_POST['fname']);
	$lname=mysqli_real_escape_string($conn,$_POST['lname']);
	$username=mysqli_real_escape_string($conn,$_POST['username']);
	$role=mysqli_real_escape_string($conn,$_POST['role']);
	$sql1="update user set 
				first_name='{$fname}',
				last_name='{$lname}',
				username='{$username}',
				role='{$role}' where user_id='{$userid}'";
	$result1=mysqli_query($conn,$sql1) or die("did not update the value");
	if($result1){
		header("location: ${hostname}/admin/users.php");
	}
	

}



 ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
				  <?php 
					if(isset($_GET['id'])){
						
						$user_id=$_GET['id'];
						
						$sql="select * from user where user_id='{$user_id}'";
						$result=mysqli_query($conn,$sql) or die("did not fetch data");
						if(mysqli_num_rows($result)>0){
							
							while($row=mysqli_fetch_assoc($result)){
						
					
				  
				  ?>
                  <form  action="<?php $_SERVER['PHP_SELF'];?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="userid"  class="form-control" value="<?php echo $row['user_id'];?>" placeholder="" >
                      </div>
					  <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" value="<?php echo $row['first_name'];?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" value="<?php echo $row['last_name'];?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $row['username'];?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
						  <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
						   <?php 
							if($row['role']==0){
								
								?>
								<option value="0" selected>normal User</option>
								<option value="1">Admin</option>
								<?php
							}else{
								?>
								<option value="0" >normal User</option>
								<option value="1" selected>Admin</option>
								<?php
							}
							 
						  
						  ?>
                          
						 
                              
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
				  
                  <!-- /Form -->
				  <?php 
				  		
							}
						}
					}
					?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
