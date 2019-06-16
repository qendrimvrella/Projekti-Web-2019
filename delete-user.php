<?php

require './includes/conn.inc.php';

if(!(isset($_SESSION['userName']) && $_SESSION['is_admin'] == 1)){
    header("Location: index.php");
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $query = $pdo->prepare("DELETE FROM users WHERE id = :id");
    $query->execute(['id' => $userId]);

    header("Location: ./users.php?delete=success");
}else {
    header("Location: ./index.php");
}
