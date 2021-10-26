<?php
require "header.php";
?>

    <section id="register">
        <div class="container">
            <h1>Regisztráció</h1>
            <form class="register-form" method="post" action="redirect/register_redir.php">
                <label for="reg1">Név</label>
                <input type="text" id="reg1" name="name" placeholder="Felhasználó neve..." >

                <label for="reg2">E-mail</label>
                <input type="email" id="reg2" name="email" placeholder="Felhasználó e-mail címe...">

                <label for="reg3">Jelszó</label>
                <input type="password" id="reg3" name="pw" placeholder="Felhasználó jelszava...">

                <label for="reg4" id="pwa">Jelszó mégegyszer</label>
                <input type="password" id="reg4" name="pwa" placeholder="Kérem ismételje meg jelszavát...">

                <div id="nyilatkozat">
                    <ol>
                        <li>
                            Bevezető
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </li>
                        <li>
                            Fogalom meghatározások
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </li>
                        <li>
                            Az adatkezelés irányelvei
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </li>
                        <li>
                            Fontos adatkezelési információk
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </li>
                        <li>
                            Az adatfeldolgozásra jogosult személy
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </li>
                        <li>
                            Sütik
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </li>
                    </ol>
                </div>
                <label class="check" for="reg5" id="aszf">Elfogadom az adatvédelmi nyilatkozatot és az ÁSZF-et.</label>
                <input type="checkbox" id="reg5" name="aszf">
                <?php
                    if(isset($_SESSION['msg'])) {
                        echo "<div style='margin-top: 20px'>";
                        foreach ($_SESSION['msg'] as $error) {
                            echo "<p class='error'>";
                            echo $error;
                            echo "</p>";
                        }
                        unset($_SESSION['msg']);
                        echo "</div>";
                    }
                ?>
                <label for="reg6"></label>
                <input type="submit" id="reg6" name="signup" value="Regisztráció">
            </form>
        </div>
    </section>

<?php
require "footer.php";