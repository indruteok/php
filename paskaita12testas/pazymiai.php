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
        session_start();
        echo "Sveiki, " . $_SESSION['username'] . $_SESSION['id'];

        $mysqli = mysqli_connect("localhost", "root", "", "test");
        $sql = "SELECT * FROM pazymiai WHERE userid = '" . $_SESSION['id'] . "'";

        $res2 = mysqli_query($mysqli, $sql);
        echo "<p class='mt-3'> turimi pazymiai: </p> ";

        if ($res2) {
            while ($newArray = mysqli_fetch_array($res2, MYSQLI_ASSOC)) { //imama iekviena nauja rezultatu eilute. kiekviena eilute irasoma i atskira masyva. Pavercia i string 
                $pazimys = $newArray['pazimys'];

                echo "<br>" . $pazimys;
            }
        }

        mysqli_close($mysqli);
        ?>



        <br><a href="login.php"><button class=" mt-2 btn btn-warning"  type="button">Grįžti</button></a>
        <br><a href="index.php"><button class=" mt-2 btn btn-danger"  type="button">Atsijungti</button></a>

    </body>
</html>
