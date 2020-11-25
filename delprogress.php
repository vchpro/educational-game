<?php
    require 'db.php';

    if (! isset($_SESSION['logged_user']) ) {
        echo "<script>document.location.href = '/index.php';</script>";
    }

    $data2 = $_GET;

    if(isset ($data2["math"]) && $user->math_level > 12) {
        $user->math_level = 1;
        R::store($user);
        echo "<script>document.location.href = '/math.php';</script>";
    }

    if(isset ($data2["logic"]) && $user->logic_level > 16) {
        $user->logic_level = 1;
        R::store($user);
        echo "<script>document.location.href = '/logic.php';</script>";
    }