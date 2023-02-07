<?php 
    include "themes/entete.php";
    include "themes/menu.php";
    session_start();
    session_unset();
    session_destroy();
?>
<!-- Header section
================================================== -->
<section id="header" class="header-one">
	<div class="container">
		<div class="row">

			<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
          <div class="header-thumb">
              <h1 class="wow fadeIn" data-wow-delay="0.6s">TP-W34 Phase #1</h1>
              <h3 class="wow fadeInUp logout" data-wow-delay="1.2s">Vous vous êtes déconnecté!</h3>
              <h3 class="wow fadeInUp logout" data-wow-delay="1.8s">MERCI ET À BIENTÔT!</h3>
              <?php
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
</body>
<?php
    include "themes/footer.php"; 
?>