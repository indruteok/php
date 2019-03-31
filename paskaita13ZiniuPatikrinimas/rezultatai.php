<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Rezultatas</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="m-3 bg-light text-center">
        <?php
        session_start();
        include 'functions.php';

        $klausimas1 = filter_input(INPUT_POST, 'operation1', FILTER_SANITIZE_STRING);
        $klausimas2 = filter_input(INPUT_POST, 'operation2', FILTER_SANITIZE_STRING);
        $klausimas3 = filter_input(INPUT_POST, 'operation3', FILTER_SANITIZE_STRING);
        $klausimas4 = filter_input(INPUT_POST, 'operation4', FILTER_SANITIZE_STRING);
        $klausimas5 = filter_input(INPUT_POST, 'operation5', FILTER_SANITIZE_STRING);

        if ($klausimas1 != "" && $klausimas2 != "" && $klausimas3 != "" && $klausimas4 != "" && $klausimas5 != "") {
            $vertinimas = ($klausimas1 + $klausimas2 + $klausimas3 + $klausimas4 + $klausimas5) / 5;
            echo "<p> Bedras įverinimas: " . $vertinimas . "</p>";

            $_SESSION['vertinimas'] = $vertinimas;
            vertinimoIvedimasIDB();
        } else {
            header("Location: http://localhost/paskaita13ZiniuPatikrinimas/testas.php");
            setcookie('wrong2', 'wrong2');
        }
        ?>

        <a href="vidus.php"><button class=" mt-2 btn btn-warning"  type="button">Grįžti į pagrindinį puslapį</button></a>
    </body>
</html>
