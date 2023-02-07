<?php
    session_start(); 
    include "themes/entete.php";
    include "themes/menu.php";  
    require('connection.php'); 
    $_SESSION['user'];
    $_SESSION['pass'];
    //var_dump($_SESSION);
    $status="";
    if(isset($_POST['code']) && $_POST['code']!= "")
    {
       $code = $_POST['code'];
       //var_dump($_POST);
       $resultat = mysqli_query($connect,"SELECT * FROM `librairie` WHERE `code` = '$code'");
       $row = mysqli_fetch_assoc($resultat);
       $code = $row['code'];
       //var_dump($row);
       $produit = $row['produit'];
       $annee = $row['annee'];   
       $auteur = $row['auteur'];
       $annee_edition = $row['annee_edition'];
       $edition = $row['edition'];
       $format = $row['format'];
       $illustration = $row['illustration'];
       $image = $row['image'];
       $periodicite = $row['periodicite'];
       $prix = $row['prix'];
       $redacteur_chef = $row['redacteur_chef'];
       $titre = $row['titre'];
       $numero = $row['numero'];

       $panierArray = array(
        $code=>array(
            'produit'=>$produit,
            'code'=>$code,
            'annee'=>$annee,
            'auteur'=>$auteur,
            'annee_edition'=>$annee_edition,
            'edition'=>$edition,
            'format'=>$format,
            'illustration'=>$illustration,
            'image'=>$image,
            'periodicite'=>$periodicite,          
            'prix'=>$prix,
            'redacteur_chef'=>$redacteur_chef,
            'titre'=>$titre,        
            'numero'=>$numero,            
            'quantite'=>1,
            )       
        );

        //var_dump($panierArray);
        if(empty($_SESSION["boutique_panier"]))
        {
            $_SESSION["boutique_panier"] = $panierArray;
            $status = "<div class='text-center-panier thick3'>Le produit a été ajouté au panier!</div>";
        } 
        else 
        {
            $array_keys = array_keys($_SESSION["boutique_panier"]);
            if(in_array($code, $array_keys))
            {
                $status = "<div class='text-center-panier thick3'>Le produit est déjà dans votre panier!</div>";
            } 
            else 
            {
                $_SESSION["boutique_panier"] = array_merge($_SESSION["boutique_panier"],$panierArray);
                $status = "<div class='text-center-panier thick3'>Le produit a été ajouté au panier!</div>";
            }
        }
    }
?>
<section id="portfolio">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">           
               <div class="iso-section wow fadeInUp" data-wow-delay="0.1s">
                  <ul class="filter-wrapper clearfix">
                     <li><a href="tout.php"><i class="ion-ios-book ion-icon-big wow fadeInUp thick" data-wow-delay="2.2s"></i><p>TOUT</p></a></li>
                     <li><a href="romans.php"><i class="ion-ios-book ion-icon-big wow fadeInUp thick" data-wow-delay="2.0s"></i><p>ROMANS</p></a></li>
                     <li><a href="essais.php"><i class="ion-ios-book ion-icon-big wow fadeInUp thick" data-wow-delay="1.7s"></i><p>ESSAIS</p></a></li>
                     <li><a href="revues.php"><i class="ion-ios-book ion-icon-big wow fadeInUp thick" data-wow-delay="1.3s"></i><p>REVUES</p></a></li>
                     <li><a href="jeunesse.php"><i class="ion-ios-book ion-icon-big wow fadeInUp thick" data-wow-delay="0.8s"></i><p>JEUNESSE</p></a></li>
                     <li><a href="bande_dessinees.php"><i class="ion-ios-book ion-icon-big wow fadeInUp thick3" data-wow-delay="0.2s"></i><p>BANDES DESSINÉES</p></a></li>
                  </ul>
                </div>  
            </div>
        </div>
    </div>
</section>
    <div class="background-librairie">
        <h3 class="thick text-center">Librairie virtuelle</h3>
        <div class="thick text-center"><i class="ion-ios-book ion-icon-big thick3"></i><p class="thick2">BANDES DESSINÉES</p></li></div>
        <div class="cart-icon">
                    <a class="thick" href="panier.php"><img src="livres-images/cart-icon2.png"/>Panier<span><?php //echo $panier_compte; ?></span></a>
                </div>
        <?php
            if(!empty($_SESSION["boutique_panier"])){
                $panier_compte = count(array_keys($_SESSION["boutique_panier"]));            
        ?>
                <div class="margin-panier-count">
                    <a class="thick" href="panier.php">Panier <span><?php echo $panier_compte; ?> élement(s)</span></a>
                </div>  
        <?php
            }
        $resultat = mysqli_query($connect,"SELECT * FROM `librairie` WHERE produit LIKE 'bande_dessinee'");
        while($row = mysqli_fetch_assoc($resultat))
        {
            echo 
            "<div class='iso-box col-md-4 col-sm-6'>
                <form action='' method='post'>
                    <input type='hidden' name='code' value=".$row['code'].">
                    <div class='image'><a href='read.php'><img src='".$row['image']."'></a></div>  
                    <div class='thick2'>".$row['auteur']."</div>
                    <div class='thick'>".$row['titre']."</div>
                    <div class='thick'>".$row['edition']."</div>
                    <div class='thick'>".$row['annee_edition']."</div>
                    <div class='thick'>".$row['illustration']."</div>
                    <div class='thick'>".$row['prix']."$</div>
                    <button type='submit' class='btn btn-success thick'>Ajouter au panier</button>
                </form>
            </div>";
        }
        mysqli_close($connect);
        ?>  
        <div style="clear:both;"></div>
        <div class="message_box" style="margin: 10px 0px;">
            <?php echo $status; ?>
        </div>       
    </div>
</body>
<?php include "themes/footer.php"; ?>