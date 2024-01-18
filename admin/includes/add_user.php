<?php
    if(isset($_POST['create_user'])){
        $user_name = $_POST['user_name'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_role = $_POST['user_role'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];

        move_uploaded_file($user_image_temp, "../img/$user_image");

        $query = "SELECT randSalt FROM users";
        $select_randSalt_query = mysqli_query($connection, $query);
        if(!$select_randSalt_query){
            die("Query Failed " . mysqli_error($connection));
        }
        $row = mysqli_fetch_array($select_randSalt_query);
        $salt = $row['randSalt'];
        // encrypt password
        $hash_password = crypt($user_password, $salt);

        $query = "INSERT INTO users ( user_name, user_password, user_firstname, user_lastname, user_email, user_image, user_role) VALUES ('$user_name', '$hash_password', '$user_firstname','$user_lastname', '$user_email', '$user_image', '$user_role')";

        $add_user_query = mysqli_query($connection, $query);

        confirm_query($add_user_query);

        echo "User Created: " . "<a href='users.php'>View All Users</a>";

    }

?>

<h2 class="text-center">Add User</h2><hr>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_name">Username</label>
        <input type="text" class="form-control" name="user_name">
    </div>
    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="text" class="form-control" name="user_email">
    </div>
    <div class="form-group" style="position: relative;">
        <label for="user_password">Password</label>
        <input type="password" id="passwordInput" class="form-control" name="user_password">
        <input type="checkbox" class="checkbox-inline" style="position:absolute;top:2.5rem;right:0.5rem;zoom:1.7;" onclick="showPassword()">
    </div>
    <div class="form-group">
        <label for="user_image">Image</label>
        <input type="file" class="form-control" name="user_image">
    </div>
    <div class="form-group">
        <label for="user_role">Role</label>
        <select name="user_role" id="user_role" class="form-control">
            <option value="select_role">--Select Role--</option>
            <option value="Admin">Admin</option>
            <option value="Subscriber">Subscriber</option>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary bg-voilet" name="create_user" value="Add User">
    </div>
</form>