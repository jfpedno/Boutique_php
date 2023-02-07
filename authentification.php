<?php
    session_start();
    include "themes/entete.php";
    require('connection.php'); 
   
    //var_dump($_POST['user']);
    //var_dump($_POST['pass']);
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $username = stripslashes($username);
    $password = stripslashes($password);
    //var_dump($username);
    //var_dump($password);
    $username = htmlentities($username);
    $password = htmlentities($password);

    $username = mysqli_real_escape_string($connect, $username);
    $password = mysqli_real_escape_string($connect, $password);
    $_SESSION['user'] = $username;
    $_SESSION['pass'] = $password;
    //var_dump($username);
    //var_dump($password);
    //var_dump($_SESSION['user']);
    //var_dump($_SESSION['pass']);
    $qry = "SELECT * FROM utilisateurs WHERE username ='$username' AND password ='$password' ";
    //var_dump($qry);
    $resultats = mysqli_query($connect, $qry);
    //var_dump($resultats);
    $row = mysqli_fetch_array($resultats, MYSQLI_ASSOC);
    //var_dump($row);
    $count = mysqli_num_rows($resultats);
    //var_dump($count);
?>  
    <!-- Preloader section
================================================== -->
<div class="preloader">

	<div class="sk-spinner sk-spinner-pulse"></div>

</div>
<!-- Navigation section
==================================================-->
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
                        ?>
                        <?php if($count == 1){
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

<?php
    if($count == 1)
    {
        echo '<section id="header" class="header-one">
                <div class="container">
                    <div class="row">
            
                        <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
                            <div class="header-thumb">
                                <h1 class="wow fadeIn" data-wow-delay="0.8s">Login Réussi</h1>
                                <h3 class="wow fadeInUp" data-wow-delay="1.6s"><a href="master_page_membres.php">Magasinage Membre</h3>
                            </div>
                        </div>
                    </div>
                </div>		
            </section>';
    }
    else
    {
        echo '<section id="header" class="header-one">
                <div class="container">
                    <div class="row">    
                        <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
                            <div class="header-thumb">
                                <h1 style="color:red;" class="wow fadeIn" data-wow-delay="0.8s">Login Échoué</h1>
                                <h3 class="wow fadeInUp" data-wow-delay="1.6s"><a href="login.php">Réessayer</a></h3>
                                <h3 class="wow fadeInUp" data-wow-delay="2.4s"><a href="master_page_non_membres.php">Magasinage Non-Membres</a></h3>
                            </div>
                        </div>
                    </div>
                </div>		
            </section>';
    }
    //var_dump($_SESSION['user']);
    //var_dump($_SESSION['pass']);
    include "themes/footer.php"; 
?>
 

