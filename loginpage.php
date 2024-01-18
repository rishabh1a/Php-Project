<?php 
    include "includes/db.php";
    include "includes/header.php"; 
?>
<?php 


if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    
    $query = "SELECT * FROM users WHERE user_name = '$username'";
    $run_query = mysqli_query($connection, $query);
    if(!$run_query){
        die("Query Failed " . mysqli_error($connection));
    }
	 while($row = mysqli_fetch_array($run_query)){
        $db_user_id = $row['user_id'];
        $db_user_name = $row['user_name'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_password = $row['user_password'];
        $db_user_role = $row['user_role'];
    }

    $password = crypt($password, $db_user_password);

    if($username === $db_user_name && $password === $db_user_password){
        $_SESSION['username'] = $db_user_name;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;
        header("location: ../admin");
    }else{
        header("location: ../index.php");
    }

}







?>

<?php 
    include "includes/navigation.php"; 
?>



 <br><br><br><br>

    <section class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="display-4 text-center">Login</h1><hr>
                <form action="" method="post" class="form">
                    <?php 
                        if(isset($_POST['login'])){
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
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Enter Username">
                    </div>
                    
                    <div class="form-group" style="position: relative;">
                        <input type="password" name="password" id="passwordInput" class="form-control" placeholder="Enter Password">
                       
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" class="btn btn-primary bg-voilet btn-block" value="login">
                    </div>
					<div class="form-group">
                        <input type="button" onclick="window.location.href = 'registration.php';" class="btn btn-primary bg-voilet btn-block" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </section>

<?php include "includes/footer.php"; ?>

