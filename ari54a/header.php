<?php
require "obj/User.php";
require "obj/UserDatabaseHandler.php";
session_start();

$pagename = basename($_SERVER["SCRIPT_FILENAME"], '.php');
switch($pagename){
    case 'index':
        $title = "Főoldal";
        break;
    case 'login':
        $title = "Bejelentkezés";
        break;
    case 'register':
        $title = "Regisztráció";
        break;
    case 'order':
        if(!isset($_SESSION['user']) ) header("Location: login.php");
        $title = "Megrendelés";
        break;
    case 'profile':
        if(!isset($_SESSION['user']) ) header("Location: login.php");
        $title = "Profilbeállítások";
        break;
    //termékek:
    case 'klasszik':
        $title = "Klasszik";
        break;
    case 'ultra':
        $title = "Ultramagyar";
        break;
    case 'csibesz':
        $title = "Csibész";
        break;
    case 'szittya':
        $title = "Szittya";
        break;
    case 'harcos':
        $title = "Harcos";
        break;
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Turul Energiaital | <?php echo $title; ?></title>
    <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
    <link rel="stylesheet" href="./css/common.css">
    <?php
    if($pagename == "index") echo "<link rel=\"stylesheet\" href=\"./css/webshop.css\">";
    else if($pagename == "order" || $pagename == "profile" || $pagename == "login" || $pagename == "register")
        echo "<link rel=\"stylesheet\" href=\"css/register-login.css\">";
    else {
        echo "<link rel=\"stylesheet\" href=\"./css/products.css\">";
        echo "<style>
        body {
            padding-top: 91px;
        }
        @media(max-width: 830px){
            body {
                padding-top: 165px;
            }
        }
        @media(max-width: 560px){
            body {
                padding-top: 0px;
            }
        }
        </style>";
    }
    echo "<link rel=\"stylesheet\" href=\"./css/webshop.css\">";
    //nyomtatási kép:
    if($pagename == "harcos") echo " <link rel=\"stylesheet\" href=\"./css/print.css\">";
    ?>
    <link rel="stylesheet" href="./css/responsive.css">
</head>
<body>

<header>
    <div class="container">
        <img id="logo" src="img/turul_logo.svg" alt="Turul Energiaital logó">
        <nav>
            <ul>
                <li><a href="index.php" <?php echo $pagename == "index" ? "id=\"actual\"" : "";?>>Főoldal</a></li>
                <li><a href="ultra.php" <?php echo $pagename == "klasszik" || $pagename == "ultra" ||
                                        $pagename == "csibesz" || $pagename == "szittya" || $pagename == "harcos" ?
                                        "id=\"actual\"" : "";?>>Termékek</a></li>

                <?php
                if (isset($_SESSION['user'])) {
                    echo '<li><a href="redirect/logout_redir.php" ' . ($pagename == "logout_teszt" ? "id=\"actual\"" : "") . '>Kijelentkezés</a></li>';
                } else {
                    echo '<li><a href="login.php" ' . ($pagename == "login" ? "id=\"actual\"" : "") . '>Bejelentkezés</a></li>';
                    echo '<li><a href="register.php" ' . ($pagename == "register" ? "id=\"actual\"" : "") . '>Regisztráció</a></li>';
                }

                if (isset($_SESSION['user'])) {
                    $avatar = $_SESSION['user']->getProfilePicture();
                    list($width, $height) = getimagesize($avatar);
                    $crop_mode = $width > $height ? "wcrop_nav" : "hcrop_nav";
                    //csúnyácska:
                    echo '<li class="li-profile"><a style="height: 0px; padding: 0px" href="profile.php"><div class="';
                    echo $crop_mode;
                    echo '" style="' . ($pagename == "profile" ? 'border: 2px solid white' : "") .  '; background-image: url(\'';
                    echo $avatar;
                    echo '\')" id="profile"></div></a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</header>
