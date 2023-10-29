<?php 
include "header.php"; 

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
                <?php
                    $sql="select * from post";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                  
                
                ?>
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php 
                            while($row=mysqli_fetch_assoc($result)){
                                ?>
                                    <tr>
                                        <td class='id'>1</td>
                                        <td><?php echo $row['title']?></td>
                                        <td><?php echo $row['categroy']?></td>
                                        <td><?php echo $row['post_date']?></td>
                                        <td><?php echo $row['author']?></td>
                                        <td class='edit'><a href='update-post.php'><i class='fa fa-edit'></i></a></td>
                                        <td class='delete'><a href='delete-post.php'><i class='fa fa-trash-o'></i></a></td>
                                    </tr>
                                
                                <?php
                            }
                        ?>
                          
                         
                      </tbody>
                  </table>
                  <?php 
                    }else{
                        ?>
                            <h4 style="text-align:center;color:red;">NO POST EXIST</h4>
                        <?php
                    }
                  
                  ?>
                  <ul class='pagination admin-pagination'>
                      <li class="active"><a>1</a></li>
                      <li><a>2</a></li>
                      <li><a>3</a></li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
