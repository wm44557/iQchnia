<div class="login-form__background">
    <div class="login-form__form">
        <div>
            <h1 class="light-color">Logowanie</h1>
            <p><small class="light-color">Wpisz swój login i hasło.</small></p>
        </div>
        <form method="post">

            <input class="input" type="text" name="login" placeholder="Login" autocomplete="off">
            <input class="input" type="password" name="password" placeholder="Hasło">
            <?php if (isset($errors['auth'])) echo "<p class='error'>" . $errors['auth'] . "</p>" ?>
            <br><br>
            <input class="button primary" type="submit" name="Zaloguj się" value="Zaloguj">

        </form>
    </div>

</div>
<br>