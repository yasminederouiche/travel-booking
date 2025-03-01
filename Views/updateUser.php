<?php
require_once "../Controller/UserC.php";
$userC = new UserC();
$user = $userC->getUserById($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userC->updateUser($_GET['id'], $_POST['email'], $_POST['pwd']);
    header("Location: listUsers.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier un utilisateur</title>
</head>
<body>
    <h2>Modifier un utilisateur</h2>
    <form method="POST">
        <label>Email:</label>
        <input type="email" name="email" value="<?= $user['email'] ?>" required>
        <label>Mot de passe:</label>
        <input type="password" name="pwd" required>
        <input type="submit" value="Modifier">
    </form>
</body>
</html>
