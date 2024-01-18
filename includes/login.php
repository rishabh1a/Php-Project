<?php

include "db.php";

session_start();

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