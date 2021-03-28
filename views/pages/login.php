<!-- <div class="login-form__background">
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
<br> -->

<div class="login-form__background">
    <div class="card">
        <div class="card-image">
            <img src="/iQchnia//public/images/logo.png" alt="Placeholder image">
        </div>
        <div class="card-content">
            <div class="media">

                <div class="media-content">
                    <p class="title is-4">Zaloguj się</p>
                    <p class="subtitle is-6"> Dołącz na insta <a href="#">#gotujznami</a>
                    </p>
                </div>
            </div>
            <div class="content">

                <p>Wpisz swoje dane:</p>

                <form method="post">
                    <div class="field">
                        <p class="control has-icons-left">
                            <input class="input" type="text" name="login" placeholder="Login" autocomplete="off">
                            <span class="icon is-small is-left">
                                <i class="fas fa-sign-in-alt"></i>
                            </span>
                        </p>
                    </div>
                    <div class="field">
                        <p class="control has-icons-left">
                            <input class="input" type="password" name="password" placeholder="Hasło">
                            <span class="icon is-small is-left">
                                <i class="fas fa-lock"></i>
                            </span>
                        </p>
                    </div>
                    <input class="button is-dark" type="submit" name="Zaloguj się" value="Zaloguj">
                    <?php if (isset($errors['auth'])) echo "<p class='error'>" . $errors['auth'] . "</p>" ?>
                    <br>
                </form>
                <form action="<?php echo STARTING_URL ?>/register" method="post">
                    <label>Nie masz konta? Dołącz do nas:
                        <input class="button is-text" type="submit" value="Zarejstruj się">
                </form></label>
                <br>
                <time datetime="2021-03-30">Pozdrawiamy team iQchnia &#9786; </time>
            </div>
        </div>
    </div>
</div>