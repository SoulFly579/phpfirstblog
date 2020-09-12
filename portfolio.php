<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

	<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

<!--==========================
    INSIDE HERO SECTION Section
============================-->	
<section class="page-image page-image-portfolio md-padding">
    <h1 class="text-white text-center">PORTFOLIO</h1>
</section>
    
<!--==========================
    PORTFOLIO Section
============================-->
<section id="portfolio" class="md-padding">
    <div class="container">

			<div class="row text-center">
				<div class="col-md-4 offset-md-4">
					<div class="section-header">
						<h2 class="title">Our Works</h2>
					</div>
				</div>
			</div>
        <div class="row">



            <?php 
            
            
            $sql_query = "SELECT * FROM portfolios";
            $select_all_portfolios = mysqli_query($conn, $sql_query);
            
            while($row = mysqli_fetch_assoc($select_all_portfolios)){

                $portfolio_id = $row["portfolio_id"];
                $portfolio_name = $row["portfolio_name"];
                $portfolio_category = $row["portfolio_category"];
                $portfolio_img_sm = $row["portfolio_img_sm"];
                $portfolio_img_bg = $row["portfolio_img_bg"];

            ?>

                      
            <div class="col-md-4 col-sm-6 portfolio-item">
                <a href="img/<?php echo $portfolio_img_bg; ?>" class="portfolio-link" data-lightbox="web-design" data-title="<?php echo $portfolio_name; ?>" >
                    <div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <i class="fas fa-search fa-3x"></i>
                        </div>
                    </div>
                    <img class="img-fluid" src="img/<?php echo $portfolio_img_sm; ?>" alt="" style="width:360px; height:260px;">
                </a>
                <div class="portfolio-caption">
                    <h4><?php echo $portfolio_name; ?></h4>
                    <p class="text-muted"><?php echo $portfolio_category; ?></p>
                </div>
            </div>
            
        
            <?php } ?>




            
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