<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                  <?php 
                    // include('admin/config.php');
                    $id=$_GET['id'];
                    $sql="SELECT post.post_id,post.description,post_img,post.title,post.category,category_name,post.post_date,post.author,user.first_name,user.last_name,user.username from post 
                    LEFT JOIN category ON post.category=category.category_id
                    LEFT JOIN user ON post.author = user.user_id WHERE post.post_id={$id}
                    order by post_id desc ";
                    $res=mysqli_query($conn,$sql) or die("could not fetch data");
                    if(mysqli_num_rows($res)>0){
                        while($row=mysqli_fetch_assoc($res)){
                  ?>
                        <div class="post-container">
                            <div class="post-content single-post">
                                <h3><?php echo $row['title']?></h3>
                                <div class="post-information">
                                    <span>
                                        <i class="fa fa-tags" aria-hidden="true"></i>
                                        <a href="category.php?catid=<?php echo $row['category'];?>"><?php echo $row['category_name']?></a>
                                        
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
                                <img class="single-feature-image" src="admin/upload/<?php echo $row['post_img']?>" alt=""/>
                                <p class="description">
                                <?php echo $row['description'];?>
                                </p>
                            </div>
                        </div>
                    <?php 
                        }
                    }
                    ?>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
