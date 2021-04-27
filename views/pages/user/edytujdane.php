<div class="container">
    <div class="panelContentUser space">
        <p class="title is-4">Edytuj swoje dane</p>
        <div class="content">
            <form method="post">
                <p class="left">Login</p>
                <div class="field">
                    <p class="control has-icons-left">
                        <input class="input" type="text" name="new_login" placeholder="nowy login" value=<?php echo $params['dane']->login; ?>>
                        <span class="icon is-small is-left">
                            <i class="fas fa-sign-in-alt"></i>
                        </span>
                    </p>
                </div>

                <p class="left">Email</p>
                <div class="field">
                    <p class="control has-icons-left">
                        <input class="input" type="email" name="new_email" placeholder="nowy email" value=<?php echo $params['dane']->email; ?>>
                        <span class="icon is-small is-left">
                            <i class="fas fa-at"></i>
                        </span>
                    </p>
                </div>

                <p class="left">Hasło</p>
                <div class="field">
                    <p class="control has-icons-left">
                        <input class="input" type="password" name="old_password" placeholder="podaj stare hasło">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </p>
                </div>

                <div class="field">
                    <p class="control has-icons-left">
                        <input class="input" type="password" name="new_password" placeholder="podaj nowe hasło">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </p>
                </div>

                <div class="field">
                    <p class="control has-icons-left">
                        <input class="input" type="password" name="new_password2" placeholder="powtórz nowe hasło">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </p>
                </div>
                <input class="button is-dark" type="submit" name="zapisz_dane" value="Zapisz dane">
                <?php if (isset($errors['edited'])) echo "<p class='error'>" . $errors['edited'] . "</p>" ?>
            </form>
        </div>
    </div>
</div>