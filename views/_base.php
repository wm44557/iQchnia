<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link rel="stylesheet" href="/iQchnia//public/css/style.css">

    <script src="https://kit.fontawesome.com/24c7dadd95.js" crossorigin="anonymous"></script>
    <title>iQchnia</title>
</head>

<body>
    <div class="background">
        <div class="container">
            <?php if (isset($_SESSION["user_role"]))
                if ($_SESSION["user_role"] == "user" || $_SESSION["user_role"] == "admin") :

            ?>
                <nav class="navbar" role="navigation" aria-label="main navigation">
                    <div class="navbar-brand">
                        <a class="navbar-item2" href="<?php echo STARTING_URL ?>/">
                            <img src="/iQchnia//public/images/logo.png" width="112" height="28">
                        </a>

                        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                            <span aria-hidden="true"></span>
                        </a>
                    </div>

                    <div id="navbarBasicExample" class="navbar-menu">
                        <div class="navbar-start">
                            <a class="navbar-item" href="<?php echo STARTING_URL ?>/user/przepisy">
                                Przepisy
                            </a>

                            <a class="navbar-item" href="<?php echo STARTING_URL ?>/user/przepisy">
                                Ulubione
                            </a>
                            <a class="navbar-item" href="<?php echo STARTING_URL ?>/user/przepisy">
                                Moje przepisy
                            </a>
                            <a class="navbar-item" href="<?php echo STARTING_URL ?>/user/przepisy">
                                Dodaj przepis
                            </a>
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link">
                                    Więcej
                                </a>

                                <div class="navbar-dropdown">
                                    <a class="navbar-item" href="<?php echo STARTING_URL ?>/user/przepisy">
                                        Regulamin
                                    </a>
                                    <a class="navbar-item" href="<?php echo STARTING_URL ?>/user/przepisy">
                                        Polityka prywatności
                                    </a>
                                    <a class="navbar-item" href="<?php echo STARTING_URL ?>/user/przepisy">
                                        Kontakt
                                    </a>
                                    <hr class="navbar-divider">
                                    <a class="navbar-item" href="<?php echo STARTING_URL ?>/user/przepisy">
                                        Edytuj dane
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="navbar-end">
                            <div class="navbar-item">
                                <div class="buttons">

                                    <form action="<?php echo STARTING_URL ?>/logout" method="post"><input class="button primary" type="submit" value="Wyloguj"></form>

                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
        </div>
    <?php else : ?>
        <div class="content">
        <?php endif; ?>
        <?php echo $content ?>
        </div>
    </div>
    </div>
</body>

</html>