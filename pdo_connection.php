<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'jfpedno');
    define('DB_PASSWORD', '123');
    define('DB_NAME', 'ma2db');

    try{
        //connection string
        $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
        //defini le mode d'erreur pdo sur exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("ERREUR: Connexion impossible <br>" . $e->getMessage());
    }
?>
