<?php
    session_start();
    include "themes/entete.php";
    include "themes/menu.php";
    //include "themes/header.php";
    require('connection.php'); 
    $status = ""; //initialise le status a 0 pour la gestion des messages
    //var_dump($status);
    if(isset($_POST["action"]) && $_POST["action"] == "supprimer")
    {   //var_dump($_POST["action"]);
        if(!empty($_SESSION["boutique_panier"]))
        {   //var_dump($_SESSION["boutique_panier"]);
            foreach($_SESSION["boutique_panier"] as $key => $value)
            {
                if($_POST["code"] == $key)
                {   //var_dump($_POST["code"]);
                    unset($_SESSION["boutique_panier"][$key]); //retire le produit de la session
                    //var_dump($_SESSION["boutique_panier"]);
                    $status = "<div class='text-center-panier thick22' style='color:red;'>Le produit à été supprimé du panier!</div>"; //message pour le status
                }
                if(empty($_SESSION["boutique_panier"]))
                {   //var_dump($_SESSION["boutique_panier"]);
                    unset($_SESSION["boutique_panier"]);
                    //var_dump($_SESSION["boutique_panier"]);
                    $status = "";
                }
            }            
        }
    }

    if(isset($_POST["action"]) && $_POST["action"] == "change")
    {   //var_dump($_POST["action"]);
        foreach($_SESSION["boutique_panier"] as &$value)
        {   //var_dump($_SESSION["boutique_panier"]);
            if($value["code"] === $_POST["code"])
            {   //var_dump($value["code"]);
                //var_dump($_POST["code"]);
                $value["quantite"] = $_POST["quantite"];
                //var_dump($value["quantite"]);
                break;
            }
        }
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

<div class="">
    <h3 class='text-center-panier thick3'>Panier</h3>
    <?php   //style="width:1000px; margin:50 auto;"
        if(!empty($_SESSION["boutique_panier"]))
        {   //var_dump($_SESSION["boutique_panier"]);
            $panier_compte = count(array_keys($_SESSION["boutique_panier"]));
            //var_dump($panier_compte);                         
    ?>
        <div class='panier_div'>
            <a href=""></a>
        </div>
    <?php
        } 
        ?>
        <div class="">
            <?php
                if(isset($_SESSION["boutique_panier"]))
                {   //var_dump($_SESSION["boutique_panier"]);
                    $prix_total = 0;                  
            ?>
                    <table class="table caption-top">
                        <tbody >
                            <tr>
                                <td>Couverture</td>
                                <td>Titre / Auteur(e)</td>
                                <td>quantité</td>
                                <td>prix</td>
                                <td>total</td>
                            </tr>
                            <?php foreach($_SESSION["boutique_panier"] as $produit)
                            {   //var_dump($_SESSION);
                            ?>
                            <tr>
                                <td><img src="<?php echo $produit['image']; ?>" widtn="10" height="50"/></td>
                                <td><?php echo $produit["titre"]; ?><br>
                                    <?php echo $produit["auteur"]; ?><br>
                                <form method="post" action="">
                                    <input type="hidden" name="code" value="<?php echo $produit['code']; ?>">
                                    <input type="hidden" name="action" value="supprimer">
                                    <button type="submit" class="btn btn-danger">Retirer du panier</button>
                                </form>
                                </td>
                                <td><?php //var_dump($produit);?>
                                    <form method="post" action="">
                                    <input type="hidden" name="code" value="<?php echo $produit['code']; ?>">
                                    <input type="hidden" name="action" value="change">
                                        <select name="quantite" class="quantite" onchange="this.form.submit()">
                                            <option <?php if($produit["quantite"]==1) echo "selected"; ?> value="1">1</option>
                                            <option <?php if($produit["quantite"]==2) echo "selected"; ?> value="2">2</option>
                                            <option <?php if($produit["quantite"]==3) echo "selected"; ?> value="3">3</option>
                                            <option <?php if($produit["quantite"]==4) echo "selected"; ?> value="4">4</option>
                                            <option <?php if($produit["quantite"]==5) echo "selected"; ?> value="5">5</option>
                                        </select>
                                    </form>
                                </td>
                                <td><?php echo $produit["prix"]."$"; ?></td>
                                <td><?php echo ($produit["prix"] * $produit["quantite"])."$"; ?></td>
                            </tr>
                            <?php $prix_total += ($produit["prix"] * $produit["quantite"]);
                            }
                            ?>
                            <tr>
                                <td colspan="5" align="right">
                                    <strong>TOTAL: <?php echo $prix_total."$"; ?></strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php 
                        }
                        else
                        {
                            echo "<h3 class='text-center-panier thick3'>Votre panier est vide!</h3>";
                        }
                    ?>
        </div>
        <div style="clear:both;"></div>
        <div class="message_box" style="margin: 10px 0px;">
        <?php echo $status; ?>
        </div>
        <br>
        <a class='icon-center thick3' href="master_page_membres.php">Retour à la librairie</a>
</div>
    <?php include "themes/footer.php"; ?>