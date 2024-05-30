<?php
session_start();
require_once 'connector.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $db = new DBConnection;

    $user = $db->getUserByEmailAndPassword($email, $password);

    if ($user) {
        $_SESSION["user_id"] = $user["user_id"];
        $_SESSION["user_name"] = $user["user_name"];
        $_SESSION["email"] = $user["email"];
        $_SESSION["role"] = $user["role"];

        header("Location: index.php");
        exit;
    } else {
        header("Location: login.php?error=1");
        echo ("please input correctly!");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>
