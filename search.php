<?php  include "includes/header.php"; ?>

	<!-- Navigation -->
<?php include "includes/navigation.php"; ?>
<?php include "fonksiyonlar.php"; ?>


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

                    if(isset($_POST["searchbtn"])){
                        $search = $_POST["search"];
                        $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ORDER BY post_id DESC";
                        $search_query = mysqli_query($conn, $query);
                        if(!$search_query){
                            die("QUERY FAILED". mysqli_error($conn));
                        }

                        $search_count = mysqli_num_rows($search_query);
                        if($search_count == 0){
                            header("Location: 404.php");
                        }else{
                           
                                
                                while ($row = mysqli_fetch_assoc($search_query)){
                                    $post_id = $row["post_id"];
                                    $post_author = $row["post_author"];
                                    $post_title = $row["post_title"];
                                    $post_date = $row["post_date"];
                                    $post_text = substr($row["post_text"],0,90);
                                    $post_hit = $row["post_hit"];
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
                                            <li><i class="fas fa-eye"></i><span class="writer"><?php echo $post_hit;?></span></li>
                                        </ul>
                                        <h3><?php echo $post_title; ?></h3>
                                        <p><?php echo $post_text; ?>...</p>
                                        <a href="blog/<?=seo($row["post_title"]).'/'."$post_id"; ?>">Read More</a>
                                    </div>
                                </div>
                            </div>

                            <?php	}	
                        }
                    }

                    ?>






                        
					</div>
				</main>
				
				<?php include "includes/sidebar.php"; ?>
				
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