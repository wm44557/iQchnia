<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <script src="https://kit.fontawesome.com/24c7dadd95.js" crossorigin="anonymous"></script>
    <title>iQchnia</title>
</head>

<body>
    <div class="background">
        <div class="container">
            <?php if (isset($_SESSION["user_role"]))
                if ($_SESSION["user_role"] == "user" || $_SESSION["user_role"] == "admin") :

            ?>
                <form action="<?php echo STARTING_URL ?>/logout" method="post"><input class="button primary" type="submit" value="Wyloguj"></form>
                <form action="<?php echo STARTING_URL ?>/user/przepisy" method="post"><input class="button primary" type="submit" value="Przepisy"></form>

                <p>Witaj zalogowany uzytkowniku</p>
            <?php else : ?>
                <div class="content" ">
                <?php endif; ?>
                <?php echo $content ?>
                </div>
                <div>BAZOWI</div>
        </div>
    </div>
    </div>
</body>

</html>