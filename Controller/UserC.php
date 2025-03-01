<?php 
require_once "../Controller/UserC.php";

$message = ""; // Variable pour stocker les messages

// Vérification si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
        $userC = new UserC();

        try {
            $userC->addUser($_POST['email'], $_POST['pwd']);
            header("Location: listUsers.php"); // Redirection après ajout
            exit();
        } catch (Exception $e) {
            $message = "Erreur : " . $e->getMessage();
        }
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <h2>Ajouter un utilisateur</h2>

    <?php if (!empty($message)) : ?>
        <p style="color: red;"><?= $message ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Email :</label>
        <input type="email" name="email" required>
        <label>Mot de passe :</label>
        <input type="password" name="pwd" required>
        <input type="submit" value="Ajouter">
    </form>

    <a href="listUsers.php">Retour à la liste</a>
</body>
</html>
