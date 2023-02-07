<?php
        session_start();
    include "themes/entete.php";
    include "themes/menu.php";
    include "themes/header.php";
    require_once "pdo_connection.php";

    if(isset($_GET['id']) && !empty(trim($_GET['id'])))
    {
        $sql = "SELECT * FROM `librairie` WHERE id = :id";
        if($stmt = $pdo->prepare($sql))
        {
            $param_id = trim($_GET['id']);
            $stmt->bindParam(":id", $param_id);
            if($stmt->execute())
            {
                if($stmt->rowCount() == 1)
                {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);                  
                    $image = $row['image'];
                    $auteur = $row['auteur'];
                    $titre = $row['titre'];
                    $edition = $row['edition'];
                    $annee_edition = $row['annee_edition'];
                    $format = $row['format'];
                    $prix = $row['prix'];
                } 
                else 
                {
                    //si la base de donnée ne contient pas le ID recu
                    header("Location: error.php");
                    exit();
                }
            } 
            else 
            {
                echo "Un problème est survenu! Svp réessayer plus tard.";
            }
        }
        unset($stmt);   //close statement
        unset($pdo);    //close connexion
    } 
    else 
    {
        //si l'url ne contient pas de ID
        header("Location: error.php");
        exit();
    }
?>

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