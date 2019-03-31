<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        function arPrisijunge() {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $username;

            if (null !== filter_input(INPUT_POST, 'act2', FILTER_SANITIZE_STRING) && filter_input(INPUT_POST, 'act2', FILTER_SANITIZE_STRING) == 'act2') {

                $mysqli = mysqli_connect("localhost", "root", "", "test");
                $sql = "SELECT * FROM users WHERE username = '" . $username . "' AND password ='" . $password . "'";
                $sql2 = "SELECT id FROM users WHERE username ='" . $username . "'";

                $res2 = mysqli_query($mysqli, $sql2);
                $login_result = mysqli_query($mysqli, $sql);

                if ($res2) {
                    while ($newArray = mysqli_fetch_array($res2, MYSQLI_ASSOC)) { //imama iekviena nauja rezultatu eilute. kiekviena eilute irasoma i atskira masyva. Pavercia i string 
                        $id = $newArray['id'];
                    }
                }

                $count = mysqli_num_rows($login_result);
                echo $count;

                if ($count == 1) {
                    session_start();

                    if (!isset($_SESSION['is_logged_in'])) {
                        $_SESSION['is_logged_in'] = 1;
                    }
                    if (!isset($_SESSION['username'])) {
                        $_SESSION['username'] = $username;
//                        echo $username;
                    }
                    if (!isset($_SESSION['id'])) {

                        $_SESSION['id'] = $id;
//                        echo $id;
                    }
                    header("Location: http://localhost/paskaita12testas/login.php");
                } else {
                    header("Location: http://localhost/paskaita12testas/index.php");
                    setcookie('wrong', 'wrong');
                }
            }
        }

        function pazymioIkelimasIDB() {


            $mysqli = mysqli_connect("localhost", "root", "", "test");
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            } else {
                $sql = "INSERT INTO pazymiai (userid, pazimys) VALUES ('" . $_SESSION['id'] . "','" . $_SESSION['pazimys'] . "')";
                
                
                $res = mysqli_query($mysqli, $sql);
                if ($res == TRUE) {
                   // echo "A record has been inserted";
                } else {
                    printf("Could not insert record: %s\n", mysqli_error($mysqli));
                }
                mysqli_close($mysqli);
            }
        }
        ?>
    </body>
</html>
