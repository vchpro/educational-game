<?php
    require 'db.php';
    if (! isset($_SESSION['logged_user']) ) {
        echo "<script>document.location.href = '/index.php';</script>";
    }

    $data2 = $_GET;

    $question = R::findOne('questions', 'id = ?', array(0));
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
    <title>Educational Game | Выбор категории</title>
</head>
<body>
    <?php
        if(isset($data2["good"])) {
            echo "
            <div class='error'>
                <span class='error__heading error__heading--modifed'>Молодец!</span>
                <span class='error__text'>+50 очков</span>
            </div>

            <script>
                tmp = document.querySelector('.error');
                setTimeout(function() {
                    tmp.classList.add('hide');
                },3000);
            </script>
        ";
        }

        if(isset($data2["bad"])) {
            echo "
            <div class='error'>
                <span class='error__heading'>Не отчаивайся!</span>
                <span class='error__text'>-20 очков</span>
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
                <a>Educational Game</a>
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
        <p class="main__text">Выберите раздел</p>

        <div class="btn-container">
            <a href="math.php" class="btn-container__btn btn">Математика</a>
            <a href="logic.php" class="btn-container__btn btn">Логика</a>
            <a href="friend.php" class="btn-container__btn btn">Друзья</a>
            <a href="rate.php" class="btn-container__btn btn">Рейтинг</a>
            <a href="control.php" class="btn-container__btn btn">Контрольные</a>
        </div>

        <div class="today-example">
            <form action="check.php" method="post" class="today-form">
                <h2 class="today-form__heading">Задача дня</h2>
                <span class="today-form__text"><?php echo $question->question; ?></span>

                <div class="btn-container btn-container--modifed today-form__container" method="post">
            <?php
                if($user->today_complete == 0) {


                    $btn1;
                    $btn2;
                    $btn3;

                    $tmp = rand(1, 3);

                    if($question->type == "number") {
                        switch($tmp) {
                            case 1:
                                $btn1 = $user->ans;
                                $btn2 = $user->ans;
                                while($btn2 == $user->ans) {
                                    $btn2 = rand($user->ans - 20, $user->ans + 20);
                                }
                                $btn3 = $user->ans;
                                while($btn3 == $user->ans) {
                                    $btn3 = rand($user->ans - 20, $user->ans + 20);
                                }
                            break;

                            case 2:
                                $btn1 = $user->ans;
                                while($btn1 == $user->ans) {
                                    $btn1 = rand($user->ans - 20, $user->ans + 20);
                                }
                                $btn2 = $user->ans;
                                $btn3 = $user->ans;
                                while($btn3 == $user->ans) {
                                    $btn3 = rand($user->ans - 20, $user->ans + 20);
                                }
                            break;

                            case 3:
                                $btn1 = $user->ans;
                                while($btn1 == $user->ans) {
                                    $btn1 = rand($user->ans - 20, $user->ans + 20);
                                }
                                $btn2 = $user->ans;
                                while($btn2 == $user->ans) {
                                    $btn2 = rand($user->ans - 20, $user->ans + 20);
                                }
                                $btn3 = $user->ans;
                            break;
                        }
                    }

                    else if($question->type = "text") {
                            switch($tmp) {
                                case 1:
                                    $btn1 = $question->ans;
                                    $btn2 = $question->a1;
                                    $btn3 = $question->a2;
                                break;

                                case 2:
                                    $btn1 = $question->a1;
                                    $btn2 = $question->ans;
                                    $btn3 = $question->a2;
                                break;

                                case 3:
                                    $btn1 = $question->a1;
                                    $btn2 = $question->a2;
                                    $btn3 = $question->ans;
                                break;
                            }
                        }
                    $uniTXT = "?type=day&level=0&ans=";
                }

            ?>
            <?php
            if($user->today_complete == 0) {
                echo "
                
                <button type='button' class='btn-container__btn btn-container__btn--modifed btn' onclick=\"document.location.href = '/check.php".$uniTXT.$btn1."';\">$btn1</button>
                <button type='button' class='btn-container__btn btn-container__btn--modifed btn' onclick=\"document.location.href = '/check.php".$uniTXT.$btn2."';\">$btn2</button>
                <button type='button' class='btn-container__btn btn-container__btn--modifed btn' onclick=\"document.location.href = '/check.php".$uniTXT.$btn3."';\">$btn3</button>
                
                ";
            }

            else {
                echo "<span class='today-form__completed'>Вы уже решили задачу :)</span>";
            }

            ?>
        </div>
            </form>
        </div>
        <div class="decorate decorate-choose">
            <span class="visually-hidden">Наша платформа создана для дошкольников и школьников младших классов</span>
        </div>
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

    <script src="js/script2.js"></script>
</body>
</html>