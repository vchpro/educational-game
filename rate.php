<?php
    require 'db.php';
    if (! isset($_SESSION['logged_user']) ) {
        echo "<script>document.location.href = '/index.php';</script>";
    }

    $top = R::findAll('users',' ORDER BY points DESC LIMIT 3 ');
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.min.css" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet"> 
    <title>Educational Game | Рейтинг</title>
</head>
<body>
    <header class="header">
        <div class="header-container header-container--modifed">
            <h1 class="header-container__heading">
                <a href="choose.php">Educational Game</a>
            </h1>
            <span class="header-container__burger">
                <span class="visually-hidden">Меню</span>
            </span>
            <div class="absolute-container">
                <button type="button" class="auth header-container__auth profile">Профиль</button>
                <div class="profile-container">
                    <p class="profile-container__text">Количество очков: <?php echo $user->points; ?></p>
                    <a href="friend.php" class="profile-container__logout">Друзья</a>
                    <a href="logout.php" class="profile-container__logout">Выйти</a>
                </div>
            </div>
        </div>
    <p class="main__text main__text--modifed">Рейтинг</p>
    </header>

    <main class="main main--modifed main--long3">
        <section class="rate">
            <div class="rate__item rate__item--first">
                <span class="rate-name"><?php 
                foreach($top as $t) {
                    echo $t->name." (".$t->points.")";
                    break; }  ?></span>
            </div>

            <div class="rate__item rate__item--second">
                <span class="rate-name"><?php
                $count = 0;
                foreach($top as $t) {
                    $count += 1;
                    if($count == 2) {
                        echo $t->name." (".$t->points.")";
                        break; }
                    } ?></span>
            </div>

            <div class="rate__item rate__item--third">
                <span class="rate-name"><?php
                $count = 0;
                foreach($top as $t) {
                    $count += 1;
                    if($count == 3) {
                        echo $t->name." (".$t->points.")";
                        break; }
                    } ?></span>
            </div>
        </section>

    </main>

    <footer class="footer">
        <div class="footer-container">
            <h2 class="footer__heading">Open Source</h2>
            <div class="footer-social">
                <a href="" class="footer-social__item footer-social__item--facebook">
                    <span class="visually-hidden">Наш Facebook</span>
                </a>

                <a href="" class="footer-social__item footer-social__item--vk">
                    <span class="visually-hidden">Наш VK</span>
                </a>

                <a href="" class="footer-social__item footer-social__item--instagram">
                    <span class="visually-hidden">Наш Instagram</span>
                </a>
            </div>
            <div class="footer__decorate"></div>

            <span class="footer__count">Ваше количество очков: <?php echo $user->points; ?></span>
        </div>
    </footer>

    <section class="mobile-menu hide">
        <div class="mobile-center">
            <h2 class="mobile-center__heading">Educational Game</h2>
            <span class="mobile-center__close">
                <span class="visually-hidden">Закрыть меню</span>
            </span>
        </div>
    <button type="button" class="mobile-menu__auth main__auth auth" onclick="document.location.href = '/logout.php';">ВЫЙТИ</button>

    <ul class="social">
        <li class="social__item facebook">
            <a class="visually-hidden">Наш Facebook</a>
        </li>

        <li class="social__item vk">
            <a class="visually-hidden">Наш VK</a>
        </li>

        <li class="social__item instagram">
            <a class="visually-hidden">Наш Instagram</a>
        </li>
    </ul>
    </section>

    <script src="js/script2.min.js"></script>
</body>
</html>