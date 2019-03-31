<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Testas</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body     <body class="m-3 bg-light text-center">
        <?php
        session_start();
        session_reset();
        if (isset($_COOKIE['wrong']) && $_COOKIE['wrong'] == 'wrong') {
            echo " Netinkamas prisijungimo vardas arba slaptažodis";
        }
        setcookie('wrong', "", time() - 10);
        ?>
        <h2 class="mb-5">Prisijungimas prie testo:</h2>
        <form  action='login.php' method='post'>
            Vartotojo vardas: <input type='text' name='username'><br>
            Slaptazodis: <input type='password' name='password'><br>
            <input type="hidden" name ="act2" value="act2">
            <button class=" mt-2 btn btn-success" >Prisijungti</button>
        </form>
    </body>
</html>






