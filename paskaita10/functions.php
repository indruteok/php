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

        function duomeuIvedimasIDB() {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

            if (null !== filter_input(INPUT_POST, 'act', FILTER_SANITIZE_STRING) && filter_input(INPUT_POST, 'act', FILTER_SANITIZE_STRING) == 'act') {

                $mysqli = mysqli_connect("localhost", "root", "", "selgossausainine");
                if (mysqli_connect_errno()) {
                    printf(mysqli_connect_error());
                    exit();
                } else {
                    $sql = "INSERT INTO users (name, surname, username, password, email) VALUES ('" . $name . "','" . $surname . "', '" . $username . "' ,'" . $password . "','" . $email . "')";
                    $res = mysqli_query($mysqli, $sql);

                    // klaidos tikrinimas:                   
                    if ($res) {
                        echo "Jūs sėkmingai užsiregistravote, prisijunkite";
                    } else {
                        echo mysqli_error($mysqli);
                        ?>
                        <h4>Varotojo vardas nėra unikalus!<br>
                            <a href="registracija.php" > Pakartoti duomenų įvedima, su kitokiu vartotojo vardu</a> 
                        </h4>
                        <br>
                        <br>
                        <?php
                    }
                    mysqli_close($mysqli);
                }
            }
        }

// Funkcija ivedanti pirkejo krepeselio duomenis
        function orderDuomenuIvedimasIDB() {
            $operation = filter_input(INPUT_POST, 'operation', FILTER_SANITIZE_STRING);
            $username = filter_input(INPUT_COOKIE, 'username', FILTER_SANITIZE_STRING);
            $addKiekis=filter_input(INPUT_POST, 'addKiekis', FILTER_SANITIZE_STRING);

            $username;

            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

            if (null !== filter_input(INPUT_POST, 'act2', FILTER_SANITIZE_STRING) && filter_input(INPUT_POST, 'act2', FILTER_SANITIZE_STRING) == 'act3') {

                $mysqli = mysqli_connect("localhost", "root", "", "selgossausainine");
                if (mysqli_connect_errno()) {
                    printf(mysqli_connect_error());
                    exit();
                } else {
                    $sql2 = "INSERT INTO orders (usernameId, selected, kiekis) VALUES ((SELECT id FROM users WHERE username ='" . $username . "'),'" . $operation . "', '".$addKiekis."')";
                    $res2 = mysqli_query($mysqli, $sql2);

                    // klaidos tikrinimas:                   
                    if ($res2) {
                        echo "success";
                    } else {
                        echo mysqli_error($mysqli);
                    }

                    mysqli_close($mysqli);
                }
            }
        }

        function arPrisijunge() {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

            $username;

            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            if (null !== filter_input(INPUT_POST, 'act2', FILTER_SANITIZE_STRING) && filter_input(INPUT_POST, 'act2', FILTER_SANITIZE_STRING) == 'act2') {

                $mysqli = mysqli_connect("localhost", "root", "", "selgossausainine");
                $sql = "SELECT * FROM users WHERE username = '" . $username . "' AND password ='" . $password . "'";

                $login_result = mysqli_query($mysqli, $sql);
                $count = mysqli_num_rows($login_result);
                echo $count;
                if ($count == 1) {
                    session_start();
                    if (!isset($_SESSION['is_logged_in'])) {
                        $_SESSION['is_logged_in'] = 1;
                    }
                    if (!isset($_SESSION['username'])) {
                        $_SESSION['username'] = $username;
                    }
                    if (!isset($_SESSION['password'])) {
                        $_SESSION['password'] = $password;
                    }

                    header("Location: http://localhost/paskaita10/sarasas.php");
                } else {
                    header("Location: http://localhost/paskaita10/prisijungimas.php");
                    setcookie('wrong', 'wrong');
                }
            }
        }

