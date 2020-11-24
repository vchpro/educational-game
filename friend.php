<?php
    require 'db.php';
    if (! isset($_SESSION['logged_user']) ) {
        echo "<script>document.location.href = '/index.php';</script>";
    }

    $data = $_POST;
    $data2 = $_GET;

    if(isset($data2["id"])) {
        $user2 = R::findOne('users', 'id = ?', array($data2["id"]));
        if($user2 && $user2->id != $user->id) {
            if(R::count( 'friends', 'user1 = ? AND user2 = ?', [$user->id, $user2->id] ) == 0 && R::count( 'friends', 'user1 = ? AND user2 = ?', [$user2->id, $user->id] ) == 0) {
                $new_friend = R::dispense('friends');
                $new_friend->user1 = $user->id;
                $new_friend->user2 = $data2["id"];
                R::store($new_friend);
            }
        }
    }

    if(isset($data["dell_friend"]) && isset($data["to_dell"])) {
        $find = R::findOne('friends', 'user1 = ?',[$data["to_dell"]]);
        if($find) {
            $delete = R::load('friends', $find->id);
            R::trash($delete);
        }
        else {
            $find = R::findOne('friends', 'user2 = ?',[$data["to_dell"]]);
            $delete = R::load('friends', $find->id);
            R::trash($delete);
        }
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
    <title>Educational Game | Друзья</title>
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
    <p class="main__text main__text--modifed">Друзья</p>
    </header>

    <main class="main main--modifed">
        <div class="friend">
            <p class="friend__name">Ссылка для добавления друзей:</p>
            <span class="friend__url">localhost/friend.php?id=<?php echo $user->id ?></span>
        </div>

        <div class="my-friends">
            <h2 class="my-friends__heading">Ваши друзья</h2>
            <?php
            $friends = R::getAll('SELECT `user1` FROM `friends` WHERE `user2` = '. $user->id);
            foreach ($friends as $friend) {
            $friend_my = R::findOne('users', 'id = ?', array($friend["user1"]));
                echo "
                <form action='friend.php' method='post' class='friend-card'>
                    <input type='hidden' value='$friend_my->id' name='to_dell'>
                    <span class='friend-card__name'>$friend_my->name ($friend_my->points)</span>
                    <button type='submit' name='dell_friend' class='dell_friend'>
                        <span class='visually-hidden'>Удалить друга</span>
                    </button>
                </form>
                ";
            }

            $friends = R::getAll('SELECT `user2` FROM `friends` WHERE `user1` = '. $user->id);
            foreach ($friends as $friend) {
            $friend_my = R::findOne('users', 'id = ?', array($friend["user2"]));
                echo "
                <form action='friend.php' method='post' class='friend-card'>
                    <input type='hidden' value='$friend_my->id' name='to_dell'>
                    <span class='friend-card__name'>$friend_my->name ($friend_my->points)</span>
                    <button type='submit' name='dell_friend' class='dell_friend'>
                        <span class='visually-hidden'>Удалить друга</span>
                    </button>
                </form>
                ";
            }
            ?>
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