<?php
    require 'conn.inc.php';

    if (isset($_POST['input'])) {
        $name = $_POST['input'];

        $query = $pdo->query("SELECT user_firstname FROM users ORDER BY user_firstname ASC");
        $users = $query->fetchAll();
        
        if (!empty($name)) {
            foreach ($users as $user) {
                if (strpos(strtolower($user['user_firstname']), $name) !== false) {
                    echo $user['user_firstname'] . '<br>';
                }
            }
        }
    }
