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

        <h2>Užsakymas</h2>
        <?php
        if (isset($_POST['username']) && (!empty($_POST['username']))) {
            $username = $_POST['username'];
            setcookie('username', $username);
        } elseif (isset($_COOKIE['username'])) {
            $username = $_COOKIE['username'];
        } else {
            $username = 'Svecias';
        }

//if blokas patikrinimui, ar yra sausainiai(username,pass){
//blokas su prisijungimu į db ir užklausa, išvedančia Orders lentelės rezultatus, kurių username atitinka
//sausainį. rezultatuRinkinio išspausdinimas.

        include 'functions.php';
        userCountOrders();
        getOrderSum();
        
        
        ?>

        <a href="sarasas.php"><button class=" mt-2 btn btn-warning"  type="button">Tęsti apsipirkimą</button></a>
    </body>
</html>
