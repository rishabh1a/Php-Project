<h2 class="text-center">All Comments</h2><hr>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Author</th>
                    <th>Comment</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>In Response To</th>
                    <th>Date</th>
                    <th>Approve</th>
                    <th>UnApprove</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                    // Print all the posts
                    $sel_all_comments = "SELECT * FROM comments";
                    $sel_comments = mysqli_query($connection, $sel_all_comments);
                    while($row = mysqli_fetch_assoc($sel_comments)){
                        $comment_id = $row['comment_id'];
                        $comment_post_id = $row['comment_post_id'];
                        $comment_author = $row['comment_author'];
                        $comment_content = $row['comment_content'];
                        $comment_email = $row['comment_email'];
                        $comment_status = $row['comment_status'];
                        $comment_date = $row['comment_date'];

                        echo "<tr>
                                <td class='text-center'>$comment_id</td>
                                <td class='text-center'>$comment_author</td>
                                <td class='text-center'>$comment_content</td>";
                        
                        echo "<td class='text-center'>$comment_email</td>";
                                
                        echo "<td class='text-center'>$comment_status</td>";

                        $sel_post = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                        $sel_post_query = mysqli_query($connection, $sel_post);
                        while($row_sel_query = mysqli_fetch_assoc($sel_post_query)){
                            $post_id = $row_sel_query['post_id'];
                            $post_title = $row_sel_query['post_title'];

                            echo "<td class='text-center'><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                        }

                        echo"<td class='text-center'>$comment_date</td>
                                <td class='text-center'><a href='comments.php?approve=$comment_id'>Approve</a></td>
                                <td class='text-center'><a href='comments.php?unapprove=$comment_id'>UnApprove</a></td>
                                <td class='text-center'><a href='comments.php?delete_comment_id=$comment_id'>Delete</a></td>
                            </tr>";

                    }

                    // Approve Comment form all Comments
                    if(isset($_GET['approve'])){
                        $approve_comment_id = $_GET['approve'];
                        $approve_query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $approve_comment_id";
                        $run_approve_query = mysqli_query($connection, $approve_query);
                        header("location: comments.php");
                        confirm_query($run_approve_query);
                    }       

                    // Unapprove Comment form all Comments
                    if(isset($_GET['unapprove'])){
                        $unapprove_comment_id = $_GET['unapprove'];
                        $unapprove_query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $unapprove_comment_id";
                        $run_unapprove_query = mysqli_query($connection, $unapprove_query);
                        header("location: comments.php");
                        confirm_query($run_unapprove_query);
                    }       

                    // Delete Comment form all Comments
                    if(isset($_GET['delete_comment_id'])){
                        $del_comment_id = $_GET['delete_comment_id'];
                        $del_query = "DELETE FROM comments WHERE comment_id = $del_comment_id";
                        $run_del_query = mysqli_query($connection, $del_query);
                        header("location: comments.php");
                        confirm_query($run_del_query);
                    }                    


                
                ?>

            </tbody>
        </table>
    </div>
</div>