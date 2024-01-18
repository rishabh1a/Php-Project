<?php 
    include "includes/admin_header.php"; 
?>

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

                <?php 
                    // For redirecting to page add_post and view all posts
                    if(isset($_GET['source'])){
                        $source = $_GET['source'];
                    }else{
                        $source = '';
                    }

                    switch($source){
                        case 'add_user':
                        include "includes/add_user.php";
                        break;

                        case 'edit_user':
                        include "includes/edit_user.php";
                        break;
                        
                        default:
                        include "includes/view_all_users.php";
                        break;
                    }

                ?>               

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>