<?php 
    include "includes/db.php";
    include "includes/header.php"; 
?>

    <!-- Navigation -->
        <?php include "includes/navigation.php"; ?>
    <!-- End Navigation -->

    <br><br><br><br>

    <section class="container">
        <div class="row">
            <div class="col-md-9">
                <h1 class="display-4 text-center">Blog Posts</h1><hr>
                    <!-- Blog Posts -->
                    <div class="blog-posts">
                        <?php
                            if(isset($_GET['page'])){
                                $page = $_GET['page'];
                            }else{
                                $page = "";
                            }

                            if($page == "" || $page == 1){
                                $page_1 = 0;
                            }else{
                                $page_1 = ($page * 5) - 5;
                            }

                            $post_query_count = "SELECT * FROM posts";
                            $find_count = mysqli_query($connection, $post_query_count);
                            $count = mysqli_num_rows($find_count);
                            $count = ceil($count / 5);

                            $query = "SELECT * FROM posts ORDER BY post_id DESC LIMIT $page_1, 5";
                            $select_all_posts = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_all_posts)){
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_image = $row['post_image'];
                                $post_content = substr($row['post_content'], 0, 150);
                                $post_tags = $row['post_tags'];
                                $post_status = $row['post_status'];

                                if($post_status == 'Published'){

                        ?>
                        
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <h1 class="display-5"><a href="post.php?p_id=<?php echo $post_id; ?>" class="link-custom"><?php echo $post_title; ?></a></h1>
                                    <div class="row">
                                        <div class="col-md-6 text-left">
                                            <h6 class="pl-1"><i class="fas fa-user-circle"></i> By <a href="search.php?author=<?php echo $post_author; ?>" class="link-custom"><?php echo $post_author; ?></a></h6>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <h6><i class="far fa-clock"></i> Posted on <?php echo $post_date; ?></h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="post.php?p_id=<?php echo $post_id; ?>"><img src="img/<?php echo $post_image; ?>" class="img-thumbnail" alt=""></a>
                                        </div>
                                    </div>

                                    <div class="row mt-3 mb-2">
                                        <div class="col-md-10 font-small" style="line-height:3">
                                            <?php 
                                                $tags = explode(", ",$post_tags);
                                                foreach($tags as $key => $tag){
                                            ?>
                                            <a href="search.php?tag=<?php echo $tag; ?>" class="link-custom1 mr-2"><i class="fas fa-tags"></i> <?php echo $tag; ?> </a>
                                            <?php            
                                                }    
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-justify">
                                                <?php echo $post_content; ?> <strong> . . . . </strong>
                                            </p>
                                            <a href="post.php?p_id=<?php echo $post_id; ?>" class="btn btn-voilet">Read More <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>

                        <?php
                                }
                            }

                        ?>  
                    
                        
                        <!-- Pagination -->
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <ul class="pagination-custom">
                                    <?php 
                                        for($i=1; $i<=$count; $i++){
                                            if($i == $page){
                                                echo "<a href='index.php?page=$i'><li class='active-link'>$i</li></a>";
                                            }else{
                                                echo "<a href='index.php?page=$i' class=''><li>$i</li></a>";
                                            }
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>                    
                    </div>
                    <!-- Blog Posts End -->
            </div>
            <!-- Sidebar -->
                <?php include "includes/sidebar.php"; ?>
            <!-- End Sidebar -->
        </div>
    </section>

<?php include "includes/footer.php"; ?>