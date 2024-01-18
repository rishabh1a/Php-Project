<h2 class="text-center">All Users</h2><hr>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Firstname</th>
                    <th class="text-center">Lastname</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Current Role</th>
                    <th class="text-center" colspan='2'>Change User Role</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                    // Print all the users
                    $sel_all_users = "SELECT * FROM users";
                    $sel_users = mysqli_query($connection, $sel_all_users);
                    while($row = mysqli_fetch_assoc($sel_users)){
                        $user_id = $row['user_id'];
                        $user_name = $row['user_name'];
                        $user_firstname = $row['user_firstname'];
                        $user_lastname = $row['user_lastname'];
                        $user_email = $row['user_email'];
                        $user_role = $row['user_role'];
                        $user_image = $row['user_image'];

                        echo "<tr>
                                <td class='text-center'>$user_id</td>
                                <td class='text-center'>$user_name</td>";
                        echo "<td class='text-center'>" . ucfirst($user_firstname) . "</td>";                        
                        echo "<td class='text-center'>" . ucfirst($user_lastname) . "</td> 
                                <td class='text-center'>$user_email</td>
                                <td class='text-center'><img src='../img/$user_image' alt='reload page' width='25' /></td>";
                        echo "<td class='text-center'>" . ucfirst($user_role) . "</td>
                        <td class='text-center'><a href='users.php?change_to_admin=$user_id'>Admin</a></td>
                        <td class='text-center'><a href='users.php?change_to_sub=$user_id'>Subscriber</a></td>
                        <td class='text-center'><a href='users.php?source=edit_user&edit_user_id=$user_id'>Edit</a></td>
                            <td class='text-center'><a href='users.php?delete_user_id=$user_id'>Delete</a></td>
                            </tr>";

                    }

                    // Delete User form all users
                    if(isset($_GET['delete_user_id'])){
                        $del_user_id = $_GET['delete_user_id'];
                        $del_query = "DELETE FROM users WHERE user_id = $del_user_id";
                        $run_del_query = mysqli_query($connection, $del_query);
                        header("location: users.php");
                        confirm_query($run_del_query);
                    }              
                
                    // Change to Admin
                    if(isset($_GET['change_to_admin'])){
                        $change_to_admin_id = $_GET['change_to_admin'];
                        $change_query = "UPDATE users SET user_role = 'Admin' WHERE user_id = $change_to_admin_id";
                        $run_query = mysqli_query($connection, $change_query);
                        header("location: users.php");
                        confirm_query($run_query);
                    }       

                    // Change to subscriber
                    if(isset($_GET['change_to_sub'])){
                        $change_to_sub_id = $_GET['change_to_sub'];
                        $change_query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = $change_to_sub_id";
                        $run_query = mysqli_query($connection, $change_query);
                        header("location: users.php");
                        confirm_query($run_query);
                    }       
                ?>

            </tbody>
        </table>
    </div>
</div>