<?php
if (filter_has_var(INPUT_COOKIE, "exit")) {
    setcookie("username", NULL, time() - 3600);
    setcookie("password", NULL, time() - 3600);
    setcookie("duplicate", NULL, time() - 3600);
    setcookie("wrong_username", NULL, time() - 3600);
    setcookie("wrong_password", NULL, time() - 3600);
    setcookie("exit", NULL, time() - 3600);
}
?>
<!DOCTYPE html>
<html lang="lt">
    <head>
        <meta charset="UTF-8">
        <title>Sausaininė</title>
        <link rel="shortcut icon" href="img/favicon.ico" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/style.css">
    </head>
    <body>
        <div class="container h-100 d-flex flex-column">
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand slide-left" href="#">
                    <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top logo" alt="">
                    UAB Sausaininė
                </a>
            </nav>
            <div class="row h-100 text-center">
                <div class="m-auto">
                    <div class="m-3 slide-right">
                        <a href="prisijungimas.php"><button type="button" class="btn btn-primary btn-lg">Prisijungti</button></a>
                    </div>
                    <div class="m-3 slide-right">
                        <a href="registracija.php"><button type="button" class="btn btn-secondary btn-lg">Registruotis</button></a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>