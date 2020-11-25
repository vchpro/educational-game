<?php
	require 'db.php';
    $data = $_POST;
    $data2 = $_GET;

    if($user->ans == "0" && $data2["type"] != "day") {
        echo "<script>document.location.href = '/choose.php';</script>";
        die;
    }


    if(isset ($data2["type"]) && isset ($data2["level"])) {
        switch($data2["type"]) {
            case "math":
        		if($data2["ans"] == $user->ans) {
                    $user->ans = 0;
                    if($user->control != 0 && $user->checkcontrol == 2) {
                        $tmp = $user->control / 2;
                        $user->points += $user->control + $user->control / 2;
                        $user->control = 0;
                        $user->checkcontrol = 0;
                        R::store($user);
                        echo "<script>document.location.href = '/control.php?other=".$tmp."';</script>";
                    }
                    else {
                        $user->points += 5;
                        $user->math_level += 1;
                        R::store($user);
                        echo "<script>document.location.href = '/test.php?other=good&type=math&level=".$data2["level"]."';</script>"; 
                    }
                }
                else {
                    if($user->checkcontrol == 2) {
                        $tmp = $user->control;
                        $user->control = 0;
                        $user->checkcontrol = 0;
                        R::store($user);
                        echo "<script>document.location.href = '/control.php?bad=".$tmp."';</script>";
                    }
                    else {
                        $user->ans = 0;
                        R::store($user);
                        echo "<script>document.location.href = '/test.php?other=bad&type=math&level=".$data2["level"]."';</script>";
                    }
                }
            	break;
            
            case "logic":
        		if($data2["ans"] == $user->ans) {
        			$user->ans = 0;
                    if($user->control != 0 && $user->checkcontrol == 2) {
                        $tmp = $user->control / 2;
                        $user->points += $user->control + $user->control / 2;
                        $user->checkcontrol = 0;
                        R::store($user);
                        echo "<script>document.location.href = '/control.php?other=".$tmp."';</script>";
                    }
        			else {
                        $user->points += 5;
                        $user->logic_level += 1;
                        R::store($user);
                        echo "<script>document.location.href = '/test.php?other=good&type=logic&level=".$data2["level"]."';</script>";
                    }
        		}
                else {
                    if($user->control != 0 && $user->checkcontrol == 2) {
                        $tmp = $user->control;
                        $user->control = 0;
                        $user->checkcontrol = 0;
                        R::store($user);
                        echo "<script>document.location.href = '/control.php?bad=".$tmp."';</script>";
                    }
                    else {
                	    $user->ans = 0;
        			    R::store($user);
                        echo "<script>document.location.href = '/test.php?other=bad&type=logic&level=".$data2["level"]."';</script>";
                    }
                }
            break;


            case "day":
                $question = R::findOne('questions', 'id = ?', array(0));
                if($data2["ans"] == $question->ans) {
                        $user->points += 50;
                        $user->today_complete = 1;
                        R::store($user);
                        echo "<script>document.location.href = '/choose.php?good=1".$tmp."';</script>";
        		}
                else {
                    echo "<script>document.location.href = '/choose.php?bad=1".$tmp."';</script>";
                }
            break;

            default:
                echo "<script>document.location.href = '/choose.php';</script>";
            break;
        }

    }
?>