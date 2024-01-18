<form action="" method="post" class="form">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>

        <?php 
            //Edit category and update
            if(isset($_GET['edit'])){
                $edit_cat_id = $_GET['edit'];
                $edit_query = "SELECT * FROM categories WHERE cat_id = $edit_cat_id";
                $edit_query_run = mysqli_query($connection, $edit_query);
                while($row = mysqli_fetch_assoc($edit_query_run)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
        ?>  

        <input type="text" name="cat_title" id="cat_title" value="<?php if(isset($cat_title)){echo $cat_title; }?>" class="form-control btn1">

        <?php 
            
                }
            }
            
            // Update Category
            if(isset($_POST['update_cat'])){
                $up_cat_title = $_POST['cat_title'];
                $up_query = "UPDATE categories SET cat_title='$up_cat_title' WHERE cat_id = $edit_cat_id";
                $up_query_run = mysqli_query($connection, $up_query);
                header("location:categories.php");
                if(!$up_query_run){
                    die("Query Failed " . mysqli_error($connection));
                }
            }
        ?>
    </div>
    <div class="form-group">
        <input type="submit" name="update_cat" value="Update Category" class="btn btn-primary bg-voilet btn1">
    </div>
</form>