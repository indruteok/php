<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Prisijungimas</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="m-3 bg-light text-center">
        <?php
        session_start();
        if (isset($_COOKIE['wrong']) && $_COOKIE['wrong'] == 'wrong') {
            echo "Netinkami prisijungimo duomenys, patikslinkite";
        }

        setcookie('wrong', "", time() - 10);
        ?>
        <form action='vidus.php' method='post'>
            <p> Vardas:</p>
            <input type="text" name="name" >
            <p> Pavardė:</p>
            <input type="text" name="lastname">
            <p>  Slaptažodis: </p>
            <input type="password" name="password">

            <input type="hidden" name="act" value="act">
            <p></p>
            <button>Prisijungti </button>

        </form>
    </body>
</html>

