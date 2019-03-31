
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
    <body class="m-3 bg-light text-center" >
        <?php
        if (isset($_POST['username']) && (!empty($_POST['username']))) {
            $username = $_POST['username'];
            setcookie('username', $username);
        } elseif (isset($_COOKIE['username'])) {
            $username = $_COOKIE['username'];
        } else {
            $username = 'Svecias';
        }
        ?>

<!--       <p>Sveiki,  <?php echo $username; ?> </p>-->
        <h1>Registracija</h1>
        <form action="prisijungimas.php" method="POST">
            Vardas:<br>
            <input type="text" name="name"><br>
            Pavardė:<br>
            <input type="text" name="surname"><br>
            Vartotojo vardas:<br>
            <input type="text" name="username"><br>
            Slaptažodis:<br>
            <input type="password" name="password"><br>
            El. paštas<br>
            <input type="email" name="email"><br>
            <br>
            <input type="hidden" name ="act" value="act">
            <input class="btn btn-success" type="submit" name="submit" value="Registruotis">
        </form>              
    </body>
</html>



