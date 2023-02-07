<?php
    session_start();
    include "themes/entete.php";
    include "themes/menu.php";
    include "themes/header.php";

    if(isset($_GET['id']) && !empty(trim($_GET['id'])))
    {
        require_once "pdo_connection.php";
        $sql = "SELECT * FROM `romans` WHERE id = :id";
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

<?php include "themes/footer.php"; ?>