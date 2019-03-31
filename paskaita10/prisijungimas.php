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
        if (isset($_COOKIE['wrong']) && $_COOKIE['wrong'] == 'wrong') {
            echo " Netinkamas prisijungimo vardas arba slaptažodis";
        }
        setcookie('wrong', "", time() - 10);


        if (isset($_POST['username']) && !empty($_POST['username'])) {
            $username = $_POST['username'];
            setcookie('username', $username);
        } elseif (isset($_COOKIE['username'])) {
            $username = $_COOKIE['username'];
        } else {
            $username = 'Svecias';
        }


        include 'functions.php';
        duomeuIvedimasIDB();
        ?>

        <form action="sarasas.php" method="post">
<!--            <p>Sveiki,  <?php echo $username; ?> </p>-->
            Vartotojo vardas:<br>
            <input type="text" name="username" ><br>
            Slaptažodis:<br>
            <input type="password" name="password"><br>
            <input type="hidden" name ="act2" value="act2">
            <button class=" mt-2 btn btn-success" >Prisijungti</button>
        </form>
    </body>
</html>
