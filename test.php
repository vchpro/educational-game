<?php
    require 'db.php';
    if (! isset($_SESSION['logged_user']) ) {
        echo "<script>document.location.href = '/index.php';</script>";
    }

    $data = $_POST;
    $data2 = $_GET;

    $question;

    function generate_math_1() {
        global $user;
        global $question;
        switch (rand(1, 12)) {
            case 1:
                $question = "100 + 30";
                $user->ans = 130;
            break;

            case 2:
                $question = "80 / 2";
                $user->ans = 40;
            break;

            case 3:
                $question = "35 + 9 / 3";
                $user->ans = 38;
            break;

            case 4:
                $question = "7 / 7 + 30";
                $user->ans = 31;
            break;

            case 5:
                $question = "35 : (5 + 2)";
                $user->ans = 5;
            break;

            case 6:
                $question = "101 - 12";
                $user->ans = 89;
            break;

            case 7:
                $question = "155 - 74 + 1";
                $user->ans = 82;
            break;

            case 8:
                $question = "77 + 33";
                $user->ans = 110;
            break;

            case 9:
                $question = "0 - 5 + 7";
                $user->ans = 2;
            break;

            case 10:
                $question = "(95 - 47) / 2";
                $user->ans = 24;
            break;

            case 11:
                $question = "(8 + 4) / 3";
                $user->ans = 4;
            break;

            case 12:
                $question = "12 - 5 + 55 / 5";
                $user->ans = 18;
            break;
        }

        R::store($user);
    }

    if(isset ($data2["type"]) && isset ($data2["level"])) {
        switch($data2["type"]) {
            case "math":
                if((int)$data2["level"] == 1 || (int)$data2["level"] * 10 <= $user->math_level) {
                    switch($data2["level"]) {
                        case 1:
                            generate_math_1();
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
    <link rel="stylesheet" href="css/normalize.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet"> 
    <title>Educational Game | Прохождение уровня</title>
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
                    <a href="logout.php" class="profile-container__logout">Выйти</a>
                </div>
            </div>
        </div>
    <p class="main__text main__text--modifed">Прохождение уровня</p>
    </header>

    <main class="main main--modifed">
        <p class="main__task"> <?php echo $question; ?> </p>

        <form class="btn-container btn-container--modifed" method="post">
            <?php
                $btn1;
                $btn2;
                $btn3;

                $tmp = rand(1, 3);
                switch($tmp) {
                    case 1:
                        $btn1 = $user->ans;
                        $btn2 = rand($user->ans - 20, $user->ans + 20);
                        $btn3 = rand($user->ans - 20, $user->ans + 20);
                    break;

                    case 2:
                        $btn1 = rand($user->ans - 20, $user->ans + 20);
                        $btn2 = $user->ans;
                        $btn3 = rand($user->ans - 20, $user->ans + 20);
                    break;

                    case 3:
                        $btn1 = rand($user->ans - 20, $user->ans + 20);
                        $btn2 = rand($user->ans - 20, $user->ans + 20);
                        $btn3 = $user->ans;
                    break;
                }

                $uniTXT = "?type=".$data2["type"]."&level=".$data2["level"]."&ans=";
            ?>
            <button type="button" class="btn-container__btn btn-container__btn--modifed btn" onclick="document.location.href = '/check.php<?php echo $uniTXT.$btn1?>';"><?php echo $btn1 ?></button>
            <button type="button" class="btn-container__btn btn-container__btn--modifed btn" onclick="document.location.href = '/check.php<?php echo $uniTXT.$btn2?>';"><?php echo $btn2 ?></button>
            <button type="button" class="btn-container__btn btn-container__btn--modifed btn" onclick="document.location.href = '/check.php<?php echo $uniTXT.$btn3?>';"><?php echo $btn3 ?></button>
        </form>

        <a href="math.php" class="main__route-btn">Выбрать другой уровень</a>
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