<?php
if (isset($_SESSION['user'])) header("Location: index.php");
require "header.php";
?>

<section id="login">
    <div class="container">
        <h1>Bejelentkezés</h1>
        <form class="register-form" method="post" action="redirect/login_redir.php">
            <label for="login1" id="imel">E-mail</label>
            <input type="email" id="login1" name="email" placeholder="Felhasználó e-mail címe..." required>

            <label for="login2" id="pw">Jelszó</label>
            <input type="password" id="login2" name="password" placeholder="Felhasználó jelszava..." required>

            <?php
            if(isset($_SESSION['msg'])) {
                echo "<div style='margin-top: 20px'>";
                foreach ($_SESSION['msg'] as $error) {
                    echo "<p class='error'>";
                    echo $error;
                    echo "</p>";
                }
                echo "</div>";
            }
            unset($_SESSION['msg']);
            ?>

            <p id="stuff">
                <a href="register.php">Nincs még fiókom.</a><br>
                <a href="https://www.youtube.com/watch?v=BCv3fVPNSM4">Elfelejtettem a jelszavamat.</a>
            </p>

            <input type="submit" name="login" value="Bejelentkezés" id="sub">
        </form>
    </div>
</section>

<?php
require "footer.php";