<?php if(isset($_SESSION['user_role'])): ?>
    <div class="row">
        <div class="col-md-12 bg-voilet text-white pt-4 pb-4 text-center">
            <h4>Logged in as <?php echo $_SESSION['username']; ?></h4>
            <a href="includes/logout.php" style="border: 1px solid black;" class="btn btn-voilet">Logout</a>
        </div>
    </div>
<?php else: ?>
    <div class="row">
        <div class="col-md-12 bg-voilet text-white pt-4 pb-4 text-center">
            <h5>LOGIN HERE</h5>
            <form action="includes/login.php" method="post" class="form">
                <input type="text" name="username" placeholder="Enter Username" class="form-control">
                <input type="password" name="password" placeholder="Enter Password" class="form-control mt-1">
                <input type="submit" name="login" value="Login" class="btn btn-primary btn-block btn-black mt-1">
            </form>
        </div>
    </div>
<?php endif; ?>
<div class="row mt-3">
    <div class="col-md-12 bg-voilet text-white pt-4 pb-4 text-center">
        <h5>Blog Categories</h5>
        <ul type="none" class="pl-0">
            <?php
                $query = "SELECT * FROM categories";
                $select_categories_for_sidebar = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($select_categories_for_sidebar)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo "<li><a href='category.php?category_id=$cat_id'>" . ucfirst($cat_title) . "</a></li>";
                }
            ?>
        </ul>
    </div>
</div>
