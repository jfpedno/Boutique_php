<?php
// Include la connection
require_once "pdo_connection.php";
 
// on définie les variables avec initialisation avec empty
$username = $password = $date_inscription = "";
$username_err = $password_err = $salary_err = "";
 
// Processing des données quand le form est soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // validation username avec un regex pour les lettres
    $input_username = trim($_POST["username"]);
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
        $password_err = "Svp entrer une password.";     
    } else{
        $password = $input_password;
    }
    
    // Validattion de la date d'inscription
    $input_date_inscription = trim($_POST["date_inscription"]);
    if(empty($input_date_inscription)){
        $date_inscription_err = "Svp entrer une date d'inscription.";     
    } else{
        $date_inscription = $input_date_inscription;
    }
    
    // véfification des erreurs avant de mettre sur la bd
    if(empty($username_err) && empty($password_err) && empty($date_inscription_err)){
        // préparation de la string d'insertion
        $sql = "INSERT INTO `utilisateurs` (username, password, date_inscription) VALUES (:username, :password, :date_inscription)";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind les variables à la string d'insertion préparée comme parameters
            $stmt->bindParam(":username", $param_username);
            $stmt->bindParam(":password", $param_password);
            $stmt->bindParam(":date_inscription", $param_date_inscription);
            
            // Set les parametres
            $param_username = $username;
            $param_password = $password;
            $param_date_inscription = $date_inscription;
            // exécution de la string préparée
            if($stmt->execute()){
                //si réussite redirection
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Un problème est survenu. Svp réessayer plus tard.";
            }
        }    
        // ferme le statement
        unset($stmt);
    }
    // ferme la connection
    unset($pdo);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>CRUD - Ajouter</title>
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
                        <h2 class="mt-5">Ajouter</h2>
                        <p></p>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                                <label>date inscription</label>
                                <input type="text" name="date_inscription" class="form-control <?php echo (!empty($date_inscription_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $date_inscription; ?>">
                                <span class="invalid-feedback"><?php echo $date_inscription_err;?></span>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Ajouter">
                            <a href="index.php" class="btn btn-secondary ml-2">Annuler</a>
                        </form>
                    </div>
                </div>        
            </div>
        </div>
    </body>
</html>