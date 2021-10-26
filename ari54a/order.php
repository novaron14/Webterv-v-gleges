<?php
require "obj/Product.php";
require "obj/Order.php";
require "header.php";
?>

    <section id="order-info">
        <table>
            <thead>
                <tr>
                    <th id="termek" colspan="2">Termék</th>
                    <th id="egysegar">Egységár</th>
                    <th id="mennyiseg">Mennyiség</th>
                    <th id="ar">Ár</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $items = $_SESSION['cart'];
                $shipping = 1150;
                $order_data = [];
                $order = new Order("00000000", "0000-00-00. 00:00:00", $_SESSION['cart']);
                $order->addExtraCharge($shipping);
                foreach($items as $item){
                    echo '<tr>';
                    echo '<td headers="termek">' . '<img src="' . $item->getPicture() . '" alt="Turul Energiaital">' . '</td>';
                    echo '<td headers="termek">' . 'TURUL ENERGIAITAL ' . $item->getName() . '</td>';
                    echo '<td headers="egysegar">' . $item->getPrice() . ' Ft/db' . '</td>';
                    if($item->getName() == "Poszter") echo '<td headers="mennyiseg">' . $item->getQuantity() . '</td>';
                    else echo '<td headers="mennyiseg">' . $item->getQuantity() / 24 . ' x 24' . '</td>';
                    echo '<td headers="ar">' . number_format($item->getTotalprice(), 0, "", " ") . ' Ft' . '</td>';
                    echo '</tr>';
                }
                ?>
                <tr>
                    <td headers="termek"></td>
                    <td headers="termek">Házhozszállítás</td>
                    <td headers="egysegar"></td>
                    <td headers="mennyiseg"></td>
                    <td headers="ar"><?php echo number_format($shipping, 0, "", " ") . " Ft";?></td>
                </tr>
                <tr id="sum">
                    <td headers="termek" colspan="4">Összesen:</td>
                    <td headers="ar"><?php echo number_format($order->getTotalprice(), 0, "", " ") . " Ft";?></td>
                </tr>
            </tbody>
        </table>
    </section>

    <form method="post">
    <section class="order div-left">
        <div class="container">
            <h1>Számlázási cím</h1>
            <div class="register-form">
                <?php
                    $address = explode("-", $_SESSION['user']->getAddress());
                ?>
                <div>
                    <label for="name">Név</label>
                    <input type="text" id="name" name="name" value="<?php echo (isset($address[0]) ? $address[0] : ""); ?>" required>
                </div>
                <div>
                    <label for="zipcode">Irányítószám</label>
                    <input type="number" id="zipcode" name="zipcode" value="<?php echo (isset($address[1]) ? $address[1] : ""); ?>" required>
                </div>
                <div>
                    <label for="city">Város</label>
                    <input type="text" id="city" name="city" value="<?php echo (isset($address[2]) ? $address[2] : "");; ?>" required>
                </div>
                <div>
                    <label for="streetNum">Utca, házszám</label>
                    <input type="text" id="streetNum" name="streetNum" value="<?php echo (isset($address[3]) ? $address[3] : ""); ?>" required>
                </div>
                <div>
                    <label for="door">Emelet, ajtó</label>
                    <input type="text" id="door" name="door" value="<?php echo (isset($address[4]) ? $address[4] : ""); ?>">
                </div>
                <div>
                    <label for="bell">Kapucsengő</label>
                    <input type="number" id="bell" name="bell" value="<?php echo trim((isset($address[5]) ? $address[5] : "")); ?>">
                </div>
                <div>
                    <label for="phoneNum">Telefonszám</label>
                    <input type="tel" id="phoneNum" name="phoneNum" required>
                </div>
                <div>
                    <label class="check" for="saveaddress">Cím mentése</label>
                    <input type="checkbox" id="saveaddress" name="saveaddress">
                </div>
            </div>
        </div>
    </section>

    <section class="order div.left">
        <div class="container">
            <h1>Szállítási mód</h1>
            <div class="register-form">
                <div>
                    <label class="check" for="GLS">Házhozszállítás GLS futárszolgálattal (+1150 Ft)</label>
                    <input type="radio" id="GLS" checked required>
                </div>
            </div>
        </div>
    </section>

    <section class="order div.left">
        <div class="container">
            <h1>Szállítási cím</h1>
            <div class="register-form">
                    <div>
                        <label class="check" for="address">Megegyezik a számlázási címmel</label>
                        <input type="checkbox" id="address" name="addressEquals" checked>
                    </div>
                    <div>
                        <label for="other">Egyéb cím</label>
                        <input type="text" id="other" name="otherAddress">
                    </div>
                    <div>
                        <label for="note">Megjegyzés a futár számára:</label>
                        <textarea name="note" id="note" rows="5" cols="20"></textarea>
                    </div>
                    <input type="submit" name="order" value="Megrendelés" id="sub">
            </div>
        </div>
    </section>
        <?php
        if(isset($_POST['order'])) {
            $address_new = array($_POST['name'], $_POST['zipcode'], $_POST['city'], $_POST['streetNum'],
                $_POST['door'], $_POST['bell']);
            $extraAddress = isset($_POST['addressEquals']) ? "" : $_POST['otherAddress'];
            $order->setDate();
            $order->setId();
            $order->save($address_new, $_POST['phoneNum'], $_POST['note'], $extraAddress);
            if(isset($_POST['saveaddress'])) $_SESSION['user']->setAddress(join("-", $address_new));
            unset($_SESSION['cart']);
            $_SESSION['cart'] = [];
            echo "<script>alert('Rendelésedet rögzítettük! Majd valamikor hozzuk.')</script>";
            echo "<script> window.location = 'index.php'</script>";
        }
        ?>
    </form>

<?php
require "footer.php";