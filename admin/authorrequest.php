<?php 

include "header.php";
if(isset($_SESSION['role'])){

    if($_SESSION['role']=='0'){
        header("location: {$hostname}/admin/index.php");
    }
}

if(isset($_GET['delid'])){
    $delid=$_GET['delid'];
    $delsel=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM requestforauthor WHERE sno='$delid'"));
    $delfilepath="../requestedforauthor/".$delsel['resume'];
    if (file_exists($delfilepath)) {
        if (unlink( $delfilepath)) {
            echo "File deleted successfully.";
            $delsql="DELETE FROM `requestforauthor` WHERE sno='$delid'";
            $delqry=mysqli_query($conn,$delsql);
            if($delqry){

                header("location: ".$_SERVER['PHP_SELF']);
            }else{
                echo "data could not delete";
            }
        } else {
            $flag=1;
            echo "Unable to delete the file.";
        }
    } else {
        echo "file not found.";
    }
    

}

if(isset($_GET['accid'])){
    $accid=$_GET['accid'];
    $updatesql="UPDATE requestforauthor SET accepted='1' WHERE sno='$accid'";
    if(mysqli_query($conn,$updatesql)){
        $data =mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM requestforauthor WHERE sno='$accid'"));
        $fname=$data['fname'];
        $lname=$data['lname'];
        $user=$data['user'];
        $pass=$data['pass'];

        echo $sql2="INSERT INTO `user`(`first_name`, `last_name`, `username`, `password`, `role`) VALUES ('$fname','$lname','$user','$pass','0')";
        if(mysqli_query($conn,$sql2)){
            echo "All Set";
            header("location: ".$_SERVER['PHP_SELF']);
        }
    }else{
        echo "Could not do it";
    }
}

//pagination done here

// for pagination ,per page data ke row ka number
$per_page_data=5;

//$page shows kon sa page hai

if(isset($_GET["pageno"])){
    $page=$_GET["pageno"];
}else{
    $page=1;
}
//offset is starting point of the sql  comes with this given algo

$offset=($page-1)*$per_page_data;

$sql="SELECT * FROM requestforauthor WHERE accepted='0' LIMIT $offset,$per_page_data";
$result=mysqli_query($conn,$sql) or die("Data did not fetch");
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Requests</h1>
              </div>
              
              <div class="col-md-12">
			  <?php 
				
				if(mysqli_num_rows($result)>0){
					
			  
			  
			  ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>User Name</th>
                          <th>About</th>
                          <th>Resume</th>
                          <th>Status</th>
                          <th>Rejected</th>
                      </thead>
                      <tbody>
					  <?php 
						// $id=1;
                        $id=$offset+1;
						while($row=mysqli_fetch_assoc($result)){
							
					  ?>
                          <tr>
                              <td class='id'><?php echo $id++;?></td>
                              <td><?php echo $row['fname'];?></td>
                              <td><?php echo $row['lname'];?></td>
                              <td><?php echo $row['user'] ?></td>
                              <td><?php echo $row['about'] ?></td>
                              <td><a href="../requestedforauthor/<?php echo $row['resume'] ?>">Resume</a></td>
                              <td class='edit'><a class="btn btn-warning" target="_blank" href='authorrequest.php?accid=<?php echo $row['sno']?>'>Accept</a></td>
                              <td class='delete'><a href='authorrequest.php?delid=<?php echo $row['sno']?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
						<?php 
						}
						?>
                      </tbody>
                  </table>
				  <?php 
				}else{
						echo "<h4>Does not Have any Requested DATA....</h4>";
				}
				  
				  ?>
                  
              </div>
          </div>
          <div class="row">
          <ul class='pagination admin-pagination'>
                  <?php 
                  $sql1= 'SELECT * FROM requestforauthor WHERE accepted="0"';
                  $result1=mysqli_query($conn,$sql1);
                    $totel_row= mysqli_num_rows($result1);
                    
                    $totel_pages=ceil($totel_row/$per_page_data);
                    if($page>1){
                        ?>
                        <li><a href='authorrequest.php?pageno=<?php echo $page-1;?>'>PREV</a></li>
                        <?php
                    }
                    for($i=1;$i<=$totel_pages;$i++){
                        ?>
                            <li class="<?php echo $page==$i?"active":""; ?>"><a  href="authorrequest.php?pageno=<?php echo $i;?>"><?php echo $i ;?></a></li>
                        <?php
                    }
                    if($totel_pages>$page){
                        ?>
                        <li><a href='authorrequest.php?pageno=<?php echo $page+1;;?>'>NEXT</a></li>
                        <?php
                    }
                  
                  ?>
                      <!-- <li class="active"><a>1</a></li>
                      
                      <li><a>3</a></li> -->
                </ul>
          </div>
      </div>
  </div>

<br><br>


<?php include "footer.php"; ?>
