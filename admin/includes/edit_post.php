<?php 
    if(isset($_GET['edit_post_id'])){
        $edit_post_id = $_GET['edit_post_id'];
    }
        $sel_all_posts = "SELECT * FROM posts WHERE post_id = $edit_post_id";
        $sel_posts = mysqli_query($connection, $sel_all_posts);
        while($row = mysqli_fetch_assoc($sel_posts)){
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_content = $row['post_content'];
            $post_comment_count = $row['post_comment_count'];
            $post_date = $row['post_date'];
        }
    
    
    if(isset($_POST['update_post'])){
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_category_id = $_POST['post_category_id'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        
        move_uploaded_file($post_image_temp, "../img/$post_image");

        if(empty($post_image)){
            $query = "SELECT * FROM posts WHERE post_id = $edit_post_id";
            $sel_img = mysqli_query($connection, $query);
            while($sel_row = mysqli_fetch_assoc($sel_img)){
                $post_image = $sel_row['post_image'];
            }
        }

        $update_query = "UPDATE posts SET post_title='$post_title', post_category_id='$post_category_id', post_date=now(), post_author='$post_author', post_status='$post_status', post_tags='$post_tags', post_content='$post_content', post_image= '$post_image' WHERE post_id = '$edit_post_id'";
        $update_query_run = mysqli_query($connection, $update_query);
        confirm_query($update_query_run);
        echo "<p class='bg-success'>Post Updated. <a href='../post.php?p_id=$edit_post_id'>View Post</a> or <a href='posts.php'>Edit More Posts</a></p>";

    }


?>

<h2 class="text-center">Edit Post</h2><hr>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" value="<?php echo $post_title; ?>" class="form-control" name="post_title">
    </div>
    <div class="form-group">
        <label for="post_category_id">Post Category</label>
        <select name="post_category_id" id="post_category_id" class="form-control">
            <option value="<?php echo $post_category_id; ?>">
                <?php 
                    $sel_query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                    $sel_query_run = mysqli_query($connection, $sel_query);
                    confirm_query($sel_query_run);
                    while($row = mysqli_fetch_assoc($sel_query_run)){
                        echo $row['cat_title'];
                    }
                ?>
            </option>
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
        <input type="text" value="<?php echo $post_author; ?>" class="form-control" name="post_author">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select name="post_status" id="post_status" class="form-control">
            <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
            <?php 
                if($post_status == "Published"){
                    echo "<option value='Draft'>Draft</option>";
                }else{
                    echo "<option value='Published'>Published</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label><br>
        <img src="../img/<?php echo $post_image; ?>" width="80" alt="">
        <input type="file" class="form-control" name="post_image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" value="<?php echo $post_tags; ?>" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" col="30" rows="10"><?php echo $post_content; ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" name="update_post" value="Update Post">
    </div>
</form>