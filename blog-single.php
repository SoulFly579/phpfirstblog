<?php  include "includes/header.php"; ?>

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

							<!-- comment -->
							<div class="media">
								<div class="media-body">
									<h4 class="media-heading">Joe Doe<span class="time">2 min ago</span></h4>
									<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium. Nisl purus in mollis nunc sed. Nunc non blandit massa enim nec.</p>
								</div>
							</div>
							<!-- /comment -->

						</div>
						<!-- /blog comments -->

						<!-- reply form -->
						<div class="reply-form">
							<h3>Leave A Comment</h3>
							<form>
								<input class="form-control mb-4" type="text" placeholder="Name">
								<input class="form-control mb-4" type="email" placeholder="Email">
								<textarea class="form-control mb-4" row="5" placeholder="Add Your Commment"></textarea>
                                
								<button type="submit" class="main-btn">Submit</button>
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