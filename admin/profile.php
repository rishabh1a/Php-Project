<?php 
    include "includes/admin_header.php"; 

    if(isset($_SESSION['username'])){
        $user_name = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE user_name = '$user_name'";
        $run_query = mysqli_query($connection, $query);
        if(!$run_query){
            die("Query Failed " . mysqli_error($connection));
        }
        while($row = mysqli_fetch_array($run_query)){
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_password = $row['user_password'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
            $user_image = $row['user_image'];
        }
    }

    if(isset($_POST['update_profile'])){
        $user_name = $_POST['user_name'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_role = $_POST['user_role'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];
                
        move_uploaded_file($user_image_temp, "../img/$user_image");

        if(empty($user_image)){
            $query = "SELECT * FROM users WHERE user_name = '$user_name'";
            $sel_img = mysqli_query($connection, $query);
            while($sel_row = mysqli_fetch_assoc($sel_img)){
                $user_image = $sel_row['user_image'];
            }
        }

        $update_query = "UPDATE users SET user_name='$user_name', user_firstname='$user_firstname', user_lastname='$user_lastname', user_email='$user_email', user_password='$user_password', user_role='$user_role', user_image='$user_image' WHERE user_name = '$user_name'";
        $update_query_run = mysqli_query($connection, $update_query);
        confirm_query($update_query_run);
    }

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
                        
                        <h2 class="text-center">Edit Profile</h2><hr>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="user_name">Username</label>
                                <input type="text" value="<?php echo $user_name; ?>" class="form-control" name="user_name">
                            </div>
                            <div class="form-group">
                                <label for="user_firstname">Firstname</label>
                                <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
                            </div>
                            <div class="form-group">
                                <label for="user_lastname">Lastname</label>
                                <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
                            </div>
                            <div class="form-group">
                                <label for="user_email">Email</label>
                                <input type="text" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
                            </div>
                            <div class="form-group" style="position: relative;">
                                <label for="user_password">Password</label>
                                <input type="password" id="passwordInput" value="<?php echo $user_password; ?>" class="form-control" name="user_password" >
                                <input type="checkbox" class="checkbox-inline" style="position:absolute;top:2.5rem;right:0.5rem;zoom:1.7;" onclick="showPassword()">
                            </div>
                            <div class="form-group">
                                <label for="user_image">Image</label><br>
                                <img src="../img/<?php echo $user_image; ?>" width="40" alt="">
                                <input type="file" class="form-control" name="user_image">
                            </div>
                            <div class="form-group">
                                <label for="user_role">Role</label>
                                <select name="user_role" id="user_role" class="form-control">
                                    <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
                                    <option value="Admin">Admin</option>
                                    <option value="Subscriber">Subscriber</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary bg-voilet" name="update_profile" value="Update Profile">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>