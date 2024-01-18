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

                <div class="row">
                    <div class="col-md-6">

                        <?php 
                            // add category
                            addCategories();
                        ?>

                        <form action="" method="post" class="form">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input type="text" name="cat_title" id="cat_title" class="form-control btn1">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="add_cat" value="Add Category" class="btn btn-primary bg-voilet btn1">
                            </div>
                        </form>

                    <?php 
                    
                    // Update and include 
                    if(isset($_GET['edit'])){
                        $edit_cat_id = $_GET['edit'];

                        include "includes/update_categories.php";
                    }
                    
                    ?>

                    </div>
                    <h4 class="text-center">All Categories</h4>
                    <div class="col-md-6 text-center">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Category Title</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <?php 
                                    // Select All Categories And print in the table
                                    findAllCategories();

                                    // Delete Category by clicking on the delete button
                                    deleteCategories();
                                    
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>