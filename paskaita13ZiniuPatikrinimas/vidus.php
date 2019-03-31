<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>vidus</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="m-3 bg-light text-center">
        <?php
        include 'functions.php';
        arPrisijunge();

        session_start();
        echo " <p class='m-5' > <b>Sveiki, " . $_SESSION['name'] . " " . $_SESSION['lastname'] . "</b></p>";

        echo " <p class='mb-5'> Atlikti kokybės vertinimo testą:  <a href='testas.php'><button  class='mt-2 btn btn-success'  type='button'>Altikti testą</button></a> </p>";

        echo "<b>Prekių sąrašas:</b> ";
        $prekes = array(
            "laisvalaikoPrekes" => array("kamuolys", "akiniai"),
            "maistoPrekes" => array(
                "saldyti" => array("zirneliai", "ledai"),
                "sviezi" => array("duona", "pienas")),
            "statybinėsPrekės" => array("plyta", "cementas")
        );

        $kamuolys = $prekes["laisvalaikoPrekes"][0];
        $akiniai = $prekes["laisvalaikoPrekes"][1];
        $zirneliai = $prekes["maistoPrekes"]['saldyti'][0];
        $ledai = $prekes["maistoPrekes"]['saldyti'][1];
        $duona = $prekes["maistoPrekes"]['sviezi'][0];
        $pienas = $prekes["maistoPrekes"]['sviezi'][1];
        $plyta = $prekes["statybinėsPrekės"][0];
        $cementas = $prekes["statybinėsPrekės"][1];

        echo "<div class='border'>";
        echo "<p> <b> Laisvalaikio prekės:</b> $kamuolys, $akiniai    </p>";
        echo "<p> <b>Maisto prekės:. Šaldyti produktai: </b>  $zirneliai, $ledai  </p>";
        echo "<p><b>Maisto prekės:. Švieži produktai: </b> $duona, $pienas </p>";
        echo "<p> <b> Statybinės prekės: </b> $plyta, $cementas </p>";
        echo "</div>";
        ?>

        <form action="" method="POST">
            <br> Pasirinkite produktą: <br>
            <select name="operation" id="id_of_product_select">
                <option value="kamuolys"><?php echo $kamuolys ?></option>
                <option value="akiniai"><?php echo $akiniai ?></option>
                <option value="zirneliai"><?php echo $zirneliai ?></option>
                <option value="ledai"><?php echo $ledai ?></option>
                <option value="duona"><?php echo $duona ?></option>
                <option value="pienas"><?php echo $pienas ?></option>
                <option value="plyta"><?php echo $plyta ?></option>
                <option value="cementas"><?php echo $cementas ?></option>
            </select>
            <input type="number" name="addKiekis" value="1">

            <input type="hidden" name ="act2" value="act2">
            <input class=" mt-2 btn btn-success" type="submit" name="submit" value="pridėti į krepšelį">

            <?php
            $failoPavadinimas = "cart_user" . $_SESSION['id'] . ".txt";
            if (isset($_POST['act2'])) {
                $duomenys = fopen($failoPavadinimas, "a");

                fwrite($duomenys, " " . $_POST['operation'] . " - "
                        . "" . $_POST['addKiekis'] . ""
                        . "" . "\n"
                );

                fclose($duomenys);
            }
            if (file_exists($failoPavadinimas)) {
                echo "<br> <a href='krepselis.php'> <button class='mt-2 btn btn-warning' type='button' >Baigti apsipirkimą</button> </a>";
            }
            ?>
        </form>

        <a href="sistema.php"><button class=" mt-2 btn btn-danger" type="button">Atsijungti</button></a>

    </body>
</html>


