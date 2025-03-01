<?php
require_once "../Controller/UserC.php";

if (isset($_GET['id'])) {
    $userC = new UserC();
    $userC->deleteUser($_GET['id']);
    header("Location: listUsers.php");
}
?>
