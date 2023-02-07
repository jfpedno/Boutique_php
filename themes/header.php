<!-- Header section après menu 
================================================== -->
<section id="header" class="header-one">
	<div class="container">
		<div class="row">

			<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
          <div class="header-thumb">
              <h1 class="wow fadeIn" data-wow-delay="0.6s">TP-W34 Phase #1</h1>
              <h3 class="wow fadeInUp login" data-wow-delay="1.2s">Intégration Bootstrap Template</h3>
              <?php if(isset($_SESSION['user']) && ($_SESSION['pass'])) 
              {
                echo '<h3 class="wow fadeInUp" data-wow-delay="1.8s"><a href="master_page_membres.php">Magasinage Membres cliquer ici</a></h3>';
              }else{
                echo '<h3 class="wow fadeInUp" data-wow-delay="1.8s"><a href="master_page_non_membres.php">Magasinage Non-Membres cliquer ici</a></h3>';
              }
              echo '<h3 class="wow fadeInUp" data-wow-delay="2.4s">';
              date_default_timezone_set('America/Toronto');
              echo "Date et heure locale: <br>";
              echo date('l jS \of F Y h:i:s A');
              '</h3>'; ?>
          </div>
			</div>
		</div>
	</div>		
</section>