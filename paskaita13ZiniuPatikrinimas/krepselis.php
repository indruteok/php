<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Krepselis </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>
    <body class="m-3 bg-light text-center">
        <?php
        session_start();

        echo "<h2 mb-5> Krepšelio turinys</h2> ";
        $failoPavadinimas = "cart_user" . $_SESSION['id'] . ".txt";
        $read = file($failoPavadinimas);

        $i = 0;
        $j = 0;
        $ilgis = sizeof($read);
        while ($ilgis > $i) {
            echo "$read[$i]<br>";
            $i++;
        }

        unlink($failoPavadinimas);
        ?>
        <a href="vidus.php"><button class=" mt-2 btn btn-warning" type="button">Grįžti</button></a>
    </body>
</html>
