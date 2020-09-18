
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
          <div class="row">
            <div class="col-md-6">
            <hr>
            <?php 
                  
                  $query = "SELECT * FROM users WHERE user_role = 'subscriber'";
                  $select_all_users = mysqli_query($conn,$query);
                  $users_count = mysqli_num_rows($select_all_users);
                  
                  
            ?>
            <?php 
                  
                  $query = "SELECT * FROM users WHERE user_role = 'admin'";
                  $select_all_users_admin = mysqli_query($conn,$query);
                  $users_count_admin = mysqli_num_rows($select_all_users_admin);
                  
                  
            ?>
              <script type="text/javascript">
                  google.charts.load('current', {'packages':['bar']});
                  google.charts.setOnLoadCallback(drawChart);

                  function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                      ['Information', 'Count'],
                      ['Posts',<?php echo $post_count; ?>],
                      ['Comments', <?php echo $comment_count; ?>],
                      ['Categories', <?php echo $categories_count; ?>],
                      ['Portfolios', <?php echo $portfolios_count; ?>],
                      ['Users (Subscriber)', <?php echo $users_count; ?>]
                    ]);

                    var options = {
                      chart: {
                        title: 'Company Analysis',
                        subtitle: 'Posts, Comments, Categories and etc. : My Blog',
                      }
                    };

                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                    chart.draw(data, google.charts.Bar.convertOptions(options));
                  }
              </script>
              <div id="columnchart_material" style="width: auto; height: 400px;"></div>
            </div>
            <div class="col-md-6">
            <?php 
                  
                  $query = "SELECT * FROM comments WHERE comment_status = 'approved'";
                  $say_approved = mysqli_query($conn,$query);
                  $say_approved_count = mysqli_num_rows($say_approved);

                  $query2 = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
                  $say_unapproved = mysqli_query($conn,$query2);
                  $say_unapproved_count = mysqli_num_rows($say_unapproved);
                  
                  
            ?>
            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                  var data = google.visualization.arrayToDataTable([
                    ['Comment', 'Hours per Day'],
                    ['Approved',   <?php echo $say_approved_count; ?>],
                    ['Unapproved',   <?php echo $say_unapproved_count; ?>],
                  ]);

                  var options = {
                    title: 'Company Analysis'
                  };

                  var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                  chart.draw(data, options);
                }
            </script>
            <div id="piechart" style="width: auto; height: 600px;"></div>
            </div>
            
          </div>

<?php include "includes/admin_footer.php"; ?>