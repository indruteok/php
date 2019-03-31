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
    </head>
    <body>
        <?php
        include "id.php";

        if (isset($_POST['act']) && $_POST['act'] == 'act') {

            $mysqli = mysqli_connect("localhost", "root", "", "vartotojuregistras");
            if (mysqli_connect_errno()) {
                printf("Connect failes: %s\n", mysqli_connect_error());
                exit();
            } else {



                $uzklausa = "INSERT INTO papildomi" .
                        "( id, adresas , lytis, seimosStatusas ) VALUES('" . $id . "', '" . $_POST['adres'] . "', '" . $_POST['lytis'] . "', '" . $_POST['seima'] . "')";
                $rez = mysqli_query($mysqli, $uzklausa);


                if ($rez) {
                    echo " Duomenys įvesti <br>";
                    echo '<a href="http://localhost/paskaita4/php4_3duomenys.php" >Suvesti duomenys:</a>';
                } else {
                    printf("nieko gero %s\n", mysqli_error($mysqli));
                }
                mysqli_close($mysqli);
            }

            exit;
        } else {
            ?>

            

        </body>
    </html>
    <?php
}