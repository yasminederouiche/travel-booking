<?php
require_once 'userController.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['id'], $_POST['email'], $_POST['pwd'])) {
        die("Données incomplètes.");
    }

    $userData = [
        'id' => $_POST['id'], // L'ID est juste utilisé pour identifier l'utilisateur, pas pour le modifier
        'email' => $_POST['email'],
        'pwd' => $_POST['pwd'], 
    ];

    $userController = new UserController();
    $userController->updateUser($userData);

    // Rediriger vers la liste des utilisateurs après mise à jour
    header("Location: ../View/FrontOffice/ListUsers.php");
    exit;
}
?>