<?php
require_once 'userController.php';

// Vérifier si un ID est passé
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    
    $userController = new UserController();
    $userController->deleteUser($id);
    
    // Rediriger après suppression
    header("Location: ../View/FrontOffice/ListUsers.php");
    exit();
} else {
    echo "ID utilisateur non spécifié.";
}
?>