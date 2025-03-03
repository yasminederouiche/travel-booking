<?php
require_once 'userController.php';

// Vérifier si les données sont envoyées via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vérification de la validité des données (email, mot de passe)
    if (!isset($_POST['email'], $_POST['pwd'])) {
        die("Données manquantes.");
    }

    // Préparer les données de l'utilisateur
    $userData = [
        'email' => $_POST['email'],
        'pwd' => $_POST['pwd']
    ];

    // Créer une instance du contrôleur
    $userController = new UserController();

    // Ajouter l'utilisateur
    $userController->addUser($userData);

    // Rediriger après l'ajout (par exemple vers la liste des utilisateurs)
    header("Location: ../View/FrontOffice/ListUsers.php");
    exit;
}
?>