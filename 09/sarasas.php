<?php
// Starting session
session_start();

// Checking if user is logged in
if (isset($_SESSION["logged_in"])) {

    // Including defined variables
    include_once './inc/variables.php';

    // Establishing connection to database
    include_once './inc/connection.php';
    $connection = new connection($database_hostname, $database_username, $database_password, $database_name);

    // Checking if logout POST received
    if (filter_has_var(INPUT_POST, "logout")) {
        session_destroy();
        header('location: prisijungimas.php');
    }

    // Checking if add product POST received
    if (filter_has_var(INPUT_POST, "product") && filter_has_var(INPUT_POST, "quantity")) {
        $product_id = intval(filter_input(INPUT_POST, "product", FILTER_SANITIZE_STRING));
        $quantity = intval(filter_input(INPUT_POST, "quantity", FILTER_SANITIZE_STRING));

        // Preparing error array
        $errors = array();

        // Checking if product is valid
        if (empty($product_id)) {
            array_push($errors, "Nepasirinktas produktas!");
        } else if (!is_int($product_id)) {
            array_push($errors, "Blogai pasirinktas produktas!");
        } else if ($product_id < 1) {
            array_push($errors, "Blogai pasirinktas produktas!");
        } else if ($product_id > $connection->getMaxPorductId()) {
            array_push($errors, "Blogai pasirinktas produktas!");
        }

        // Checking if quantity is valid
        if (empty($quantity)) {
            array_push($errors, "Kiekis negali būti tuščias!");
        } else if (!is_int($quantity)) {
            array_push($errors, "Kiekis turi būti skaičius!");
        } else if ($quantity > $max_order_amount) {
            array_push($errors, "Kiekis negali būti didesnis nei " . $max_order_amount . "!");
        } else if ($quantity < 1) {
            array_push($errors, "Kiekis negali būti mažiau už 1!");
        }

        if (!isset($_SESSION["user_id"])) {
            array_push($errors, "SESSION ERROR: user_id not set!");
        }

        // Checking how many errors after checking data
        if (count($errors) == 0) {

            // Inserting order
            $res = $connection->insertOrder($_SESSION["user_id"], $product_id, $quantity);

            if ($res) {
                $success = TRUE;
            }
        }
    }

    // Getting item list
    $products = $connection->getProducts();

    // Getting order list
    $ordered = $connection->getOrders($_SESSION["user_id"]);

    if ($ordered) {
        $order_sum = $connection->getOrderSum($_SESSION["user_id"]);
    }

    // Displaying page
    ?>
    <!DOCTYPE html>
    <html lang="lt">
        <head>
            <meta charset="UTF-8">
            <title>Sąrašas | Sausaininė</title>
            <link rel="shortcut icon" href="img/favicon.ico" />
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="CSS/style.css">
        </head>
        <body>
            <div class="container h-100 d-flex flex-column">
                <nav class="navbar navbar-light bg-light">
                    <div>
                        <a class="navbar-brand slide-left" href="#">
                            <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top logo" alt="">
                            UAB Sausaininė
                        </a>
                        <div>
                            <h5>Sveiki, <?php echo $_SESSION["username"]; ?></h5>
                        </div>
                    </div>
                    <div class="row">
                        <form action="sarasas.php" method="post" class="form-inline slide-right my-auto">
                            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit" name="logout">Atsijungti</button>
                        </form>
                    </div>
                </nav>
                <?php if (isset($errors) && count($errors) > 0) { ?>
                    <div class="container py-2">
                        <ul class="list-group d-inline">
                            <?php foreach ($errors AS $value) { ?>
                                <li class="list-group-item list-group-item-danger d-block my-1"><?php echo $value; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } else if (isset($success)) { ?>
                    <div class="alert alert-success my-3" role="alert">Prekė sėkmingai pridėta!</div>
                <?php } ?>
                <div class="container">
                    <div class="row my-3">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 my-3">
                        <div>
                            <h3 class="text-center">Išsirinkite prekę</h3>
                        </div>
                        <form action="sarasas.php" method="post" class="w-100">
                            <select name="product" size="10">
                                <?php if (count($products) > 0) { ?>
                                    <?php foreach ($products AS $key => $value) { ?>
                                        <option value="<?php echo $key + 1; ?>"><?php echo $value["name"] . " - " . $value["price"] . " " . $currency_symbol; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                            <div>
                                <h3 class="text-center">Pasirinkite kiekį</h3>
                            </div>
                            <select name="quantity">
                                <?php for ($i = 1; $i <= $max_order_amount; $i++) { ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                            <div class="w-50 mx-auto">
                                <button type="submit" class="btn btn-primary btn-lg btn-block my-3">Pateikti</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 my-3">
                        <h3 class="text-center">Jūsų užsakymas</h3>
                        <?php if ($ordered) { ?>
                            <ul class="list-group">
                                <?php foreach ($ordered AS $key => $value) { ?>
                                    <li class="list-group-item my-1"><?php echo $value["name"] . " - " . $value["price"] . $currency_symbol . " - " . $value["quantity"] . " vnt."; ?></li>
                                <?php } ?>
                            </ul>
                            <?php if (isset($order_sum)) { ?>
                                <div class="text-right">
                                    <p>Suma: <?php echo $order_sum . $currency_symbol; ?></p>
                                    <?php if ($order_sum >= $discount_treshold) { ?>
                                        <p>Nuolaida: <?php echo $discount_amount * 100 . "%"; ?></p>
                                        <p>Galutinė suma: <?php echo round(($order_sum - ($order_sum * $discount_amount) . $currency_symbol), 2) . $currency_symbol; ?></p>
                                    <?php } ?>
                                </div>
                                <form action="#" method="post" class="w-50 mx-auto">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block my-3">Užbaigti</button>
                                </form>
                            <?php } ?>
                        <?php } else { ?>
                            <div>
                                <h3 class="text-center">Tuščias</h3>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                    </div>
            </div>
        </body>
    </html>
    <?php
} else {
    header('location: prisijungimas.php');
}