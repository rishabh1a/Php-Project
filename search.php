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
                <h1 class="display-5 text-center">
                        <?php 
                            if(isset($_POST['searchText'])){
                                echo "Search Result:<small>" . $_POST['searchText']. "</small></h1><hr>";
                            }
                            elseif(isset($_GET['tag'])){
                                echo "Search Tag Result:<small>" .$_GET['tag'] . "</small></h1><hr>";
                            }
                            elseif(isset($_GET['author'])){
                                echo "Search Author Result:<small>" .$_GET['author'] . "</small></h1><hr>";
                            }
                            else{
                                ?>
                                Search Here: </h1>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form-inline" action="search.php" method="post">
                                            <div class="input-group input-group1">
                                                <input type="text" name="searchText" class="form-control" placeholder="Blog Search">
                                                <div class="input-group-append">
                                                    <button class="btn btn-voilet" name="searchBtn" type="submit"><i class="fas fa-search"></i></button>  
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                
                        <?php
                            } 
                        ?>
                        
                    <!-- Blog Posts -->
                    <div class="blog-posts">
                        <?php

                            if(isset($_POST['searchBtn'])){
                                $search = $_POST['searchText'];
                                $search_query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                                $search_run = mysqli_query($connection, $search_query);
                                if(!$search_run){
                                    die("Query Failed " . mysqli_error($connection));
                                }
                                $count = mysqli_num_rows($search_run);
                                if($count == 0){
                                    echo "No Result Found.";
                                }else{
                                
                            while($row = mysqli_fetch_assoc($search_run)){
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_image = $row['post_image'];
                                $post_content = $row['post_content'];
                                $post_tags = $row['post_tags'];
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
                                    <div class="row mb-2">
                                        <div class="col-md-12">
                                            <img src="img/<?php echo $post_image; ?>" class="img-thumbnail" alt="">
                                        </div>
                                    </div>
                                    <div class="row mt-3 mb-2">
                                        <div class="col-md-10 font-small">
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
                                            <p>
                                                <?php echo $post_content; ?>
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
                            }

                        ?>  
                        
                        
                        <!-- Next & Previous Button -->
                        <!-- <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="#" class="btn btn-voilet1"><i class="fas fa-angle-left"></i> Previous</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="#" class="btn btn-voilet1">Next <i class="fas fa-angle-right"></i></a>
                            </div>
                        </div> -->
                    </div>
                    <div class="blog-posts">
                        <?php

                            if(isset($_GET['tag'])){
                                $search_tag = $_GET['tag'];
                                $search_query_tag = "SELECT * FROM posts WHERE post_tags LIKE '%$search_tag%'";
                                $search_run_tag = mysqli_query($connection, $search_query_tag);
                                if(!$search_run_tag){
                                    die("Query Failed " . mysqli_error($connection));
                                }
                                $count = mysqli_num_rows($search_run_tag);
                                if($count == 0){
                                    echo "No Result Found.";
                                }else{
                                
                            while($row = mysqli_fetch_assoc($search_run_tag)){
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_image = $row['post_image'];
                                $post_content = $row['post_content'];
                                $post_tags = $row['post_tags'];
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
                                    <div class="row mb-2">
                                        <div class="col-md-12">
                                            <img src="img/<?php echo $post_image; ?>" class="img-thumbnail" alt="">
                                        </div>
                                    </div>
                                    <div class="row mt-3 mb-2">
                                        <div class="col-md-10 font-small">
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
                                            <p>
                                                <?php echo $post_content; ?>
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
                            }

                        ?>  
                        
                        
                        <!-- Next & Previous Button -->
                        <!-- <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="#" class="btn btn-voilet1"><i class="fas fa-angle-left"></i> Previous</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="#" class="btn btn-voilet1">Next <i class="fas fa-angle-right"></i></a>
                            </div>
                        </div> -->
                    </div>
                    <div class="blog-posts">
                        <?php

                            if(isset($_GET['author'])){
                                $author_posts = $_GET['author'];
                                $author_posts_query = "SELECT * FROM posts WHERE post_author LIKE '%$author_posts%'";
                                $author_posts_run = mysqli_query($connection, $author_posts_query);
                                if(!$author_posts_run){
                                    die("Query Failed " . mysqli_error($connection));
                                }
                                $count = mysqli_num_rows($author_posts_run);
                                if($count == 0){
                                    echo "No Result Found.";
                                }else{
                                
                            while($row = mysqli_fetch_assoc($author_posts_run)){
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_image = $row['post_image'];
                                $post_content = $row['post_content'];
                                $post_tags = $row['post_tags'];
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
                                    <div class="row mb-2">
                                        <div class="col-md-12">
                                            <img src="img/<?php echo $post_image; ?>" class="img-thumbnail" alt="">
                                        </div>
                                    </div>
                                    <div class="row mt-3 mb-2">
                                        <div class="col-md-10 font-small">
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
                                            <p>
                                                <?php echo $post_content; ?>
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
                            }

                        ?>  
                        
                        
                        <!-- Next & Previous Button -->
                        <!-- <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="#" class="btn btn-voilet1"><i class="fas fa-angle-left"></i> Previous</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="#" class="btn btn-voilet1">Next <i class="fas fa-angle-right"></i></a>
                            </div>
                        </div> -->
                    </div>
                    <!-- Blog Posts End -->
            </div>
            <!-- Sidebar -->
                <?php include "includes/sidebar.php"; ?>
            <!-- End Sidebar -->
        </div>
    </section>

<?php include "includes/footer.php"; ?>