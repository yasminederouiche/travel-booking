<?php 
require_once "../Controller/UserC.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userC = new UserC();
    $userC->addUser($_POST['email'], $_POST['pwd']);
    header("Location: listUsers.php"); // Redirection après ajout
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <h2>Ajouter un utilisateur</h2>
    <form method="POST">
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Mot de passe:</label>
        <input type="password" name="pwd" required>
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>

