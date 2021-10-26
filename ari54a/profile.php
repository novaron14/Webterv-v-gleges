<?php
require "header.php";
    $user = $_SESSION['user'];
    $email = $user->getEmail();
    $name = $user->getName();
    $birth = $user->getBirth();
    $avatar = $user->getProfilePicture();
?>

<section class="order div-left">
    <div class="container">
        <h1>Alapadatok</h1>
        <form method="post">
            <div class="register-form">
                <div>
                    <label for="name">Név</label>
                    <input type="text" id="name" name="username" placeholder="Felhasználó neve..."
                           value="<?php echo $name; ?>" readonly="readonly">
                </div>
                <div>
                    <label for="imel">E-mail cím</label>
                    <input type="email" id="imel" name="email" placeholder="Felhasználó e-mail címe..."
                           value="<?php echo $email; ?>" readonly="readonly">
                </div>
                <div>
                    <label for="birthdate">Születési idő</label>
                    <input type="date" id="birthdate" name="birthdate" value="<?php echo trim($birth); ?>">
                </div>
                <div>
                    <label for="pwchange">Jelszó módosítása</label>
                    <input type="password" placeholder="Felhasználó jelszava..." name="pwchange" id="pwchange">
                </div>
                <div>
                    <label for="pwChangeA">Új jelszó mégegyszer</label>
                    <input type="password" placeholder="Felhasználó jelszava..." name="pwchangeagain" id="pwChangeA">
                </div>

                <?php

                $errors = [];

                if (isset($_POST["changeuserdata"])) {
                    $name = $_POST['username'];
                    $email = $_POST['email'];
                    $birth = $_POST['birthdate'];
                    $password_new = $_POST['pwchange'];
                    $password_new_again = $_POST['pwchangeagain'];
                    if (strlen($password_new) !== 0) {
                        if (strlen($password_new) < 5) {
                            array_push($errors, "A jelszó túl rövid!");
                        }

                        if (!preg_match("/[A-Za-z]/", $password_new) || !preg_match("/[0-9]/", $password_new)) {
                            array_push($errors, "A jelszónak tartalmaznia kell betűt és számjegyet egyaránt!");
                        }

                        if ($password_new !== $password_new_again) {
                            array_push($errors, "A két jelszó nem egyezik!");
                        }

                        echo "<div style='margin-top: 20px'>";
                        foreach ($errors as $error) {
                            echo "<p class='error'>";
                            echo $error;
                            echo "</p>";
                        }
                        echo "</div>";

                        if (count($errors) === 0) $user->setPassword($password_new);
                    }
                    if (count($errors) === 0) {
                        $user->setBirth($birth);
                        echo "<script>alert('Sikeresen megváltoztattad az adataidat!')</script>";
                        echo "<script> window.location = 'profile.php'</script>";
                    }
                }
                ?>

                <input type="submit" name="changeuserdata" value="Mentés">
            </div>
        </form>
    </div>
</section>

<section class="order div.left">
    <form method="post" action="redirect/upload_redir.php" enctype="multipart/form-data">
        <div class="container">
            <h1>Profilkép</h1>
            <div class="register-form">
                <?php
                list($width, $height) = getimagesize($avatar);
                $crop_mode = $width > $height ? "wcrop" : "hcrop";
                ?>

                <div class="avatar-wrapper">
                    <div id="profilepic" class="<?php echo $crop_mode; ?>"
                         style="background-image: url('<?php echo $avatar; ?>')"></div>
                </div>
                <input type="file" name="fileToUpload" id="fileToUpload">

                <?php
                echo "<div style='margin-top: 20px'>";
                if(isset($_SESSION['msg'])) {
                    foreach ((array)$_SESSION['msg'] as $error) {
                        echo "<p class='error'>";
                        echo $error;
                        echo "</p>";
                    }
                }
                echo "</div>";
                unset($_SESSION['msg']);
                ?>
                <input type="submit" value="Feltöltés" name="upload">
            </div>
        </div>
    </form>
</section>

<section class="order div.left">
    <div class="container">
        <h1>Címem</h1>
        <form id="saved">
            <?php
            $address = $_SESSION['user']->getAddress();
            if($address == '') echo 'Még nem mentettél el címet.';
            else {
                $address_elements = array_filter(explode("-", $address));
                echo join(" | ", $address_elements);
                echo "<input type='hidden' name=\"deleteAddress\" >";
                echo "<input type=\"image\" style=\"background-color: #1b1b1b;\" class=\"delete\" src=\"img/x_svg.svg\" alt=\"Cím törlése\"/>";
                if(isset($_GET['deleteAddress'])) {
                    $_SESSION['user']->setAddress("");
                    echo "<script> window.location = 'profile.php'</script>";
                }
            }
            ?>
        </form>
    </div>
</section>

<section class="order div.left">
    <div class="container">
        <h1>Rendeléseim</h1>
        <table id="order-table">
            <thead>
            <tr>
                <th id="rendelesiazonosito">Rendelési azonosító</th>
                <th id="vasarlasidopontja">Vásárlás időpontja</th>
                <th id="fizetettosszeg">Fizetett összeg</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $orders = $user->getOrders();
            if($orders !== false) {
                foreach ($orders as $order) {
                    echo '<tr>';
                    echo '<td headers="rendelesiazonosito">' . explode("-", $order)[0] . '</td>';
                    echo '<td headers="vasarlasidopontja">' . explode("-", $order)[1] . '</td>';
                    echo '<td headers="fizetettosszeg">' . number_format(explode("-", $order)[2], 0, "", " ") . " Ft" . '</td>';
                    echo '</tr>';
                }
            }
            else {
                echo '<tr><td colspan="3"> Még nem volt rendelésed. </td></tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</section>

<?php
require "footer.php";