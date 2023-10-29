<?php 

include "header.php";
if(isset($_SESSION['role'])){

    if($_SESSION['role']=='0'){
        header("location: {$hostname}/admin/post.php");
    }
}

$perPageRow=4;
if(isset($_GET['page'])){
    $page=$_GET['page'];
}else{
    $page= 1;
}
$offset=($page-1)*$perPageRow;

$sql="select * from category LIMIT {$offset},{$perPageRow}";
$result=mysqli_query($conn,$sql);

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
             
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                    <?php 
                    if(mysqli_num_rows($result)> 0){
                        // $id=1;
                        $id=$offset+1;
                        while($row=mysqli_fetch_array($result)){
                    ?>
                        <tr>
                            <td class='id'><?php echo $id++;?></td>
                            <td><?php echo $row['category_name']?></td>
                            <td><?php echo $row['post']?></td>
                            <td class='edit'><a href='update-category.php?cat-id=<?php echo $row["category_id"];?>'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-category.php?cat-id=<?php echo $row["category_id"];?>'><i class='fa fa-trash-o'></i></a></td>
                        </tr>
                        <?php 
                        }
                    }else{
                        ?>
                        <tr><td colspan="5" style="text-align:center;color:red;"><h4>NO data Found</h4></td></tr>
                        <?php
                    }
                        ?>
                    </tbody>
                </table>



                
            </div>
        </div>
    </div>
</div>
<?php 
                            
                    $sql1="select * from category";
                    $result1=mysqli_query($conn,$sql1);
                    if(mysqli_num_rows($result1)> 0){

                        $totel_row_data=mysqli_num_rows($result1);
                        $totel_pages=ceil($totel_row_data/$perPageRow);
                    ?>
                    <ul class='pagination admin-pagination'>
                        
                    <?php
                        if($page>1){
                            ?>

                          <li><a href="category.php?page=<?php echo $page-1;?>">PREV</a></li>;
                          <?php
                        }
                        for($i=1;$i<=$totel_pages;$i++){
                            if($i==$page){$active="active";}else{$active= "";}
                            ?>
                                <li class="<?php echo $active;?>"><a href="category.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
                            <?php
                        }
                        if($page<$totel_pages){

                            ?>
                            <li><a href="category.php?page=<?php echo $page+1;?>">NEXT</a></li>
                        <?php
                        }
                    }
                
                
                ?>
                    <!-- <li class="active"><a>1</a></li>
                    
                    <li><a>3</a></li> -->
                </ul>
<?php include "footer.php"; ?>
