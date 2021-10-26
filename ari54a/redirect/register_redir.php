<?php

session_start();

if (isset($_POST["signup"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["pw"];
    $password_again = $_POST["pwa"];
    $_SESSION['msg'] = [];

    $reserved_emails = [];
    $file = fopen("../data/users.csv", "r");
    if ($file === false) {
        array_push($_SESSION['msg'], "Ismeretlen hiba lépett fel a regisztráció során.");
    }
    else {
        foreach ($_POST as $val) {
            if (!isset($val) || trim($val) == '') {
                array_push($_SESSION['msg'], "Nem hagyhatsz egy mezőt sem üresen!");
                break;
            }
        }

        if(!isset($_POST['aszf'])) array_push($_SESSION['msg'], "Nem fogadtad el az adatvédelmi nyilatkozatot!");

        while (($line = fgets($file)) !== false) {
            array_push($reserved_emails, explode(";", $line)[0]);
        }

        foreach ($reserved_emails as $reserved) {
            if ($email === $reserved) array_push($_SESSION['msg'], "Már létezik felhasználó ezzel az e-mail címmel!");
        }

        if (strlen($password) < 5) {
            array_push($_SESSION['msg'], "A jelszó túl rövid!");
        }

        if (!preg_match("/[A-Za-z]/", $password) || !preg_match("/[0-9]/", $password)) {
            array_push($_SESSION['msg'], "A jelszónak tartalmaznia kell betűt és számjegyet egyaránt!");
        }

        if ($password !== $password_again) {
            array_push($_SESSION['msg'], "A két jelszó nem egyezik!");
        }

        if (count($_SESSION['msg']) === 0) {
            $file = fopen("../data/users.csv", "a");

            echo '<script>alert("Sikeres regisztráció!")</script>';
            echo "<script> window.location = '../login.php'</script>";

            fwrite($file, "\n" . $email . ";" . $password . ";" . $name . ";" . "-");
            fclose($file);
        }
    }
}
echo "<script> window.location = '../register.php'</script>";