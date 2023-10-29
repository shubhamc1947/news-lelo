<?php 

include "header.php";
if(isset($_SESSION['role'])){

    if($_SESSION['role']=='0'){
        header("location: {$hostname}/admin/post.php");
    }
}

//pagination done here

// for pagination ,per page data ke row ka number
$per_page_data=3;

//$page shows kon sa page hai

if(isset($_GET["page"])){
    $page=$_GET["page"];
}else{
    $page=1;
}
//offset is starting point of the sql  comes with this given algo

$offset=($page-1)*$per_page_data;

$sql="SELECT * FROM USER ORDER BY user_id DESC LIMIT $offset,$per_page_data";
$result=mysqli_query($conn,$sql) or die("Data did not fetch");
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12">
			  <?php 
				
				if(mysqli_num_rows($result)>0){
					
			  
			  
			  ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
					  <?php 
						// $id=1;
                        $id=$offset+1;
						while($row=mysqli_fetch_assoc($result)){
							
					  ?>
                          <tr>
                              <td class='id'><?php echo $id++;?></td>
                              <td><?php echo $row['first_name']." ".$row['last_name'];?></td>
                              <td><?php echo $row['username'];?></td>
                              <td><?php 
							  
								if($row['role']==1){
									echo "ADMIN";
								}else{
									echo "Normal";
								}
							  
							  ?></td>
                              <td class='edit'><a href='update-user.php?id=<?php echo $row['user_id']?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-user.php?id=<?php echo $row['user_id']?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
						<?php 
						}
						?>
                      </tbody>
                  </table>
				  <?php 
				}else{
						echo "<h2>Does not Have any USER DATA</h2>";
				}
				  
				  ?>
                  
              </div>
          </div>
      </div>
  </div>

 <!-- pagination code here-->
<?php 

    // for pagination of the page
    
    $sql1="select * from user";
    $result1=mysqli_query($conn,$sql1)  or die("Query did not Execute");
    if(mysqli_num_rows($result1)> 0){
        $totel_data=mysqli_num_rows($result1);
        
        $totel_pages=ceil($totel_data/$per_page_data);
        ?>
        <ul class='pagination admin-pagination'>
            
            
        <?php
            if($page>1){
                ?>
                <li><a href="<?php echo "{$hostname}/admin/users.php?page=".($page-1)."";?>">PREV</a></li>
                <?php
            }
        for($i=1;$i<=$totel_pages;$i++){
            if($page==$i){$active="active";}else{ $active= "";}
            ?>
            <li  class="<?php echo $active;?>"><a href="<?php echo "{$hostname}/admin/users.php?page=$i";?>"><?php echo $i;?></a></li>
            <?php
        }
        if($page<$totel_pages){
            ?>
            <li><a href="<?php echo "{$hostname}/admin/users.php?page=".($page+1)."";?>">NEXT</a></li>
            <?php
        }
        
        
    }
    
?>
        
    </ul>

<?php include "footer.php"; ?>
