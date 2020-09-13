<?php  include "includes/header.php"; ?>
<?php ob_start(); ?>

	<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

	<!--==========================
    INSIDE HERO SECTION Section
============================-->
	<section class="page-image page-image-contact md-padding">
		<h1 class="text-white text-center">BLOG</h1>
	</section>

	<!--==========================
    Contact Section
============================-->
	<section id="blog" class="md-padding">
		<div class="container">
			<div class="row">


				<?php
						
						if(isset($_GET["look"])){
							$p_post_id = $_GET["look"];
							
						}

							$sql_query = "SELECT * FROM posts WHERE post_id = $p_post_id";
							$select_all_posts = mysqli_query($conn,$sql_query);
						
							while ($row = mysqli_fetch_assoc($select_all_posts)){
								$post_author = $row["post_author"];
								$post_title = $row["post_title"];
								$post_date = $row["post_date"];
								$post_text = $row["post_text"];
								$post_comment_number = $row["post_comment_number"];
								$post_image = $row["post_image"];

					?>

						<main id="main" class="col-md-8">
						<div class="blog">
							<div class="blog-img">
								<img class="img-fluid" src="./img/<?php echo $post_image; ?>" alt="">
							</div>
							<div class="blog-content">
								<ul class="blog-meta">
									<li><i class="fas fa-user"></i><?php echo $post_author; ?></li>
									<li><i class="fas fa-clock"></i><?php echo $post_date; ?></li>
									<li><i class="fas fa-comments"></i><?php echo $post_comment_number; ?></li>
								</ul>
								<h1><?php echo $post_title; ?></h1>
								<p><?php echo $post_text; ?></p>
							</div>
						<?php } ?>

						<!-- blog comments -->
						<div class="blog-comments">
							<h3>(1) Comments</h3>


								<?php
								
								$query = "SELECT * FROM comments WHERE comment_post_id = {$p_post_id} AND comment_status = 'approved'";
								$query .= "ORDER BY comment_id DESC";
								$select_comment_query = mysqli_query($conn,$query);
								while($row = mysqli_fetch_assoc($select_comment_query)){
									$comment_date = $row["comment_date"];
									$comment_author = $row["comment_author"];
									$comment_text = $row["comment_text"];
								
								?>


							<!-- comment -->
							<div class="media">
								<div class="media-body">
									<h4 class="media-heading"><?php echo $comment_author; ?><span class="time"><?php echo $comment_date ;?></span></h4>
									<p><?php echo $comment_text; ?></p>
								</div>
							</div>
							<!-- /comment -->

							<?php } ?>
							
							<?php

								if(isset($_POST["create_comment"])){
									$p_post_id = $_GET["look"];
									$comment_author = $_POST["comment_author"];
									$comment_email = $_POST["comment_email"];
									$comment_text = $_POST["comment_text"];
									
									if($comment_author == "" || empty($comment_author && $comment_email == "" || empty($comment_email && $comment_text == "" || empty($comment_text)))){
										echo "<div class='alert alert-danger' role='alert'>
												Please fill in all fields !
											</div>";
									}else{
									$query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_text, comment_status, comment_date)";
									$query .= "VALUES ($p_post_id, '{$comment_author}', '{$comment_email}', '{$comment_text}', 'unapproved', now())";
									$create_comment_query = mysqli_query($conn, $query);
									}
								}
							
							
							?>



						</div>
						<!-- /blog comments -->

						<!-- reply form -->
						<div class="reply-form">
							<h3>Leave A Comment</h3>
							<form action="" method="post">
								<input class="form-control mb-4" name="comment_author" type="text" placeholder="Name">
								<input class="form-control mb-4" name="comment_email" type="email" placeholder="Email">
								<textarea class="form-control mb-4" name="comment_text" row="5" placeholder="Add Your Commment"></textarea>
                                
								<button type="submit" name="create_comment" class="main-btn">Submit</button>
							</form>
						</div>
						<!-- /reply form -->
					</div>
				</main>
				<!-- /Main -->
				
				<?php include "includes/sidebar.php";?>
				
				
				
			</div>

		</div>
	</section>

	
<?php  include "includes/footer.php"; ?>


	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="js/lightbox-plus-jquery.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>