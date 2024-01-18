<?php

function confirm_query($result){
    global $connection;
    if(!$result){
        die("Query Failed " . mysqli_error($connection));
    }
}

function addCategories(){
    global $connection;
    if(isset($_POST['add_cat'])){
        $cat_title = $_POST['cat_title'];
        if($cat_title == "" || empty($cat_title)){
            echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>This Field Should Not Be Empty.</div>";
        }else{
            $ins_cat_query = "INSERT INTO categories(cat_title) VALUES ('$cat_title')";
            $ins_query = mysqli_query($connection, $ins_cat_query);
            if(!$ins_query){
                die("Query Failed " . mysqli_error($connection));
            }
        }
    }
}

function findAllCategories(){
    global $connection;
    $sel_query = "SELECT * FROM categories";
    $select_all_categories = mysqli_query($connection, $sel_query);
    while($row = mysqli_fetch_assoc($select_all_categories)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>
                <td>" . ucfirst($cat_id) . "</td>
                <td>" . ucfirst($cat_title) . "</td>
                <td><a href='categories.php?edit=$cat_id'>Edit</a></td>
                <td><a href='categories.php?delete=$cat_id'>Delete</a></td>
            </tr>";
    }
}

function deleteCategories(){
    global $connection;
    if(isset($_GET['delete'])){
        $del_cat_id = $_GET['delete'];
        $del_query = "DELETE FROM categories WHERE cat_id = $del_cat_id";
        $del_query_run = mysqli_query($connection, $del_query);
        header("location: categories.php");
        if(!$del_query_run){
            die("Query Failed " . mysqli_error($connection));
        }
    }
}

function users_online(){   
    global $connection;
    $session = session_id();
    $time = time();
    $time_out_in_seconds = 05;
    $time_out = $time - $time_out_in_seconds;

    $query = "SELECT * FROM users_online WHERE session = '$session'";
    $run_query = mysqli_query($connection, $query);
    $count = mysqli_num_rows($run_query);

    if($count == NULL){
        mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES ('$session','$time')");
    }else{
        mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'");
    }

    $user_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");
    return $count_user_online = mysqli_num_rows($user_online_query);
}
    