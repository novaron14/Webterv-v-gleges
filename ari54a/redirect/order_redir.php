<?php

require "../obj/User.php";
require "../obj/Product.php";
session_start();

$product_input_names = array('klasszik', 'ultramagyar', 'csibész', 'szittya', 'harcos', 'poszter');

$img = 1;
foreach ($product_input_names as $product_input_name) {
    if (isset($_GET[$product_input_name]) && $_GET[$product_input_name] != 0) {
        $price = ucfirst($product_input_name) == "Poszter" ? 2000 : 199;
        $exists = false;
        for ($i = 0; $i < count($_SESSION['cart']) && $_SESSION['cart'] != []; $i++) {
            if ($_SESSION['cart'][$i]->getName() == ucfirst($product_input_name)) {
                $_SESSION['cart'][$i]->addQuantity($_GET[$product_input_name] * ($price == 199 ? 24 : 1));
                $exists = true;
            }
        }
        if (!$exists) array_push($_SESSION['cart'], new Product(ucfirst($product_input_name), $price, $_GET[$product_input_name] * ($price == 199 ? 24 : 1), "img/t" . $img . "_c.png"));
    }
    if ($img === 5) $img = 'p';
    else $img++;
}

//törlés:
for ($i = 0; $i < count($_SESSION['cart']); $i++) {
    $name = $_SESSION['cart'][$i]->getName();
    if (isset($_GET['delete' . $name])) unset($_SESSION['cart'][$i]);
}
//üres objektumok kiszedése a tömbből:
$temp = array_values($_SESSION['cart']);
$_SESSION['cart'] = $temp;

header("Location: ../index.php");