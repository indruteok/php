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
        if (isset($_POST['act']) && $_POST['act'] == 'act') {  // formos kintamojo reiksmes patikrinimas ar jis yra act.

            $mysqli = mysqli_connect("localhost", "root", "", "vartotojuregistras");
            if (mysqli_connect_errno()) {
                printf("Connect failes: %s\n", mysqli_connect_error());
                exit();
            } else {
                $uzklausa = "INSERT INTO vartotojuregistras" .
                        "( vardas , pavarde, email , telefonas ) VALUES('" . $_POST['name'] . "', '" . $_POST['lastname'] . "', '" . $_POST['email'] . "', '" . $_POST['tel'] . "' )";
                $rez = mysqli_query($mysqli, $uzklausa);

                if ($rez) {
                    echo " Duomenys įvesti <br>";
                    echo '<a href="http://localhost/paskaita4/php4_1.php" >Papildyti</a>';
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