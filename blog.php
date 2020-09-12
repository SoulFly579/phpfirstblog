<?php  include "includes/header.php"; ?>

	<!-- Navigation -->
<?php include "includes/navigation.php"; ?>


	<!--==========================
    INSIDE HERO SECTION Section
============================-->
	<section class="page-image page-image-blog md-padding">
		<h1 class="text-white text-center">BLOG</h1>
	</section>

	<!--==========================
    Contact Section
============================-->
	<section id="blog" class="md-padding">
		<div class="container">
			<div class="row">
				<main id="main" class="col-md-8">
					<div class="row">


					<?php

						$sql_query = "SELECT * FROM posts ORDER BY post_id DESC";
						$select_all_posts = mysqli_query($conn,$sql_query);
						
						while ($row = mysqli_fetch_assoc($select_all_posts)){
							$post_id = $row["post_id"];
							$post_author = $row["post_author"];
							$post_title = $row["post_title"];
							$post_date = $row["post_date"];
							$post_text = substr($row["post_text"],0,90);
							$post_comment_number = $row["post_comment_number"];
							$post_image = $row["post_image"];

					?>

					<div class="col-md-6">
						<div class="blog">
							<div class="blog-img">
								<img src="img/<?php echo $post_image; ?>" style= "width:300px; height:200px;" class="img-fluid">
							</div>
							<div class="blog-content">
								<ul class="blog-meta">
									<li><i class="fas fa-users"></i><span class="writer"><?php echo $post_author; ?></span></li>
									<li><i class="fas fa-clock"></i><span class="writer"><?php echo $post_date; ?></span></li>
									<li><i class="fas fa-comments"></i><span class="writer"><?php echo $post_comment_number;?></span></li>
								</ul>
								<h3><?php echo $post_title; ?></h3>
								<p><?php echo $post_text; ?>...</p>
								<a href="blog-single.php?look=<?php echo $post_id; ?>">Read More</a>
							</div>
						</div>
					</div>

					<?php	}	?>





                        
					</div>
				</main>
				
				<?php include "includes/sidebar.php"; ?>
				
			</div>
			<div class="row">
				<nav aria-label="Page navigation example">
					<ul class="pagination justify-content-center">
						<li class="page-item disabled">
						<a class="page-link" href="#" tabindex="-1">Previous</a>
						</li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item">
						<a class="page-link" href="#">Next</a>
						</li>
					</ul>
				</nav>
			</div>

		</div>
	</section>

<?php include "includes/footer.php"; ?>

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