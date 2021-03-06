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
                            <img class="logoI" src="/iQchnia//public/images/logo.png" width="112" height="28">
                        </a>
                        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
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

                            <a class="navbar-item" href="<?php echo STARTING_URL ?>/user/ulubione">
                                Ulubione
                            </a>
                            <a class="navbar-item" href="<?php echo STARTING_URL ?>/user/mojeprzepisy">
                                Moje przepisy
                            </a>
                            <a class="navbar-item" href="<?php echo STARTING_URL ?>/user/dodajprzepis">
                                Dodaj przepis
                            </a>

                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link">
                                    Wi??cej
                                </a>

                                <div class="navbar-dropdown is-active">
                                    <a class="navbar-item" href="<?php echo STARTING_URL ?>/user/przepisy">
                                        Regulamin
                                    </a>
                                    <a class="navbar-item" href="<?php echo STARTING_URL ?>/user/przepisy">
                                        Polityka prywatno??ci
                                    </a>
                                    <a class="navbar-item" href="<?php echo STARTING_URL ?>/user/przepisy">
                                        Kontakt
                                    </a>
                                    <hr class="navbar-divider">
                                    <a class="navbar-item" href="<?php echo STARTING_URL ?>/user/edytujdane">
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
<script>
    document.addEventListener('DOMContentLoaded', () => {

        // Get all "navbar-burger" elements
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        // Check if there are any navbar burgers
        if ($navbarBurgers.length > 0) {

            // Add a click event on each of them
            $navbarBurgers.forEach(el => {
                el.addEventListener('click', () => {

                    // Get the target from the "data-target" attribute
                    const target = el.dataset.target;
                    const $target = document.getElementById(target);

                    // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
                    el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');

                });
            });
        }

    });
</script>