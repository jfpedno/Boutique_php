<?php
   session_start(); 
   include "themes/entete.php";
   include "themes/menu.php";
   require('connection.php');  
   //require('authentification.php'); 
 
if(!isset($_SESSION['user']) || !isset($_SESSION['pass'])) 
{
   header('Location: login.php');

  //echo '<li><a href=login.php.php">LOGIN</a></li>';
                                                               
}  
?>

<!-- Portfolio section
================================================== -->
<section id="portfolio">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-sm-12">           
               <div class="iso-section wow fadeInUp" data-wow-delay="0.4s">
                  <ul class="filter-wrapper clearfix">
                     <li><a href="tout.php"><i class="ion-ios-book ion-icon-big"></i><p>TOUT</p></a></li>
                     <li><a href="romans.php"><i class="ion-ios-book ion-icon-big"></i><p>ROMANS</p></a></li>
                     <li><a href="essais.php"><i class="ion-ios-book ion-icon-big"></i><p>ESSAIS</p></a></li>
                     <li><a href="revues.php"><i class="ion-ios-book ion-icon-big"></i><p>MAGAZINES</p></a></li>
                     <li><a href="jeunesse.php"><i class="ion-ios-book ion-icon-big"></i><p>JEUNESSE</p></a></li>
                     <li><a href="bande_dessinees.php"><i class="ion-ios-book ion-icon-big"></i><p>BANDES DESSINÉES</p></a></li>
                  </ul>
               </div>
         </div>
      </div>
   </div>
</section>
</body>
<?php include "themes/footer.php"; ?>