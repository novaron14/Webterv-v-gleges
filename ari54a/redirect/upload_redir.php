<?php
require "../obj/User.php";

session_start();

$_SESSION['msg'] = [];

$target_dir = "../img/profilepics/";
$imageFileType = strtolower(pathinfo(basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION));
$target_file = $target_dir . $_SESSION['user']->getName() . "." . $imageFileType;

if (isset($_POST["upload"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check === false) {
        array_push($_SESSION['msg'], "A feltöltött fájl nem képfájl. ");
    } else {
        if ($_FILES["fileToUpload"]["size"] > 2000000) {
            array_push($_SESSION['msg'], "A kép mérete legfeljebb 2 MB lehet! ");
        }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            array_push($_SESSION['msg'], "Támogatott formátumok: JPG, PNG. ");
        }
    }
}

if(count($_SESSION['msg']) === 0) move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
header("Location: ../profile.php");