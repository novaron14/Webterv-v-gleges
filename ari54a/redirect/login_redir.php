<?php

require "../obj/User.php";
require "../obj/UserDatabaseHandler.php";
session_start();

$_SESSION['msg'] = [];

$correct_password = "";
if (isset($_POST["login"])) {
    $file = fopen("../data/users.csv", "r");
    if ($file === false) {
        array_push($_SESSION['msg'],"Ismeretlen hiba lépett fel a bejelentkezés során.");
    }
    while (($line = fgets($file)) !== false) {
        if (explode(";", $line)[0] === $_POST["email"]) {
            $correct_password = explode(";", $line)[1];
            break;
        }
    }
    if ($correct_password === $_POST["password"]) {
        $temp = new UserDatabaseHandler();
        $_SESSION['user'] = $temp->load($_POST["email"]);
        $_SESSION['cart'] = [];
        unset($temp);
        header("Location: ../index.php");
    }
    else {
        array_push( $_SESSION['msg'],"Hibás felhasználónév vagy jelszó!");
        header("Location: ../login.php");
    }
}

