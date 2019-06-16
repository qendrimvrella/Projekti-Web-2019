<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=projektidb', 'root', '');
} catch (PDOException $e) {
    die("DB Error");
}