
<?php include "includes/admin_header.php" ;?>

    <div id="wrapper">

<?php include "includes/admin_sidebar.php" ; ?>

      <div id="content-wrapper">

        <div class="container-fluid">
          <h1>Welcome to <small><?php echo $_SESSION["username"]; ?></small></h1>
          <hr>
            <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="far fa-clipboard"></i>
                  </div>

                  <?php 
                  
                  $query = "SELECT *FROM posts";
                  $select_all_post = mysqli_query($conn,$query);
                  $post_count = mysqli_num_rows($select_all_post);
                  echo "<div class='mr-5'>{$post_count} Posts!</div>";
                  
                  
                  ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="posts.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="far fa-comment"></i>
                  </div>
                  <?php 
                  
                  $query = "SELECT *FROM comments";
                  $select_all_comment = mysqli_query($conn,$query);
                  $comment_count = mysqli_num_rows($select_all_comment);
                  echo "<div class='mr-5'>{$comment_count} Comments!</div>";
                  
                  
                  ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="comments.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-list-ul"></i>
                  </div>
                  <?php 
                  
                  $query = "SELECT *FROM categories";
                  $select_all_categories = mysqli_query($conn,$query);
                  $categories_count = mysqli_num_rows($select_all_categories);
                  echo "<div class='mr-5'>{$categories_count} Categories!</div>";
                  
                  
                  ?>
                </div>

                <a class="card-footer text-white clearfix small z-1" href="categories.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="far fa-file-image"></i>
                  </div>
                  <?php 
                  
                  $query = "SELECT *FROM portfolios";
                  $select_all_portfolios = mysqli_query($conn,$query);
                  $portfolios_count = mysqli_num_rows($select_all_portfolios);
                  echo "<div class='mr-5'>{$portfolios_count} Portfolios!</div>";
                  
                  
                  ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="portfolios.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>

<?php include "includes/admin_footer.php"; ?>