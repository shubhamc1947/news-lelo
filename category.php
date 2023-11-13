<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                    <?php
                        if(isset($_GET['catid'])){
                            $catid=$_GET['catid'];
                        }
                        $sql1= "select * from category where category_id={$catid}";
                        $result1=mysqli_query($conn,$sql1) or die("did not run query");
                        $row1=mysqli_fetch_assoc($result1);
                    ?>
                    <h2 class="page-heading"><?php echo $row1['category_name']?></h2>
                        <?php 
                            // if(isset($_GET['catid'])){
                            //     $catid=$_GET['catid'];
                            // }
                            
                            // pagination code
                            $data_one_page=3;
                            if(isset($_GET["pageno"])){
                                $page=$_GET["pageno"];
                            }else{
                                $page=1;
                            }
                            $offset=($page-1)*$data_one_page;
                            

                            $sql="select post.post_id,post.description,post_img,post.title,post.category,category_name,post.post_date,user.first_name,user.last_name,user.username from post 
                            left join category on post.category=category.category_id
                            left join user on post.author = user.user_id 
                            WHERE category.category_id={$catid}
                            order by post_id desc LIMIT {$offset},{$data_one_page} ";
                            $res=mysqli_query($conn,$sql) or die("could not fetch data");
                            if(mysqli_num_rows($res)>0){
                                while($row=mysqli_fetch_assoc($res)){
                        ?>
                                 <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?php echo $row['post_id'];?>"><img src="admin/upload/<?php echo $row['post_img']?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href="single.php?id=<?php echo $row['post_id'];?>"><?php echo $row['title']?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                
                                                <a href="category.php?catid=<?php echo $row['category'];?>"><?php echo $row['category_name']?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php'><?php echo $row['first_name']." ".$row['last_name']; ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo $row['post_date']?>
                                            </span>
                                        </div>
                                        <p class="description">
                                            <?php echo substr($row['description'],0,120)."...";?>
                                        </p>
                                        <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id'];?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                                </div>

                        <?php
                                }
                            }
                        ?>
                        
                        
                        
                        
                        <ul class='pagination'>
                            <?php 
                                //sql1 and result1  command uper cauz we need the data in the category name section of it
                                $totel_row= $row1['post'];
                                
                                $totel_pages=ceil($totel_row/$data_one_page);
                                if($page>1){
                                    ?>
                                    <li><a href='category.php?catid=<?php echo $catid; ?>&pageno=<?php echo $page-1;?>'>PREV</a></li>
                                    <?php
                                }
                                for($i=1;$i<=$totel_pages;$i++){
                                    ?>
                                        <li class="<?php echo $page==$i?"active":""; ?>"><a  href="category.php?catid=<?php echo $catid; ?>&pageno=<?php echo $i;?>"><?php echo $i ;?></a></li>
                                    <?php
                                }
                                if($totel_pages>$page){
                                    ?>
                                    <li><a href='category.php?catid=<?php echo $catid; ?>&pageno=<?php echo $page+1;;?>'>NEXT</a></li>
                                    <?php
                                }
                            
                            ?>
                      
                        </ul>    
                    </div><!-- /post-container -->

            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
