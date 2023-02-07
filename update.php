<?php
    // Include la connection
    require_once "pdo_connection.php";
    
    // on définie les variables avec initialisation avec empty
    $username = $password = $date_inscription = "";
    $username_err = $password_err = $date_inscription_err = "";
 
    // Processing des données quand le form est soumis
    if(isset($_POST["id"]) && !empty($_POST["id"])){
        // Get hidden input value
        $id = $_POST["id"];
        
        // validation username avec un regex pour les lettres
        $input_username = trim($_POST["nom"]);
        if(empty($input_username)){
            $username_err = "Svp entrer un username avec des lettres seulement.";
        } elseif(!filter_var($input_username, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $username_err = "Svp entrer un username valide.";
        } else{
            $username = $input_username;
        }
        
        // Validation de l'addresse
        $input_password = trim($_POST["password"]);
        if(empty($input_password)){
            $password_err = "Svp entrer un password.";     
        } else{
            $password = $input_password;
        }
        
        // Validattion de la date d'inscription
        $input_date_inscription = trim($_POST["date inscription"]);
        if(empty($input_date_inscription)){
            $date_inscription_err = "Svp entrer une date d'inscription.";     
        } else{
            $date_inscription = $input_date_inscription;
        }
        
        // véfification des erreurs avant de mettre sur la bd
        if(empty($username_err) && empty($password_err) && empty($date_inscription_err)){
            // préparation de la string d'insertion
            $sql = "UPDATE `utilisateurs` SET username=:username, password=:password, date_inscription=:date_inscription WHERE id=:id";
    
            if($stmt = $pdo->prepare($sql)){
                // Bind les variables à la string d'insertion préparée comme parameters
                $stmt->bindParam(":username", $param_username);
                $stmt->bindParam(":password", $param_password);
                $stmt->bindParam(":date_inscription", $param_date_inscription);
                $stmt->bindParam(":id", $param_id);
                
                //Set les parametres
                $param_username = $username;
                $param_password = $password;
                $param_date_inscription = $date_inscription;
                $param_id = $id;
                
                // exécution de la string préparée
                if($stmt->execute()){
                    // si réussite redirection
                    header("location: index.php");
                    exit();
                } else{
                    echo "Oops! Un problème est survenu. Svp réessayer plus tard.";
                }
            }
            // Close statement
            unset($stmt);
        }
        // Close connection
        unset($pdo);
    } else{
        // recherche du param id
        if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
            // get et trim le param 
            $id =  trim($_GET["id"]);
            
            // préparation de la string d'insertion
            $sql = "SELECT * FROM `utilisateurs WHERE id = :id";
            if($stmt = $pdo->prepare($sql)){
                //  Bind les variables à la string d'insertion préparée comme parameters
                $stmt->bindParam(":id", $param_id);
                
                // Set les parametres
                $param_id = $id;
                
                // exécution de la string préparée
                if($stmt->execute()){
                    if($stmt->rowCount() == 1){
                        /* on fetch la ligne insérée comme un associative array. le résultat est sur une seule ligne donc pas besoin de qhile loop */
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                        // on récupère les champs séparés
                        $username = $row["username"];
                        $password = $row["password"];
                        $date_inscription = $row["date_inscription"];
                    } else{
                        // si on a pas un id valide on donne l'erreur
                        header("location: error.php");
                        exit();
                    }
                    
                } else{
                    echo "Oops! Un problème est survenu. Svp réessayer plus tard.";
                }
            }
            // ferme le statement
            unset($stmt);
            // ferme la connection
            unset($pdo);
        }  else{
            // si on a pas un id valide on donne l'erreur
            header("location: error.php");
            exit();
        }
    }
?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>CRUD - MAJ</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            .wrapper{
                width: 600px;
                margin: 0 auto;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="mt-5">Mettre à jour</h2>
                        <p></p>
                        <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                            <div class="form-group">
                                <label>username</label>
                                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                                <span class="invalid-feedback"><?php echo $username_err;?></span>
                            </div>
                            <div class="form-group">
                                <label>password</label>
                                <textarea name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"><?php echo $password; ?></textarea>
                                <span class="invalid-feedback"><?php echo $password_err;?></span>
                            </div>
                            <div class="form-group">
                                <label>date_inscription</label>
                                <input type="text" name="date_inscription" class="form-control <?php echo (!empty($date_inscription_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $date_inscription; ?>">
                                <span class="invalid-feedback"><?php echo $date_inscription_err;?></span>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                            <input type="submit" class="btn btn-primary" value="Envoyer">
                            <a href="index.php" class="btn btn-secondary ml-2">Annuler</a>
                        </form>
                    </div>
                </div>        
            </div>
        </div>
    </body>
</html>