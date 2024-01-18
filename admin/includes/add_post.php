<?php
    if(isset($_POST['add_post'])){
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_category_id = $_POST['post_category_id'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');

        move_uploaded_file($post_image_temp, "../img/$post_image");

        $query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) VALUES ('$post_category_id', '$post_title', '$post_author', now(),'$post_image', '$post_content', '$post_tags', '$post_status')";

        $add_post_query = mysqli_query($connection, $query);
        confirm_query($add_post_query);
        $edit_post_id = mysqli_insert_id($connection);

        echo "<p class='bg-success'>Post Created. <a href='../post.php?p_id=$edit_post_id'>View Post</a> or <a href='posts.php'>Edit More Posts</a></p>";

    }

?>

<h2 class="text-center">Add Post</h2><hr>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title" required="required">
    </div>
    <div class="form-group">
        <label for="post_category">Post Category</label>
        <select name="post_category_id" id="post_category_id" class="form-control" required="required">
            <?php 
                $sel_query = "SELECT * FROM categories";
                $sel_query_run = mysqli_query($connection, $sel_query);
                confirm_query($sel_query_run);
                while($row = mysqli_fetch_assoc($sel_query_run)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo "<option value='$cat_id'>$cat_title</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author" required="required">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select name="post_status" id="post_status" class="form-control" required="required">
            <option value="">Select Option</option>
            <option value='Published'>Published</option>
            <option value='Draft'>Draft</option>
        </select>
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name="post_image" required="required">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" required="required">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" col="30" rows="10" required="required"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary bg-voilet" name="add_post" value="Publish Post">
    </div>
</form>