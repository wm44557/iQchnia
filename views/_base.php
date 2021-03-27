<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo STATIC_URL . 'css/style.css' ?>">
    <title>iQchnia</title>
</head>

<body>
    <div class="background">
        <div class="container">
            <?php if (isset($_SESSION["user_role"]))
                if ($_SESSION["user_role"] == "user" || $_SESSION["user_role"] == "admin" || $_SESSION["user_role"] == "auditor") :

            ?>
                <p>Witaj zalogowany uzytkowniku</p>
            <?php else : ?>
                <div class="content" style="grid-column: span 2; width: 100%;">
                <?php endif; ?>
                <?php echo $content ?>
                </div>
                <div>BAZOWI</div>
        </div>
    </div>
    </div>
</body>

</html>