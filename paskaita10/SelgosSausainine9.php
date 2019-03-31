<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Selgos Sausaininė</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="m-3 bg-light text-center">

        <?php
        setcookie('username', "", time() - 10);
        ?>

    </body >
<!--<p>Sveiki,  <?php echo $username; ?> </p>-->
    <h1 class="mb-5">Selgos Sausaininė: </h1>
    <p>Jei esate naujas vartotojas, prisiregistruokite:</p>
    <h2><a href = 'registracija.php'> Registracija </a></h2>
    <p>Jei esate prisiregistravęs, prisijunkite</p>
    <h2><a href = 'prisijungimas.php'> Prisijungimas</a></h2>
</html>
