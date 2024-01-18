<?php 
    $errors = array();
    $user_name = "";
    $user_email = "";

    include "includes/db.php";
    include "includes/header.php"; 
?>

<?php 

    if(isset($_POST['register'])){
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);

        $sql="SELECT * FROM users WHERE (user_name='$username' OR user_email='$email')";
        $res=mysqli_query($connection,$sql);
        if(mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if($username == $row['user_name']){
                $errors['user_name'] = "Username already exists";
            }
            if($email==$row['user_email']){
                $errors['user_email'] = "Email already exists";
            }
        }else{

        if(!empty($username) && !empty($email) && !empty($password)){
            $query = "SELECT randSalt FROM users";
            $select_randSalt_query = mysqli_query($connection, $query);
            if(!$select_randSalt_query){
                die("Query Failed " . mysqli_error($connection));
            }
            $row = mysqli_fetch_array($select_randSalt_query);
            $salt = $row['randSalt'];

            // encrypt password
            $password = crypt($password, $salt);
            
            $query = "INSERT INTO users(user_name, user_email, user_password, user_role) VALUES ('$username', '$email', '$password', 'Subscriber' )";
            $register_user_query = mysqli_query($connection, $query);
            if(!$register_user_query){
                die("Query Failed " . mysqli_error($connection));
            }
            $message = "You Are Successfully Registered.";
            $class="alert-success";
        }   
		elseif(mysql_errno() == 1062) {
    $message =  "no way!";
	$class="alert-danger";
}
		else{
            $message = "Field Cannot Be Empty.";
            $class="alert-danger";
        }
   
    }
    }
?>

<!-- Navigation -->
<?php 
    include "includes/navigation.php"; 
?>
<!-- End Navigation -->

    <br><br><br><br>

    <section class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="display-4 text-center">Register</h1><hr>
                <form action="" method="post" class="form">
                    
                    <?php if(count($errors) > 0){ ?>
                        <div class="alert alert-danger bg-voilet alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </div>
                    <?php }else{
                        ?>
                        
                        <?php 
                        if(isset($_POST['register'])){
                    ?>
                            <div class="alert <?php echo $class; ?> alert-dismissible fade show" data-dismiss="alert" style="border-radius:0;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    <?php    
                            echo $message;
                    ?>
                    </div>
                    <?php
                        }
                    ?>

                        <?php
                    } ?>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="somebody@example.com">
                    </div>
                    <div class="form-group" style="position: relative;">
                        <input type="password" name="password" id="passwordInput" class="form-control" placeholder="Enter Password">
                        <input type="checkbox" class="checkbox-inline" style="position:absolute;top:0.58rem;right:0.3rem;zoom:1.8;" onclick="showPassword()">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="register" class="btn btn-primary bg-voilet btn-block" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </section>

<?php include "includes/footer.php"; ?>