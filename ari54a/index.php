<?php
require "obj/Product.php";
require "header.php";
?>

    <section id="showcase">
        <div class="wrapper">
            <audio id="meglepi" src="media/erdelyindulo.mp3" autoplay loop></audio>
            <script>
                /*Ne süketüljön meg senki ha megnyitja az oldalt.*/
                let audio = document.getElementById("meglepi");
                audio.volume = 0.2;
            </script>
            <div>
               <!-- g á n y o l á s -->
            </div>
        </div>
    </section>

    <section id="webshop">
        <div class="container">
            <div class="webshop-item">
                <a href="klasszik.php"><img src="img/t1_c.png" alt="Turul Energiaital Klasszik"></a>
                <a href="klasszik.php">
                    <p>TURUL ENERGIAITAL<p>
                    <h1>Klasszik</h1>
                </a>
                <div class="webshop-order">
                    <p>Br. <strong>4 776 Ft</strong>  <small>(24 x 199 Ft)</small></p>
                    <form method="get" action="redirect/order_redir.php">
                        <label for="klasszik">
                            <input class="select-quantity" type="number" id="klasszik" name="klasszik" min="1" max="500">
                            x 24</label>
                        <input type="image" name="submit" src="img/cart_svg.svg" alt="Kosárba"/>
                    </form>
                </div>
            </div>
            <div class="webshop-item">
                <a href="ultra.php"><img src="img/t2_c.png" alt="Turul Energiaital Ultramagyar"></a>
                <a href="ultra.php">
                    <p>TURUL ENERGIAITAL<p>
                    <h1>Ultramagyar</h1>
                </a>
                <div class="webshop-order">
                    <p>Br. <strong>4 776 Ft</strong>  <small>(24 x 199 Ft)</small></p>
                    <form method="get" action="redirect/order_redir.php">
                        <label for="ultra">
                            <input class="select-quantity" type="number" id="ultra" name="ultramagyar" min="1" max="500">
                            x 24</label>
                        <input type="image" name="submit" src="img/cart_svg.svg" alt="Kosárba"/>
                    </form>
                </div>
            </div>
            <div class="webshop-item">
                <a href="csibesz.php"><img src="img/t3_c.png" alt="Turul Energiaital Csibész"></a>
                <a href="csibesz.php">
                    <p>TURUL ENERGIAITAL<p>
                    <h1>Csibész</h1>
                </a>
                <div class="webshop-order">
                    <p>Br. <strong>4 776 Ft</strong>  <small>(24 x 199 Ft)</small></p>
                    <form method="get" action="redirect/order_redir.php">
                        <label for="csibesz">
                            <input class="select-quantity" type="number" id="csibesz" name="csibész" min="1" max="500">
                            x 24</label>
                        <input type="image" name="submit" src="img/cart_svg.svg" alt="Kosárba"/>
                    </form>
                </div>
            </div>
            <div class="webshop-item">
                <a href="szittya.php"><img src="img/t4_c.png" alt="Turul Energiaital Szittya"></a>
                <a href="szittya.php">
                    <p>TURUL ENERGIAITAL<p>
                    <h1>Szittya</h1>
                </a>
                <div class="webshop-order">
                    <p>Br. <strong>4 776 Ft</strong>  <small>(24 x 199 Ft)</small></p>
                    <form method="get" action="redirect/order_redir.php">
                        <label for="szittya">
                            <input class="select-quantity" type="number" id="szittya" name="szittya" min="1" max="500">
                            x 24</label>
                        <input type="image" name="submit" src="img/cart_svg.svg" alt="Kosárba"/>
                    </form>
                </div>
            </div>
            <div class="webshop-item">
                <a href="harcos.php"><img src="img/t5_c.png" alt="Turul Energiaital Harcos"></a>
                <a href="harcos.php">
                    <p>TURUL ENERGIAITAL<p>
                    <h1>Harcos</h1>
                </a>
                <div class="webshop-order">
                    <p>Br. <strong>4 776 Ft</strong>  <small>(24 x 199 Ft)</small></p>
                    <form method="get" action="redirect/order_redir.php">
                        <label for="harcos">
                            <input class="select-quantity" type="number" id="harcos" name="harcos" min="1" max="500">
                            x 24</label>
                        <input type="image" name="submit" src="img/cart_svg.svg" alt="Kosárba"/>
                    </form>
                </div>
            </div>
            <div class="webshop-item">
                    <img src="img/tp_c.png" alt="Turul Energiaital Hazafias poszter">
                    <h1>Hazafias poszter</h1>
                    <p>(100 cm x 75 cm)</p>
                    <div class="webshop-order">
                        <p>Br. <strong>2 000 Ft</strong></p>
                        <form method="get" action="redirect/order_redir.php">
                            <label for="poszter">
                                <input class="select-quantity" type="number" id="poszter" name="poszter" min="1" max="500">
                                x 1</label>
                            <input type="image" name="submit" src="img/cart_svg.svg" alt="Kosárba"/>
                        </form>
                    </div>
            </div>
        </div>
    </section>

    <aside>
        <div class="container">
            <div id="shoppingcart">
                <h1>Kosár</h1>
                <div id="shoppingcart-elements">
                    <?php
                        if(isset($_SESSION['user'])) {
                            if($_SESSION['cart'] == []) echo '<p id="shoppingcart-login">A kosarad jelenleg még üres.</p>';
                            else {
                                foreach($_SESSION['cart'] as $product){
                                    if($product->getQuantity() !== 0) {
                                        echo '<form action="redirect/order_redir.php" method="get">';
                                        echo '<div class="shoppingcart-item">';
                                        echo "<small>TURUL ENERGAITAL</small><br/>" . '<span class="productname">' . $product->getName() . '</span><br/>';
                                        echo "<span class='quantity'>" . $product->getQuantity() . " db</span>" . " - ";
                                        echo "<span class='price'>" . number_format($product->getTotalPrice(), 0, "", " ") . " Ft</span>";
                                        echo "<input type='hidden' name=\"delete"  . $product->getName() . "\" >";
                                        echo "<input type=\"image\" class=\"delete\" src=\"img/x_svg.svg\" alt=\"Elem törlése\"/>";
                                        echo '</div></form>';
                                    }
                                }
                                echo '<form action="order.php" method="get"><input type="submit" id="orderproducts" value="Megrendelés"></form>';
                            }
                        }
                        else {
                            echo '<p id="shoppingcart-login">A kosár használatához először <a href="login.php">jelentkezz be.</a></p>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div id="leaveamessage">
                <h1>Hagyj üzenetet!</h1>
                <form method="post">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" required>
                    <label for="msg">Üzenet:</label>
                    <textarea name="msg" id="msg" required></textarea>
                    <input type="submit" id="sendmessage" name="sendmessage">
                    <?php
                    if(isset($_POST['sendmessage'])){
                        $t = time();
                        date_default_timezone_set('Europe/Budapest');
                        $date = date("Y.m.d h:i:s a",$t);
                        $file = fopen("data/messages/" . explode("@", $_POST['email'])[0] . "_" . date("y_m_s_h_i_s_a") . ".txt", 'w');
                        fwrite($file, "[ From: " . $_POST['email'] . ", at: " . $date  . " ]" . "\n" . $_POST['msg']);
                        fclose($file);
                    }
                    ?>
                </form>
            </div>
        </div>
    </aside>

<?php
require "footer.php";