<?php 
include "header.php"; 

$data_one_page=4;
if(isset($_GET["pageno"])){
    $page=$_GET["pageno"];
}else{
    $page=1;
}
$offset=($page-1)*$data_one_page;

if($_SESSION['role']=='1'){//adnin can see all the posts
    $sql="select post.post_id,post_img,post.title,post.category,category_name,post.post_date,user.first_name,user.last_name,user.username from post 
    left join category on post.category=category.category_id
    left join user on post.author = user.user_id
    order by post_id desc LIMIT {$offset},{$data_one_page}";
  
}else if($_SESSION["role"]== "0"){ //normal author can only see his own posts
    $sql="select post.post_id,post_img,post.title,post.category,category.category_name,post.post_date,user.first_name,user.last_name,user.username from post 
    left join category on post.category=category.category_id
    left join user on post.author = user.user_id
    where author='".$_SESSION["userid"]."'
    order by post_id desc LIMIT {$offset},{$data_one_page} ";
    
}

$result=mysqli_query($conn,$sql);

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
                    
                    if(mysqli_num_rows($result)>0){
                  
                
                ?>
                  <table class="content-table ">
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
                        $id=$offset+1;
                            while($row=mysqli_fetch_assoc($result)){
                                ?>
                                    <tr>
                                        <td class='id'><?php echo $id++;?></td>
                                        <td><?php echo $row['title']?></td>
                                        <td><?php echo $row['category_name']?></td>
                                        <td><?php echo $row['post_date']?></td>
                                        <td><?php echo $row['first_name']." ".$row['last_name'];?></td>
                                        <td class='edit'><a href='update-post.php?id=<?php echo $row['post_id'];?>&catid=<?php echo $row['category']?>'><i class='fa fa-edit'></i></a></td>
                                        <td class='delete'><a href='delete-post.php?id=<?php echo $row['post_id'];?>&catid=<?php echo $row['category']?>&picname=<?php echo $row['post_img'];?>'><i class='fa fa-trash-o'></i></a></td>
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
                
              </div>
          </div>
      </div>
  </div>

                <ul class='pagination admin-pagination'>
                  <?php 
                  $sql1= 'select * from post';
                  $result1=mysqli_query($conn,$sql1);
                    $totel_row= mysqli_num_rows($result1);
                    
                    $totel_pages=ceil($totel_row/$data_one_page);
                    if($page>1){
                        ?>
                        <li><a href='post.php?pageno=<?php echo $page-1;?>'>PREV</a></li>
                        <?php
                    }
                    for($i=1;$i<=$totel_pages;$i++){
                        ?>
                            <li class="<?php echo $page==$i?"active":""; ?>"><a  href="post.php?pageno=<?php echo $i;?>"><?php echo $i ;?></a></li>
                        <?php
                    }
                    if($totel_pages>$page){
                        ?>
                        <li><a href='post.php?pageno=<?php echo $page+1;;?>'>NEXT</a></li>
                        <?php
                    }
                  
                  ?>
                      <!-- <li class="active"><a>1</a></li>
                      
                      <li><a>3</a></li> -->
                </ul>
<?php include "footer.php"; ?>
