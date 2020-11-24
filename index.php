<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet"> 
    <title>Educational Game | Главная</title>
</head>
<body>
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

    <main class="main">
        <p class="main__text">Образовательные интерактивные игры для школьников</p>
        <button type="button" class="main__auth auth">Авторизация</button>

        <div class="decorate">
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
    <form method="POST" class="reg hide">
        <div class="reg-center">
            <h2 class="reg-center__heading">Регистрация</h2>
            <span class="reg-center__close">
                <span class="visually-hidden">Закрыть меню</span>
            </span>
        </div>
        <input type="text" name="user_name" maxlength="64" class="reg__input" placeholder="Имя">
        <input type="text" name="user_email" maxlength="128" class="reg__input" placeholder="E-mail">
        <input type="text" name="user_pass" maxlength="128" class="reg__input" placeholder="Пароль">
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
        <input type="text" name="user_pass" maxlength="128" class="login__input" placeholder="Пароль">
        <button type="submit" class="login__button" name="do_login">Войти</button>
        <button type="button" class="login__yet">Еще не зарегистрированы?</button>
    </form>
    <script src="js/script.js"></script>
</body>
</html>