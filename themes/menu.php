<!-- Preloader section
================================================== -->
<!--<body>-->
<div class="preloader">

	<div class="sk-spinner sk-spinner-pulse"></div>

</div>
<!-- Navigation section
================================================== -->
<div class="nav-container">
   <nav class="nav-inner transparent">
      <div class="navbar">
         <div class="container">
            <div class="row">
              <div class="brand">
                <a href="index.php"><i class="icon ion-home ion-icon-big"></i></a>
              </div>
              <div class="navicon">
                <div class="menu-container">
                  <div class="circle dark inline">
                    <i class="icon ion-navicon"></i>
                  </div>
                  <div class="list-menu">
                    <i class="icon ion-close-round close-iframe"></i>
                    <div class="intro-inner">
                      <ul id="nav-menu">
                        <li><a href="index.php">ACCUEIL</a></li>
                        <?php if(isset($_SESSION['user']) && ($_SESSION['pass'])) 
                        {
                          echo '<li><a href="logout.php">LOGOUT</a></li>';
                          //session_unset();                                                                
                        }else{
                          echo '<li><a href="login.php">LOGIN</a></li>';
                        }
                         if(isset($_SESSION['user']) && ($_SESSION['pass'])) {
                        echo '<li><a href="master_page_membres.php">Magasinage Membres</a></li>';
                        }else{
                        echo '<li><a href="master_page_non_membres.php">Magasinage Non-Membres</a></li>';
                        }
                        ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
         </div>
      </div>
   </nav>
</div>