
<nav class="navbar navbar-expand-md bg-white navbar-dark border-bottom fixed-top">
    <a class="navbar-brand" href="index.php"><h3 class="mt-1">BLOGGIN SYSTEM</h3></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mr-auto">
		
		<li class='nav-item'>
                <a class='nav-link' href='index.php'>Home</a>
            </li>
          
            <li class='nav-item'>
                <a class='nav-link' href='admin'>Admin</a>
            </li>
            
            <?php 
            
                if(!isset($_SESSION['user_role'])){
                                
            ?>

            <li class='nav-item'>
                <a class='nav-link' href='registration.php'>Register</a>
            </li>
			
            <div class="form-group">
                <input type="button" onclick="window.location.href = 'registration.php';" class="btn btn-primary bg-voilet btn-block" value="Add New Post">
            </div>
                <?php } ?>
            <?php 
                if(isset($_SESSION['user_role'])){
                    if(isset($_GET['p_id'])){
                        $p_id = $_GET['p_id'];
                        echo "<li class='nav-item'>
                                <a class='nav-link' href='admin/posts.php?source=edit_post&edit_post_id=$p_id'>Edit Post</a>
                            </li>";
                    }
                }
            ?>

        </ul>

        
        <!-- Blog Search -->
        <form class="form-inline" action="search.php" method="post">
            <div class="input-group">
                <input type="text" name="searchText" class="form-control" placeholder="Blog Search">
                <div class="input-group-append">
                    <button class="btn btn-voilet" name="searchBtn" type="submit"><i class="fas fa-search"></i></button>  
                </div>
            </div>
        </form>
        <!-- End Blog Search -->

    </div>  
</nav>