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
                    <!-- Blog Posts -->
                    <div class="blog-posts">
                        <?php
                            if(isset($_GET['p_id'])){
                                $get_post_id = $_GET['p_id'];

                            
                            $view_query = "UPDATE posts SET post_views_count = post_views_count+1 WHERE post_id=$get_post_id";
                            $run_view_query = mysqli_query($connection, $view_query);
                            if(!$run_view_query){
                                die("Query Failed " . mysqli_error($connection));
                            }
                            
                            $query = "SELECT * FROM posts WHERE post_id=$get_post_id";
                            $select_all_posts = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_all_posts)){
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_image = $row['post_image'];
                                $post_content = $row['post_content'];
                                $post_tags = $row['post_tags'];
                        ?>
                        
                            <div class="row mb-4 mt-3">
                                <div class="col-md-12">
                                    <h1 class="display-5"><a href="post.php?p_id=<?php echo @($post_id); ?>" class="link-custom"><?php echo $post_title; ?></a></h1>
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
                                            <img src="img/<?php echo $post_image; ?>" class="img-thumbnail" alt="">
                                        </div>
                                    </div>

                                    <div class="row mt-3 mb-2">
                                        <div class="col-md-10 font-small" style="line-height:3">
                                            <?php 
                                                $tags = explode(", ",$post_tags);
                                                foreach($tags as $key => $tag){
                                            ?>
                                            <a href="search.php?tag=<?php echo $tag; ?>" class="link-custom1 mr-2">
                                                <i class="fas fa-tags"></i> <?php echo $tag; ?> 
                                            </a>
                                            <?php            
                                                }    
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-justify">
                                                <?php echo $post_content; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <?php 
                            }
                        }else{
                                header("location:index.php");
                            }
                                    ?>
                                        <?php
                                            if(isset($_POST['create_comment'])){
                                                $get_post_id = $_GET['p_id'];
                                                $comment_author = $_POST['comment_author'];
                                                $comment_email = $_POST['comment_email'];
                                                $comment_content = $_POST['comment_content'];
                                                
                                                if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)){
                                                    $ins_comment_query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES ($get_post_id, '$comment_author', '$comment_email', '$comment_content', 'unapproved', now())";
                                                    $ins_query_run = mysqli_query($connection, $ins_comment_query);
                                                    if(!$ins_query_run){
                                                        die("Query Failed " . mysqli_error($connection));
                                                    }

                                                    $comment_count_query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $get_post_id";
                                                    $comment_count_query_run = mysqli_query($connection,$comment_count_query);
                                                    if(!$comment_count_query_run){
                                                        die("Query Failed " . mysqli_error($connection));
                                                    }
                                                }else{
                                                    echo "<script>alert('Fields Cannot Be Empty');</script>";
                                                }
                                            }
                                        ?>


                                    <!-- Comment Section -->
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                <h2>Leave A Comment</h2><hr>
                                                    <form action="" method="post">
                                                    <div class="form-group">
                                                        <label for="comment_author"><strong>Author</strong></label>
                                                        <input type="text" class="form-control" name="comment_author">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="comment_email"><strong>Email</strong></label>
                                                        <input type="text" class="form-control" name="comment_email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="comment_content"><strong>Your Comment</strong></label>
                                                        <textarea class="form-control" name="comment_content" col="30" rows="10"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="submit" name="create_comment" class="btn btn-voilet" value="Submit Comment">
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php 

                                        $sel_comment = "SELECT * FROM comments WHERE comment_post_id = $get_post_id AND comment_status = 'approved' ORDER BY comment_id DESC";
                                        $sel_comment_query = mysqli_query($connection, $sel_comment);
                                        if(!$sel_comment_query){
                                            die("Query Failed " . mysqli_error($connection));
                                        }
                                        while($row = mysqli_fetch_assoc($sel_comment_query)){
                                            $comment_date = $row['comment_date'];
                                            $comment_content = $row['comment_content'];
                                            $comment_author = $row['comment_author'];
                                    ?>

                                        <div class="row mt-2">
                                            <div class="col-md-1 text-right pr-2">
                                                <img src="img/pic.png" width="40" alt="reload page">
                                            </div>
                                            <div class="col-md-11 text-left pl-0">
                                                <h6 class="bold mb-0"><strong><?php echo $comment_author; ?></strong> <small class="pl-1 text-muted"><?php echo $comment_date; ?></small></h6>
                                                <p class="pt-0 mt-0 text-justify"><?php echo $comment_content; ?></p>
                                            </div>
                                        </div>
                                    
                                    
                                    <?php
                                        
                                        } 

                                    ?>
                                    
                                    
                                            
                                            
                                    
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