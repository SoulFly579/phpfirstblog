<?php ob_start(); ?>
<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

    <?php include "includes/admin_sidebar.php"; ?>


    <div id="content-wrapper">
        <div class="container-fluid">
            <h1>Welcome to Admin Page</h1>
            <hr>

            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Post Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Date</th>
                        <th>Hits</th>
                        <th>Image</th>
                        <th>Text</th>
                        <th>Tags</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                if(isset($_POST["add_post"])){
                    
                    $post_title = $_POST["post_title"];
                    $post_category = $_POST["post_category"];
                    $post_author = $_POST["post_author"];
                    $post_tags = $_POST["post_tags"];
                    $post_text = $_POST["post_text"];
                    $post_date = date("d-m-y");
                    $post_image = $_FILES["post_image"]["name"];
                    $post_image_temp = $_FILES["post_image"]["tmp_name"];

                    move_uploaded_file($post_image_temp, "../img/$post_image");

                    $query = "INSERT INTO posts (post_title, post_category, post_author, post_tags, post_date,  post_image, post_text, post_hit)";
                    $query .= "VALUES ('{$post_title}', '{$post_category}', '{$post_author}', '{$post_tags}', now(), '{$post_image}', '{$post_text}', '0')";
                    $create_post_query = mysqli_query($conn, $query);
                    header("Location: posts.php");

                }
                ?>

                <?php
                    if(isset($_POST["edit_post"])){
                        $post_title = $_POST["post_title"];
                        $post_category = $_POST["post_category"];
                        $post_author = $_POST["post_author"];
                        $post_text = $_POST["post_text"];
                        $post_tags = $_POST["post_tags"];

                        $post_image = $_FILES["post_image"]["name"];
                        $post_image_temp = $_FILES["post_image"]["tmp_name"];
    
                        move_uploaded_file($post_image_temp, "../img/$post_image");

                        if(empty($post_image)){
                            $query3 = "SELECT * FROM posts WHERE post_id = '$_POST[post_id]' ";
                            $select_image = mysqli_query($conn,$query3);
                            while($row = mysqli_fetch_array($select_image)){
                                $post_image = $row["post_image"];
                            }
                        }
                        $sql_query2 = "UPDATE posts SET post_title = '$post_title', post_category = '$post_category', post_author = '$post_author', post_text = '$post_text', post_tags = '$post_tags', post_image = '$post_image' WHERE post_id = '$_POST[post_id]' ";
                        $edit_post_query = mysqli_query($conn,$sql_query2);
                        header("Location: posts.php");

                    }
                
                
                
                ?>


                <?php
                if(isset($_GET["delete"])){

                    $delete_post_id = $_GET["delete"];

                    $query2 = "DELETE FROM posts WHERE post_id = {$delete_post_id}";

                    $delete_post_query = mysqli_query($conn, $query2);
                    header("Location: posts.php");
                };
        
        
                ?>


                <?php
                
                $sql_query = "SELECT * FROM posts ORDER BY post_id DESC";
                $select_all_posts = mysqli_query($conn, $sql_query);
                $k=1;
                while($row = mysqli_fetch_assoc($select_all_posts)){
                    $post_id = $row["post_id"];
                    $post_category = $row["post_category"];
                    $post_author = $row["post_author"];
                    $post_date = $row["post_date"];
                    $post_title = $row["post_title"];

                    $query = "SELECT * FROM comments WHERE comment_post_id = {$post_id} AND comment_status = 'approved'";
                    $select_comment_query = mysqli_query($conn,$query);
                    $post_comment = mysqli_num_rows($select_comment_query);

                    $post_image = $row["post_image"];
                    $post_text = substr($row["post_text"],0,50);
                    $post_tags = $row["post_tags"];


                    echo "<tr>
                    <td>{$post_id}</td>
                    <td>{$post_title}</td>
                    <td>{$post_category}</td>
                    <td>{$post_author}</td>
                    <td>{$post_date}</td>
                    <td>{$post_comment}</td>
                    <td><img width=250px src='../img/{$post_image}'></td>
                    <td>{$post_text}...</td>
                    <td>{$post_tags}</td>
                    <td>
                        <div class='dropdown'>
                            <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Actions
                            </button>
                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                <a class='dropdown-item' data-toggle='modal' data-target='#edit_modal$k' href='#'>Edit</a>
                                <div class='dropdown-divider'></div>
                                <a class='dropdown-item' href='posts.php?delete={$post_id}'>Delete</a>
                                <div class='dropdown-divider'></div>
                                <a class='dropdown-item' data-toggle='modal' data-target='#add_modal'>Add</a>
                            </div>
                        </div>
                    </td>
                </tr>";
                ?>              
                
                    <div id="edit_modal<?php echo $k;?>" class="modal fade">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="post_title">Post Title</label>
                                            <input type="text" class="form-control" name="post_title" value="<?php echo $post_title; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="post_category">Post Category</label>
                                            <select style="margin-left:15px; padding:5px;" class="form-group" name="post_category">
                                            <?php
                                                
                                                $edit_category_sql = "SELECT * FROM categories";
                                                $edit_category_run = mysqli_query($conn,$edit_category_sql);
                                                while($edit_category_row = mysqli_fetch_assoc($edit_category_run)){
                                                    $edited_category = $edit_category_row["category_name"];

                                                    if($edit_category_row["category_name"] ==  $row["post_category"]){
                                                        echo "<option selected>$edited_category</option>";
                                                    }else{
                                                        echo "<option>$edited_category</option>";
                                                    }
                                                }

                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="post_author">Post Author</label>
                                            <input type="text" class="form-control" name="post_author" value="<?php echo $post_author; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="post_image">Post Image</label>
                                            <img width="100px" src="../img/<?php echo $post_image; ?>">
                                            <input type="file" class="form-control" name="post_image">
                                        </div>
                                        <div class="form-group">
                                            <label for="post_tags">Post Tags</label>
                                            <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="post_text">Post Text</label>
                                            <textarea class="ckeditor" id="ckeditor1" name="post_text"><?php echo $row["post_text"]; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" name="post_id" value="<?php echo $row["post_id"]; ?>">
                                            <input type="submit" class="btn btn-primary" name="edit_post" value="Edit Post">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php $k++; } ?>
                </tbody>
            </table>

            <div id="add_modal" class="modal fade">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Posts</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="post_title">Post Title</label>
                                    <input type="text" class="form-control" name="post_title">
                                </div>
                                <div class="form-group">
                                    <label for="post_category">Post Category</label>
                                    <select style="margin-left:15px; padding:5px;" class="form-group" name="post_category">
                                    <?php
                                        
                                        $edit_category_sql = "SELECT * FROM categories";
                                        $edit_category_run = mysqli_query($conn,$edit_category_sql);
                                        while($edit_category_row = mysqli_fetch_assoc($edit_category_run)){
                                            $edited_category = $edit_category_row["category_name"];
                                            echo "<option>$edited_category</option>";
                                        }

                                    ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="post_author">Post Author</label>
                                    <input type="text" class="form-control" name="post_author">
                                </div>

                                <div class="form-group">
                                    <label for="post_image">Post Image</label>
                                    <input type="file" class="form-control" name="post_image">
                                </div>
                                <div class="form-group">
                                    <label for="post_tags">Post Tags</label>
                                    <input type="text" class="form-control" name="post_tags">
                                </div>
                                <div class="form-group">
                                    <label for="post_text">Post Text</label>
                                    <textarea class="ckeditor" id="ckeditor1" name="post_text"></textarea>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="post_id" value="">
                                    <input type="submit" class="btn btn-primary" name="add_post" value="Add Post">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            



            <?php include "includes/admin_footer.php"; ?>