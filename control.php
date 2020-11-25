<?php
    require 'db.php';
    if (! isset($_SESSION['logged_user']) ) {
        echo "<script>document.location.href = '/index.php';</script>";
    }

    $data = $_POST;
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
    <title>Educational Game | Контрольные задачи</title>
</head>
<body>
<?php
    if(isset($data2["other"])) {
        echo "
        <div class='check-result'>
            <span class='check-result__good'>Молодец!</span>
            <span class='check-result__text'>+".$data2["other"]." очков</span>
        </div>

        <script>
            tmp = document.querySelector('.check-result');
            setTimeout(function() {
                tmp.classList.add('hide');
            },3000);
        </script>
    ";
    }

    if(isset($data2["bad"])) {
        echo "
        <div class='check-result'>
            <span class='check-result__bad'>Не отчаивайся!</span>
            <span class='check-result__text'>-".$data2["bad"]." очков</span>
        </div>

        <script>
            tmp = document.querySelector('.check-result');
            setTimeout(function() {
                tmp.classList.add('hide');
            },3000);
        </script>
    ";
    }

    if(isset ($data["do_control"])) {
        if(is_numeric($data["count"])) {
            if($user->points - $data["count"] >= 0 && $data["count"] > 0) {
                $user->points -= $data["count"];
                $user->control = $data["count"];
                $user->checkcontrol = 1;
                R::store($user);
                switch(rand(1, 3)) {
                    case 1:
                        echo "<script>document.location.href = '/test.php?type=math&level=1';</script>";
                    break;

                    case 2:
                        echo "<script>document.location.href = '/test.php?type=math&level=2';</script>";
                    break;

                    case 3:
                        echo "<script>document.location.href = '/test.php?type=logic&level=1';</script>";
                    break;
                }
            }
            else {
                echo "
                <div class='error'>
                    <span class='error__heading'>Ошибка</span>
                    <span class='error__text'>У вас недостаточно очков!</span>
                </div>

                <script>
                    tmp = document.querySelector('.error');
                    setTimeout(function() {
                        tmp.classList.add('hide');
                    },3000);
                </script>
            ";
            }
        }
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
    </header>

    <main class="main">
        <p class="main__text">Контрольные задачи</p>
        <p class="main__text">Количество ваших очков: <?php echo $user->points ?></p>
        <form class="control-form" method="post" action="control.php">
            <input type="text" name="count" maxlength="64" class="control-form__input" placeholder="Ставка">
            <button type="submit" name="do_control" class="control-form__button">
                <span class="visually-hidden">Начать</span>
            </button>
        </form>
    
        <div class="decorate decorate-choose">
            <span class="visually-hidden">Наша платформа создана для дошкольников и школьников младших классов</span>
        </div>
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