//if blokas patikrinimui, ar yra sausainiai(username,pass){
//blokas su prisijungimu į db ir užklausa, išvedančia Orders lentelės rezultatus, kurių username atitinka
//sausainį. rezultatuRinkinio išspausdinimas.
        // kiek  tokiu pat id registracijoje:
        function userCountOrders() {
            $username = filter_input(INPUT_COOKIE, 'username', FILTER_SANITIZE_STRING);
            $mysqli = mysqli_connect("localhost", "root", "", "selgossausainine");
            mysqli_set_charset($mysqli, "utf8");  // funkcija kuri ištraukiant sutvarko lietuviškas raides.

            if (mysqli_connect_errno()) {
                printf(mysqli_connect_error());
                exit();
            } else {
                $sql2 = "SELECT users.username, orders.selected, items.Pavadinimas, items.kaina,  SUM(orders.kiekis) AS kiekis "
                        . "FROM users "
                        . "JOIN orders ON users.id=orders.usernameId "
                        . "JOIN items ON items.id=orders.selected "
                        . "WHERE users.username='" . $username . "' "
                        . "GROUP BY orders.selected; ";
                $res2 = mysqli_query($mysqli, $sql2);

                echo "<b>Sveiki, " . $username . "</b><br/>";
                echo "<b>Jūsu krepšelyje šiuo metu yra:</b><br/>";


                if ($res2) {
                    while ($newArray = mysqli_fetch_array($res2, MYSQLI_ASSOC)) { //imama iekviena nauja rezultatu eilute. kiekviena eilute irasoma i atskira masyva. Pavercia i string 
                        $username = $newArray['username'];
                        $selected = $newArray['Pavadinimas'];
                        $kiekis = $newArray['kiekis'];
                        $kaina = $newArray['kaina'];
//                        $addKiekis=$newArray['addKiekis'];
                        $suma = $kiekis * $kaina;


                        echo $kiekis . " vnt " . $selected . " kurių vieneto kaina yra <b>" . $kaina . "eu </b> viso: <b>" . $suma . "</b> eu.<br/>";
                    }
                } else {
                    printf("Could not insert record: %s\n", mysqli_error($mysqli));
                }
                // klaidos tikrinimas:                   
                if ($res2) {
//                        echo "success";
                } else {
                    echo mysqli_error($mysqli);
                }
                mysqli_close($mysqli);
            }
        }

        // suma uzsakymo generuojama




        function getOrderSum() {
            $username = filter_input(INPUT_COOKIE, 'username', FILTER_SANITIZE_STRING);
            $mysqli = mysqli_connect("localhost", "root", "", "selgossausainine");
            mysqli_set_charset($mysqli, "utf8");  // funkcija kuri ištraukiant sutvarko lietuviškas raides.

            if (mysqli_connect_errno()) {
                printf(mysqli_connect_error());
                exit();
            } else {
                $sql2 = "SELECT SUM(items.kaina*kiekis) AS TotalSum "
                        . "FROM users "
                        . "JOIN orders ON users.id=orders.usernameId "
                        . "JOIN items ON items.id=orders.selected "
                        . "WHERE users.username='" . $username . "' "
                        . "GROUP BY users.username";
                $res2 = mysqli_query($mysqli, $sql2);

                if ($res2) {
                    while ($newArray = mysqli_fetch_array($res2, MYSQLI_ASSOC)) { //imama iekviena nauja rezultatu eilute. kiekviena eilute irasoma i atskira masyva. Pavercia i string 
                        $TotalSum = $newArray['TotalSum'];

                        if ($TotalSum > 10) {
                            echo "Jūsų krepšelio suma: <b>" . $TotalSum . "eu. </b>";
                            $nuolaida = $TotalSum * 0.05;
                            echo "<br/> Jums pritaikyta 5% nuolaida <br/>" . $nuolaida;

                            $ats = $TotalSum - $nuolaida;
                            echo "<br/><b>Galutinė suma apmokėjimui: " . $ats."eu.</b><br>";
                        } else {
                        echo $TotalSum . "<br/>";
                    }}
                } else {
                    printf("Could not insert record: %s\n", mysqli_error($mysqli));
                }              
                if ($res2) {
//                        echo "success";
                } else {
                    echo mysqli_error($mysqli);
                }
                mysqli_close($mysqli);
            }
        }
        ?>
    </body>
</html>
