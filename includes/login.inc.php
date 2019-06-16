<?php

if (isset($_POST['login-submit'])) {

    require 'conn.inc.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE user_email= :user_email;";
        $query = $pdo->prepare($sql);
        $query->bindParam(':user_email', $email);
        $query->execute();

        $result = $query->fetch();
        
        if ($result > 0) {
            $pwdCheck = password_verify($password, $result['user_password']);
            if ($pwdCheck == false) {
                header("Location: ../index.php?error=wrongpwd");
                exit();
            }
            else if ($pwdCheck == true) {
                session_start();
                $_SESSION['userName'] = $result['user_firstname'];
                $_SESSION['userSurname'] = $result['user_surname'];                
                $_SESSION['is_admin'] = $result['is_admin'];                

                header("Location: ../index.php?login=success");
                exit();
            }   
        }
        else {
            header("Location: ../index.php?error=nouser");
            exit(); 
        }
    }
}
else {
    header("Location: ../index.php");
    exit();
}