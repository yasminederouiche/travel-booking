<?php

class Config
{   
    private static $pdo = null;

    public static function getConnexion()
    {
        if (!isset(self::$pdo)) {
            $servername = "localhost";
            $username = "root";
            $password = ""; // Laissez vide si vous utilisez XAMPP
            $dbname = "crud";

            try {
                self::$pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", 
                                     $username, 
                                     $password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

                echo "Connexion réussie !"; // Pour confirmer que la connexion est établie

            } catch (PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}

// Tester la connexion
Config::getConnexion();

?>

