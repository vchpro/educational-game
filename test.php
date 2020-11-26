<?php
    require 'db.php';
    if (! isset($_SESSION['logged_user']) ) {
        echo "<script>document.location.href = '/index.php';</script>";
    }

    if($user->checkcontrol != 0) {
        $user->checkcontrol += 1;
        R::store($user);
    }

    $data = $_POST;
    $data2 = $_GET;

    $question;

    function generate_math_1() {
        global $user;
        global $question;
        if($user->checkcontrol == 2) {
            $question = R::findOne('questions', 'id = ?', array(rand(1, 12)));
        }
        else {
            if($user->math_level > 12) {
                echo "<script>document.location.href = '/math.php?complete=1';</script>";
                die;
            }
            else {
                $question = R::findOne('questions', 'id = ?', array($user->math_level));
            }
        }

        $user->ans = $question->ans;

        R::store($user);
    }

    function generate_math_2() {
        global $user;
        global $question;

        if($user->checkcontrol == 2) {
            $question = R::findOne('questions', 'id = ?', array(rand(13, 23)));
        }

        else {
            if($user->math_level > 23) {
                echo "<script>document.location.href = '/math.php?complete=1';</script>";
                die;
            }
            else {
                $question = R::findOne('questions', 'id = ?', array($user->math_level));
            }
        }

        $user->ans = $question->ans;

        R::store($user);
    }

    function generate_logic_1() {
        global $user;
        global $question;

        if($user->checkcontrol == 2) {
            $question = R::findOne('questions', 'id = ?', array(rand(24, 39)));
        }

        else {
            if($user->logic_level > 16) {
                echo "<script>document.location.href = '/logic.php?complete=1';</script>";
                die;
            }
            else {
                $question = R::findOne('questions', 'id = ?', array($user->logic_level + 23));
            }
        }
        
        $user->ans = $question->ans;

        R::store($user);
    }

    if(isset ($data2["type"]) && isset ($data2["level"])) {
        switch($data2["type"]) {
            case "math":
                if((int)$data2["level"] == 1 || (int)$user->math_level >= 13 || $user->checkcontrol == 2) {
                    switch($data2["level"]) {
                        case 1:
                            generate_math_1();
                        break;

                        case 2:
                            generate_math_2();
                        break;

                        default:
                            echo "<script>document.location.href = '/choose.php';</script>";
                            die;
                        break;
                        }
                    }
                    else {
                        echo "<script>document.location.href = '/choose.php';</script>";
                        die;
                    }
                break;
                
                case "logic":
                    switch($data2["level"]) {
                        case 1:
                            generate_logic_1();
                        break;

                        default:
                            echo "<script>document.location.href = '/choose.php';</script>";
                            die;
                        break;
                    }
                break;

                default:
                    echo "<script>document.location.href = '/choose.php';</script>";
                    die;
                break;
            }

        }

    else {
        echo "<script>document.location.href = '/choose.php';</script>";
        die;
    }

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
    <title>Educational Game | Прохождение уровня</title>
</head>
<body>

    <?php
        if(isset($data2["other"])) {
        if($data2["other"] == "good") {
           echo "
                <div class='check-result'>
                    <span class='check-result__good'>Молодец!</span>
                    <span class='check-result__text'>+5 очков</span>
                </div>

                <script>
                    tmp = document.querySelector('.check-result');
                    setTimeout(function() {
                        tmp.classList.add('hide');
                    },3000);
                </script>
            ";
        }

        else {
            echo "
                <div class='check-result'>
                    <span class='check-result__bad'>Не отчаивайся!</span>
                    <span class='check-result__text'>-2 очка</span>
                </div>

                <script>
                    tmp = document.querySelector('.check-result');
                    setTimeout(function() {
                        tmp.classList.add('hide');
                    },3000);
                </script>
            ";
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
    <p class="main__text main__text--modifed">Прохождение уровня</p>
    </header>

    <main class="main main--modifed main--long4">
        <p class="main__task"> <?php echo $question->question; ?> </p>

        <form class="btn-container btn-container--modifed" method="post">
            <?php
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
                            $btn2 = $user->ans;
                            $btn3 = $question->a2;
                        break;

                        case 3:
                            $btn1 = $question->a1;
                            $btn2 = $question->a2;
                            $btn3 = $user->ans;
                        break;
                    }
            }

                $uniTXT = "?type=".$data2["type"]."&level=".$data2["level"]."&ans=";
            ?>
            <button type="button" class="btn-container__btn btn-container__btn--modifed btn" onclick="document.location.href = '/check.php<?php echo $uniTXT.$btn1?>';"><?php echo $btn1 ?></button>
            <button type="button" class="btn-container__btn btn-container__btn--modifed btn" onclick="document.location.href = '/check.php<?php echo $uniTXT.$btn2?>';"><?php echo $btn2 ?></button>
            <button type="button" class="btn-container__btn btn-container__btn--modifed btn" onclick="document.location.href = '/check.php<?php echo $uniTXT.$btn3?>';"><?php echo $btn3 ?></button>
        </form>

        <a href="math.php" class="main__route-btn">Выбрать другой уровень</a>
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