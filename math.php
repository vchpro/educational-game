<?php
    require 'db.php';
    if (! isset($_SESSION['logged_user']) ) {
        echo "<script>document.location.href = '/index.php';</script>";
    }

    $data2 = $_GET;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet"> 
    <title>Educational Game | Выбор уровня</title>
</head>
<body>
    <?php
        if(isset($data2["complete"])) {
            echo "
            <div class='error'>
            <span class='error__heading'>Ошибка</span>
            <span class='error__text'>Вы уже прошли этот уровень</span>
            <a href='delprogress.php?math=1' class='error__text'>Сбросить прогресс</a>
        </div>
    
            <script>
                tmp = document.querySelector('.error');
                setTimeout(function() {
                    tmp.classList.add('hide');
                },3000);
            </script>
        ";
        }

    ?>
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
    <p class="main__text main__text--modifed">Выберите уровень</p>
    </header>

    <main class="main main--modifed">
        <section class="levels">
            <h1 class="visually-hidden">Уровни</h1>
            <article class="level">
                <img class="level__img level__img--one" src="img/math-1.png">
            <div class="level-container">
                <p class="level-container__header">1 уровень</p>
                <p class="level-container__text">Начальный уровень</p>
                <button type="button" class="btn level-container__button" onclick="document.location.href = '/test.php?type=math&level=1';">Выбрать</button>
            </div>
            </article>

        <?php
        if($user->math_level >= 10) {
            echo '
            <article class="level">
                <img class="level__img level__img--two" src="img/math-2.svg">
            <div class="level-container">
                <p class="level-container__header">2 уровень</p>
                <p class="level-container__text">Продвинутый уровень</p>
                <button type="button" class="btn level-container__button" onclick="'."document.location.href = '/test.php?type=math&level=2';".'">Выбрать</button>
            </div>
            </article>
            ';}
        ?>
        </section>
    </main>

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

    <script src="js/script2.js"></script>
</body>
</html>