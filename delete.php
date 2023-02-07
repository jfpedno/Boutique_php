<?php
    if(isset($_POST['id']) && !empty(trim($_POST['id'])))
    {
        require_once "pdo_connection.php";

        $sql = "DELETE FROM `librairie` WHERE id = :id";

        if($stmt = $pdo->prepare($sql)){

            $param_id = trim($_POST['id']);

            //instruction preparer
            $stmt->bindParam(":id", $param_id);
            
            if($stmt->execute())
            {
                //Produit supprimé redirection sur la page master_page_membres
                header("Location: master_page_membres.php");
                exit();
            } 
            else 
            {
                echo "Un problème est survenu! Svp réessayer plus tard.";
            }
        }
        unset($stmt);   //ferme le statement
        unset($pdo);    //ferme la connexion
    } 
    else 
    {
        //verifie si il y a un id retourné du get sur la bd
        if(empty(trim($_GET['id'])))
        {
            //redirection
            header("Location: error.php");
            exit();
        }
    }
?>