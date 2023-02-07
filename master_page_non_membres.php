<?php 
   session_start();
   include "themes/entete.php"; 
   include "themes/menu.php"; 
   require('connection.php');

   if(isset($_SESSION['user']) && isset($_SESSION['pass'])) 
{
   header('Location: magasinage_membres.php');

  //echo '<li><a href=login.php.php">LOGIN</a></li>';
                                                               
}   
?>
<!-- Portfolio section
================================================== -->
      <!--<div class="row">
         <div class="col-md-12 col-sm-12">-->           
               <!-- iso section -->
<section id="portfolio">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-sm-12">           
               <div class="iso-section wow fadeInUp" data-wow-delay="0.4s">
                  <h1> À SUIVRE À PARTIR D'ICI POUR LES NON-MEMBRES... TOUTES LES FONCTIONNALITÉS SONT POUR LES MEMBRES</h1>
                  <ul class="filter-wrapper clearfix">
                     <li><a href="tout.php"><i class="ion-ios-book ion-icon-big"></i><p>TOUT</p></a></li>
                     <li><a href="romans.php"><i class="ion-ios-book ion-icon-big"></i><p>ROMANS</p></a></li>
                     <li><a href="essais.php"><i class="ion-ios-book ion-icon-big"></i><p>ESSAIS</p></a></li>
                     <li><a href="revues.php"><i class="ion-ios-book ion-icon-big"></i><p>MAGAZINES</p></a></li>
                     <li><a href="jeunesse.php"><i class="ion-ios-book ion-icon-big"></i><p>JEUNESSE</p></a></li>
                     <li><a href="bande_dessinees.php"><i class="ion-ios-book ion-icon-big"></i><p>BANDES DESSINÉES</p></a></li>
                  </ul>
                        <!-- iso box section -->
                        <div class="iso-box-section wow fadeInUp" data-wow-delay="1s">
                           <div class="iso-box-wrapper col4-iso-box">
                              <div class="iso-box photoshop branding col-md-4 col-sm-6">
                                 <div class="portfolio-thumb">
                                    <img src="images/portfolio-img1.jpg" class="img-responsive" alt="Portfolio">
                                       <div class="portfolio-overlay">
                                          <div class="portfolio-item">
                                                <a href="a_suivre.php"><i class="fa fa-link"></i></a>
                                                <h2>TOUT</h2>
                                             </div>
                                       </div>
                                 </div>
                              </div>
                              <div class="iso-box graphic template col-md-4 col-sm-6">
                                 <div class="portfolio-thumb">
                                    <img src="images/portfolio-img2.jpg" class="img-responsive" alt="Portfolio">
                                       <div class="portfolio-overlay">
                                          <div class="portfolio-item">
                                                <a href="a_suivre.php"><i class="fa fa-link"></i></a>
                                                <h2>Project Two</h2>
                                             </div>
                                       </div>
                                 </div>
                              </div>
                              <div class="iso-box template graphic col-md-4 col-sm-6">
                                 <div class="portfolio-thumb">
                                    <img src="images/portfolio-img3.jpg" class="img-responsive" alt="Portfolio">
                                       <div class="portfolio-overlay">
                                          <div class="portfolio-item">
                                                <a href="a_suivre.php"><i class="fa fa-link"></i></a>
                                                <h2>Project Three</h2>
                                             </div>
                                       </div>
                                 </div>
                              </div>
                              <div class="iso-box graphic template col-md-4 col-sm-6">
                                 <div class="portfolio-thumb">
                                    <img src="images/portfolio-img4.jpg" class="img-responsive" alt="Portfolio">
                                       <div class="portfolio-overlay">
                                          <div class="portfolio-item">
                                                <a href="a_suivre.php"><i class="fa fa-link"></i></a>
                                                <h2>Project Four</h2>
                                             </div>
                                       </div>
                                 </div>
                              </div>
                              <div class="iso-box photoshop branding col-md-4 col-sm-6">
                                 <div class="portfolio-thumb">
                                    <img src="images/portfolio-img5.jpg" class="img-responsive" alt="Portfolio">
                                       <div class="portfolio-overlay">
                                          <div class="portfolio-item">
                                                <a href="a_suivre.php"><i class="fa fa-link"></i></a>
                                                <h2>Project Five</h2>
                                             </div>
                                       </div>
                                 </div>
                              </div>
                              <div class="iso-box graphic branding col-md-4 col-sm-6">
                                 <div class="portfolio-thumb">
                                    <img src="images/portfolio-img6.jpg" class="img-responsive" alt="Portfolio">
                                       <div class="portfolio-overlay">
                                          <div class="portfolio-item">
                                                <a href="a_suivre.php"><i class="fa fa-link"></i></a>
                                                <h2>Project Six</h2>
                                          </div>
                                       </div>
                                 </div>
                              </div>
                           </div>
                        </div>
      </div>
   </div>
      <!--</div>
   </div>-->
</section>
<?php include "themes/footer.php"; ?>