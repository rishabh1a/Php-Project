<?php 

    if(isset($_POST['checkBoxArray'])){
        foreach($_POST['checkBoxArray'] as $postValueId){
            $bulkOptions = $_POST['bulkOptions'];
            switch($bulkOptions){
                case 'Published':
                $query = "UPDATE posts SET post_status = '$bulkOptions' WHERE post_id = $postValueId";
                $run_query = mysqli_query($connection, $query);
                confirm_query($run_query);
                break;
                case 'Draft':
                $query = "UPDATE posts SET post_status = '$bulkOptions' WHERE post_id = $postValueId";
                $run_query = mysqli_query($connection, $query);
                confirm_query($run_query);
                break;
                case 'Delete':
                $query = "DELETE FROM posts WHERE post_id = $postValueId";
                $run_query = mysqli_query($connection, $query);
                confirm_query($run_query);
                break;
                case 'Clone':
                $query = "SELECT * FROM posts WHERE post_id = $postValueId";
                $sel_query = mysqli_query($connection, $query);
                confirm_query($sel_query);
                while($row = mysqli_fetch_assoc($sel_query)){
                    $post_title = $row['post_title'];
                    $post_category_id = $row['post_category_id'];
                    $post_status = $row['post_status'];
                    $post_author = $row['post_author'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_content = $row['post_content'];
                    $post_date = $row['post_date'];
                }
                $ins_query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) VALUES ('$post_category_id','$post_title','$post_author',now(), '$post_image','$post_content','$post_tags','$post_status')";
                $ins_query_run = mysqli_query($connection, $ins_query);
                confirm_query($ins_query_run);
                break;
            }
        }
    }

?>

<h2 class="text-center">All Posts</h2><hr>
<div class="row">
    <div class="col-md-12">
    <?php if($_SESSION['user_role'] === 'Admin'): ?>
    <form action="" method="post">
        <table class="table table-bordered table-hover">

            <div class="col-md-4" id="bulkOptionContainer" style="padding:0;">
                <select name="bulkOptions" class="form-control" id="">
                    <option value="">Select Options</option>
                    <option value="Published">Publish</option>
                    <option value="Draft">Draft</option>
                    <option value="Delete">Delete</option>
                    <option value="Clone">Clone</option>
                </select>
            </div>
            <div class="col-md-4">
                <input type="submit" class="btn btn-success" value="Apply">
                <a href="posts.php?source=add_post" class="btn btn-primary bg-voilet">Add New Post</a>
            </div><br><br><br>
    <?php endif; ?>
    <table class="table table-bordered table-hover">

           
            <thead>
                <tr>
                    <th><input type="checkbox" id="selectAllBoxes"></th>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Tags</th>
                    <th>Content</th>
                    <th>Comments</th>
                    <th>Date</th>
                    <th>View Post</th>
                    <?php if($_SESSION['user_role'] === 'Admin'): ?>
                    <th>Edit</th>
                    <th>Delete</th>
                    <?php endif; ?>
                    <th>Views</th>
                    
                </tr>
            </thead>
            <tbody>

                <?php 
                    // Print all the posts
                    $sel_all_posts = "SELECT * FROM posts ORDER BY post_id DESC";
                    $sel_posts = mysqli_query($connection, $sel_all_posts);
                    while($row = mysqli_fetch_assoc($sel_posts)){
                        $post_id = $row['post_id'];
                        $post_author = $row['post_author'];
                        $post_title = $row['post_title'];
                        $post_category_id = $row['post_category_id'];
                        $post_status = $row['post_status'];
                        $post_image = $row['post_image'];
                        $post_tags = $row['post_tags'];
                        $post_content = $row['post_content'];
                        $post_comment_count = $row['post_comment_count'];
                        $post_date = $row['post_date'];
                        $post_views = $row['post_views_count'];

                        echo "<tr>";
                    ?>
                    
                            <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>
                    
                    <?php   echo "<td class='text-center'>$post_id</td>
                                <td class='text-center'>$post_author</td>
                                <td class='text-center'>$post_title</td>";
                        
                        $sel_cat = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                        $sel_cat_run = mysqli_query($connection, $sel_cat);
                        while($row = mysqli_fetch_assoc($sel_cat_run)){
                            $post_cat_title = $row['cat_title'];
                        

                        echo "<td class='text-center'>". ucfirst($post_cat_title). "</td>";
                        }       
                        echo "<td class='text-center'>$post_status</td>
                                <td class='text-center'><img src='../img/$post_image' alt='reload page' width='70' /></td>
                                <td class='text-center'>$post_tags</td>
                                <td class='text-center'>$post_content</td>
                                <td class='text-center'>$post_comment_count</td>
                                <td class='text-center'>$post_date</td>
                                <td class='text-center'><a href='../post.php?p_id=$post_id'>View Post</a></td>";
                            if($_SESSION['user_role'] === 'Admin'):
                        
                             echo   "<td class='text-center'><a href='posts.php?source=edit_post&edit_post_id=$post_id'>Edit</a></td>
                                <td class='text-center'><a onClick=\"javascript:return confirm('Are you sure you want to delete');\" href='posts.php?delete_post_id=$post_id'>Delete</a></td>";
                            endif;
                               echo "<td class='text-center'><a href='posts.php?reset_views=$post_id'>$post_views</a></td>
                            </tr>";


                    }

                    // Delete Post form all posts
                    if(isset($_GET['delete_post_id'])){
                        $del_post_id = $_GET['delete_post_id'];
                        $del_query = "DELETE FROM posts WHERE post_id = $del_post_id";
                        $run_del_query = mysqli_query($connection, $del_query);
                        confirm_query($run_del_query);
                        header("location: posts.php");
                    }        
                    
                    // Reset Views For A Single Post
                    if(isset($_GET['reset_views'])){
                        $the_post_id = $_GET['reset_views'];
                        $update_query = "UPDATE posts SET post_views_count = 0 WHERE post_id = $the_post_id";
                        $run_update_query = mysqli_query($connection, $update_query);
                        confirm_query($run_update_query);
                        header("location: posts.php");
                    }        
                
                ?>

            </tbody>
        </table>
    </form>
    </div>
</div>