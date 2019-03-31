<?php
// Checking if all register form data received
if (filter_has_var(INPUT_POST, "firstname") && filter_has_var(INPUT_POST, "lastname") && filter_has_var(INPUT_POST, "username") && filter_has_var(INPUT_POST, "email") && filter_has_var(INPUT_POST, "password") && filter_has_var(INPUT_POST, "password2")) {

    // Assigning received data to variables
    $firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    $password2 = filter_input(INPUT_POST, "password2", FILTER_SANITIZE_STRING);

    // Including defined variables
    include_once './inc/variables.php';

    // Establishing connection to database
    include_once './inc/connection.php';
    $connection = new connection($database_hostname, $database_username, $database_password, $database_name);

    // Preparing error array
    $errors = array();

    // Checking if firstname is valid
    if (empty($firstname)) {
        array_push($errors, "Vardas negali būti tuščias!");
    } else if (strlen($firstname) > $firstname_length) {
        array_push($errors, "Vardas negali būti ilgesnis negu " . $firstname_length . " simbolių!");
    }

    // Checking if lastname is valid
    if (empty($lastname)) {
        array_push($errors, "Pavardė negali būti tuščia");
    } else if (strlen($lastname) > $lastname_length) {
        array_push($errors, "Pavardė negali būti ilgesnė negu " . $lastname_length . " simbolių!");
    }

    // Checking if username is valid
    if (empty($username)) {
        array_push($errors, "Vartotojo vardas negali būti tuščias!");
    } else if (strlen($username) > $username_length) {
        array_push($errors, "Vartotojo vardas negali būti ilgesnis negu " . $username_length . " simbolių!");
    } else if (!$connection->isUnique($username, 'users', 'username')) {
        array_push($errors, "Toks vartotojas jau egzistuoja!");
    }

    if (empty($email)) {
        array_push($errors, "El. Paštas negali būti tuščias!");
    } else if (strlen($email) > $email_length) {
        array_push($errors, "El. Paštas negali būti ilgesnis negu " . $email_length . " simbolių!");
    }

    // Checking if password is valid and is equal to repeated password
    if (empty($password)) {
        array_push($errors, "Slaptažodis negali būti tuščias!");
    } else if (strlen($password) > $password_length) {
        array_push($errors, "Slaptažodis negali būti ilgesnis negu " . $password_length . " simbolių!");
    } else if (empty($password2)) {
        array_push($errors, "Pakartotinas slaptažodis negali būti tuščias!");
    } else if ($password != $password2) {
        array_push($errors, "Slaptažodžiai nesutampa!");
    }

    // Checking how many errors after checking data
    if (count($errors) == 0) {

        // Registering new user
        $result = $connection->registerUser($firstname, $lastname, $username, $email, md5($password));

        // Checking if register was successful
        if ($result) {

            // Setting variable to display message
            $success = TRUE;
        } else {
            printf("REGISTER ERROR");
            exit();
        }
    }
}

// Displaying page
?>
<!DOCTYPE html>
<html lang="lt">
    <head>
        <meta charset="UTF-8">
        <title>Registracija | Sausaininė</title>
        <link rel="shortcut icon" href="img/favicon.ico" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/style.css">
    </head>
    <body>
        <div class="container h-100 d-flex flex-column text-center">
            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand slide-left" href="#">
                    <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top logo" alt="">
                    UAB Sausaininė
                </a>
                <div class="my-2 my-lg-0 slide-right">
                    <a href="index.php"><button class="btn btn-outline-dark my-2 my-sm-0">Atgal</button></a>
                </div>
            </nav>
            <h1 class="display-3 text-center my-3 slide-top">Registracija</h1>
            <?php if (isset($errors) && count($errors) > 0) { ?>
                    <ul class="list-group w-25 mx-auto my-3">
                        <?php foreach ($errors AS $value) { ?>
                            <li class="list-group-item list-group-item-danger d-inline my-1"><?php echo $value; ?></li>
                        <?php } ?>
                    </ul>
            <?php } else if (isset($success) && $success == TRUE) { ?>
                <div class="alert alert-success d-table mx-auto" role="alert">Registracija sėkminga
                    <div>Po 5 sekundžių būsite nukreipti į prisijungimą</div>
                    <div><a href="prisijungimas.php" class="alert-link">Prisijungimas</a></div>
                </div>
                <?php header("Refresh:5; url=prisijungimas.php", true, 303); ?>
            <?php } ?>
            <div class="row text-center">
                <div class="mx-auto slide-bottom">
                    <form action="registracija.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Vardas" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Pavardė" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Vartotojo vardas" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="El. Paštas" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Slaptažodis" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password2" name="password2" placeholder="Pakartokite slaptažodį" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Registruotis</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>