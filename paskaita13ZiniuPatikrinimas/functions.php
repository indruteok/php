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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="m-3 bg-light text-center">
        <?php

        function arPrisijunge() {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            if (null !== filter_input(INPUT_POST, 'act', FILTER_SANITIZE_STRING) && filter_input(INPUT_POST, 'act', FILTER_SANITIZE_STRING) == 'act') {
                $mysqli = mysqli_connect("localhost", "root", "", "ziniuPatikrinimas");
                $sql = "SELECT * FROM vartotojai WHERE vardas = '" . $name . "' AND pavarde ='" . $lastname . "' AND slaptazodis ='" . $password . "'";
                $sql2 = "SELECT id FROM vartotojai WHERE vardas ='" . $name . "'";

                $res2 = mysqli_query($mysqli, $sql2);
                $login_result = mysqli_query($mysqli, $sql);

                if ($res2) {
                    while ($newArray = mysqli_fetch_array($res2, MYSQLI_ASSOC)) { //imama iekviena nauja rezultatu eilute. kiekviena eilute irasoma i atskira masyva. Pavercia i string 
                        $id = $newArray['id'];
                    }
                }

                $count = mysqli_num_rows($login_result);

                if ($count == 1) {
                    session_start();
                    if (!isset($_SESSION['is_logged_in'])) {
                        $_SESSION['is_logged_in'] = 1;
                    }
                    if (!isset($_SESSION['name'])) {
                        $_SESSION['name'] = $name;
                        setcookie($name, time() + (3600 * 4)); //3600  - 1 valanda
                    }
                    if (!isset($_SESSION['lastname'])) {
                        $_SESSION['lastname'] = $lastname;
                        setcookie($lastname, time() + (3600 * 4));
                    }
                    if (!isset($_SESSION['id'])) {
                        $_SESSION['id'] = $id;
                        setcookie($id, time() + (3600 * 4));
                    }
                    header("Location: http://localhost/paskaita13ZiniuPatikrinimas/vidus.php");
                } else {
                    header("Location: http://localhost/paskaita13ZiniuPatikrinimas/sistema.php");
                    setcookie('wrong', 'wrong');
                }
                mysqli_close($mysqli);
            }
        }

        function vertinimoIvedimasIDB() {
            $mysqli = mysqli_connect("localhost", "root", "", "ziniupatikrinimas");
            if (mysqli_connect_errno()) {

                printf(mysqli_connect_error());
                exit();
            } else {
                $sql = "INSERT INTO vertinimas1 (vartotojo_id, vidurkis) VALUES ('" . $_SESSION['id'] . "', '" . $_SESSION['vertinimas'] . "')";
                $res = mysqli_query($mysqli, $sql);

                if ($res) {
                    
                } else {
                    echo mysqli_error($mysqli);
                }
                mysqli_close($mysqli);
            }
        }
        ?>
    </body>
</html>
