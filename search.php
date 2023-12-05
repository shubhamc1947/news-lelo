<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                        <?php
                            if(isset($_GET['searchterm'])){
                                $searchterm=mysqli_real_escape_string($conn,$_GET['searchterm']);
                            }
                            
                        ?>
                        <h2 class="page-heading"><?php echo $searchterm; ?></h2>
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
                                

                                $sql="select post.post_id,post.description,post_img,post.title,post.category,category_name,post.post_date,post.author,user.first_name,user.last_name,user.username from post 
                                left join category on post.category=category.category_id
                                left join user on post.author = user.user_id 
                                WHERE post.title LIKE '%$searchterm%' OR 
                                post.description LIKE '%$searchterm%' OR
                                category_name LIKE '%$searchterm%' OR
                                first_name LIKE '%$searchterm%' OR
                                last_name LIKE '%$searchterm%' OR
                                user.username LIKE '%$searchterm%' OR
                                post_date LIKE '%$searchterm%'
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
                                                    
                                                    <a href="search.php?searchterm=<?php echo $row['category'];?>"><?php echo $row['category_name']?></a>
                                                </span>
                                                <span>
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    <a href="author.php?authorid=<?php echo $row['author'];?>"><?php echo $row['first_name']." ".$row['last_name']; ?></a>
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
                                }else{
                                    echo "<h3>No record found...</h3>";
                                }
                            ?>
                            
                            
                            
                            
                            <ul class='pagination'>
                                <?php 
                                    $sql1="select post.post_id,post.description,post_img,post.title,post.category,category_name,post.post_date,post.author,user.first_name,user.last_name,user.username from post 
                                    left join category on post.category=category.category_id
                                    left join user on post.author = user.user_id 
                                    WHERE post.title LIKE '%$searchterm%' OR 
                                    post.description LIKE '%$searchterm%' OR
                                    category_name LIKE '%$searchterm%' OR
                                    first_name LIKE '%$searchterm%' OR
                                    last_name LIKE '%$searchterm%' OR
                                    user.username LIKE '%$searchterm%' OR
                                    post_date LIKE '%$searchterm%'";
                                    $res1=mysqli_query($conn,$sql1) or die("no. of row could not find");
                                    $row1=mysqli_num_rows($res1);
                                    $totel_row= $row1;
                                    
                                    $totel_pages=ceil($totel_row/$data_one_page);
                                    if($page>1){
                                        ?>
                                        <li><a href='search.php?searchterm=<?php echo $searchterm; ?>&pageno=<?php echo $page-1;?>'>PREV</a></li>
                                        <?php
                                    }
                                    for($i=1;$i<=$totel_pages;$i++){
                                        ?>
                                            <li class="<?php echo $page==$i?"active":""; ?>"><a  href="search.php?searchterm=<?php echo $searchterm; ?>&pageno=<?php echo $i;?>"><?php echo $i ;?></a></li>
                                        <?php
                                    }
                                    if($totel_pages>$page){
                                        ?>
                                        <li><a href='search.php?searchterm=<?php echo $searchterm; ?>&pageno=<?php echo $page+1;;?>'>NEXT</a></li>
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
