<?php
	require 'db.php';
    $data = $_POST;
    $data2 = $_GET;

    if($user->ans == "0") {
        var_dump($user->ans);
        echo "<script>document.location.href = '/choose.php';</script>";
        die;
    }

    if(isset ($data2["type"]) && isset ($data2["level"])) {
        switch($data2["type"]) {
        	case "math":
        		if($data2["ans"] == $user->ans) {
        			$user->points += 5;
        			$user->math_level += 1;
        			$user->ans = 0;
        			R::store($user);
                    echo "<script>document.location.href = '/test.php?other=good&type=math&level=".$data2["level"]."';</script>";
        		}
                else {
                	$user->ans = 0;
        			R::store($user);
                    echo "<script>document.location.href = '/test.php?other=bad&type=math&level=".$data2["level"]."';</script>";
                    die;
                }
            	break;
            
            case "logic":
        		if($data2["ans"] == $user->ans) {
        			$user->points += 5;
        			$user->logic_level += 1;
        			$user->ans = 0;
        			R::store($user);
                    echo "<script>document.location.href = '/test.php?other=good&type=logic&level=".$data2["level"]."';</script>";
        		}
                else {
                	$user->ans = 0;
        			R::store($user);
                    echo "<script>document.location.href = '/test.php?other=bad&type=logic&level=".$data2["level"]."';</script>";
                    die;
                }
            break;

            default:
                echo "<script>document.location.href = '/choose.php';</script>";
                die;
            break;
        }

    }
?>