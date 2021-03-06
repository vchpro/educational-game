<?php 
    require 'db.php';

    $data = $_POST;

    if (isset($_SESSION['logged_user']) ) {
        echo "<script>document.location.href = '/choose.php';</script>";
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
    <title>Educational Game | Главная</title>
</head>
<body>
    <?php
        if ( isset($data['do_login']) )
    {
        $user = R::findOne('users', 'email = ?', array($data['user_email']));
        if ( $user )
        {
            if ( password_verify($data['user_pass'], $user->password) )
            {
                $_SESSION['logged_user'] = $data['user_email'];
                echo "<script>document.location.href = '/choose.php';</script>";
            }else
            {
                $errors[] = 'Неверно введен пароль';
            }

        }else
        {
            $errors[] = 'Пользователь с таким Email не найден';
        }
        
        if ( ! empty($errors) )
        {
           echo "
                <div class='error'>
                    <span class='error__heading'>Ошибка</span>
                    <span class='error__text'>".array_shift($errors)."</span>
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

        if ( isset($data['do_reg']) )
    {
        $errors = array();
        if ( trim($data['user_name']) == '' )
        {
            $errors[] = 'Введите логин';
        }

        if ( trim($data['user_email']) == '' )
        {
            $errors[] = 'Введите Email';
        }

        if ( $data['user_pass'] == '' )
        {
            $errors[] = 'Введите пароль';
        }
    
        if ( R::count('users', "email = ?", array($data['user_email'])) > 0)
        {
            $errors[] = 'Пользователь с таким Email уже существует';
        }

        if ( R::count('users', "name = ?", array($data['user_name'])) > 0)
        {
            $errors[] = 'Пользователь с таким логином уже существует';
        }

        if(strlen($data['user_name']) > 64) {
            $errors[] = 'Логин должен состоять не более чем из 64 символов';
        }

        if(strlen($data['user_email']) > 128) {
            $errors[] = 'Email должен состоять не более чем из 128 символов';
        }

        if(strlen($data['user_pass']) > 128) {
            $errors[] = 'Пароль должен состоять не более чем из 128 символов';
        }

        if (filter_var($data['user_email'], FILTER_VALIDATE_EMAIL) === false)
        {
            $errors[] = 'Введите корректный Email';
        }



        if ( empty($errors) )
        {
            $user = R::dispense('users');
            $user->name = $data['user_name'];
            $user->email = $data['user_email'];
            $user->password = password_hash($data['user_pass'], PASSWORD_DEFAULT);
            R::store($user);
            $_SESSION['logged_user'] = $data['user_email'];
            echo "<script>document.location.href = '/choose.php';</script>";
        }
        else {
            echo "
                <div class='error'>
                    <span class='error__heading'>Ошибка</span>
                    <span class='error__text'>".array_shift($errors)."</span>
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
?>
    <header class="header">
        <div class="header-container">
            <h1 class="header-container__heading">
                <a>Educational Game</a>
            </h1>
            <span class="header-container__burger">
                <span class="visually-hidden">Меню</span>
            </span>
            <button type="button" class="auth header-container__auth">Авторизация</button>
        </div>
    </header>

    <main class="main main--long5">
        <p class="main__text">Образовательные интерактивные игры для школьников</p>
        <button type="button" class="main__auth auth">Авторизация</button>

        <div class="decorate">
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

            <!-- <span class="footer__count">Ваше количество очков: 1000</span> -->
            <span class="footer__count">Проект с открытым исходным кодом</span>
        </div>
    </footer>
    <section class="mobile-menu hide">
        <div class="mobile-center">
            <h2 class="mobile-center__heading">Educational Game</h2>
            <span class="mobile-center__close">
                <span class="visually-hidden">Закрыть меню</span>
            </span>
        </div>
    <button type="button" class="mobile-menu__auth main__auth auth">Авторизация</button>

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

    <!-- Нужно заполнить action!!! -->
    <form method="POST" action="index.php" class="reg hide">
        <div class="reg-center">
            <h2 class="reg-center__heading">Регистрация</h2>
            <span class="reg-center__close">
                <span class="visually-hidden">Закрыть меню</span>
            </span>
        </div>
        <input type="text" name="user_name" maxlength="64" class="reg__input" placeholder="Логин">
        <input type="text" name="user_email" maxlength="128" class="reg__input" placeholder="E-mail">
        <input type="password" name="user_pass" maxlength="128" class="reg__input" placeholder="Пароль">
        <button type="submit" class="reg__button" name="do_reg">Зарегистрироваться</button>
        <button type="button" class="reg__yet">Уже зарегистрированы?</button>
    </form>

    <!-- Нужно заполнить action!!! -->
    <form method="POST" class="login hide">
        <div class="login-center">
            <h2 class="login-center__heading">Вход</h2>
            <span class="login-center__close">
                <span class="visually-hidden">Закрыть меню</span>
            </span>
        </div>
        <input type="text" name="user_email" maxlength="128" class="login__input" placeholder="E-mail">
        <input type="password" name="user_pass" maxlength="128" class="login__input" placeholder="Пароль">
        <button type="submit" class="login__button" name="do_login">Войти</button>
        <button type="button" class="login__yet">Еще не зарегистрированы?</button>
    </form>
    <script src="js/script.min.js"></script>
</body>
</html>