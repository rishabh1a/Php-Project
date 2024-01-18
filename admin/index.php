<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin Dashboard
                            <small>
                                <?php 
                                    echo $_SESSION['username'];
                                ?>
                            </small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <?php 
                                        $post_query = "SELECT * FROM posts";
                                        $post_run_query = mysqli_query($connection, $post_query);
                                        $post_counts = mysqli_num_rows($post_run_query);
                                    ?>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?php echo $post_counts; ?></div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <?php 
                                        $comment_query = "SELECT * FROM comments";
                                        $comment_run_query = mysqli_query($connection, $comment_query);
                                        $comment_counts = mysqli_num_rows($comment_run_query);
                                    ?>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?php echo $comment_counts; ?></div>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <?php 
                                        $user_query = "SELECT * FROM users";
                                        $user_run_query = mysqli_query($connection, $user_query);
                                        $user_counts = mysqli_num_rows($user_run_query);
                                    ?>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?php echo $user_counts; ?></div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <?php 
                                        $categorie_query = "SELECT * FROM categories";
                                        $categorie_run_query = mysqli_query($connection, $categorie_query);
                                        $categorie_counts = mysqli_num_rows($categorie_run_query);
                                    ?>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?php echo $categorie_counts; ?></div>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Chart -->
                <div class="row">
                    <div class="col-md-12">

                    <?php
                        $all_post_query = "SELECT * FROM posts";
                        $all_post_run_query = mysqli_query($connection, $all_post_query);
                        $all_post_counts = mysqli_num_rows($all_post_run_query);

                        $active_post_query = "SELECT * FROM posts WHERE post_status = 'published'";
                        $active_post_run_query = mysqli_query($connection, $active_post_query);
                        $active_post_counts = mysqli_num_rows($active_post_run_query);
                    
                        $draft_post_query = "SELECT * FROM posts WHERE post_status = 'draft'";
                        $draft_post_run_query = mysqli_query($connection, $draft_post_query);
                        $draft_post_counts = mysqli_num_rows($draft_post_run_query);

                        $approve_comments_query = "SELECT * FROM comments WHERE comment_status = 'approved'";
                        $approve_comments_run_query = mysqli_query($connection, $approve_comments_query);
                        $approve_comments_counts = mysqli_num_rows($approve_comments_run_query);

                        $unapprove_comments_query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
                        $unapprove_comments_run_query = mysqli_query($connection, $unapprove_comments_query);
                        $unapprove_comments_counts = mysqli_num_rows($unapprove_comments_run_query);

                        $subscriber_query = "SELECT * FROM users WHERE user_role = 'subscriber'";
                        $subscriber_run_query = mysqli_query($connection, $subscriber_query);
                        $subscriber_counts = mysqli_num_rows($subscriber_run_query);
                    
                    ?>
                    
                        <script type="text/javascript">
                            google.charts.load('current', {'packages':['bar']});
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                ['Data', 'Count'],

                    <?php 
                        $element_text = ['All Posts','Published Posts', 'Draft Posts', 'Approved Comments', 'Pending Comments', 'Users', 'Subscriber', 'Categories'];
                        $element_count = [$all_post_counts,$active_post_counts, $draft_post_counts, $approve_comments_counts, $unapprove_comments_counts, $user_counts, $subscriber_counts, $categorie_counts];
                        
                        for($i=0; $i<8; $i++){
                            echo "['$element_text[$i]',$element_count[$i]],";
                        }
                    ?>

                                ]);

                                var options = {
                                chart: {
                                    title: '',
                                    subtitle: '',
                                }
                                };

                                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                                chart.draw(data, google.charts.Bar.convertOptions(options));
                            }
                        </script>
                        <div id="columnchart_material" style=" height: 500px;"></div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>