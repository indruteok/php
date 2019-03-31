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

        echo "labas";



        $mysqli = mysqli_connect("localhost", "root", "", "vartotojuregistras");
        if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
        } else {
        $sql = "SELECT * from vartotojuregistras JOIN papildomi ON vartotojuregistras.id=papildomi.id WHERE id=".$_COOKIE["userid"];
            $res3 = mysqli_query($mysqli, $sql);
            if ($res3) {
                while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) { //imama iekviena nauja rezultatu eilute. kiekviena eilute irasoma i atskira masyva. Pavercia i string 
                    $id2 = $newArray['id'];
                    $name = $newArray['vardas'];
                    $lastname = $newArray['pavarde'];
                    $email = $newArray['email'];
                    $tel = $newArray['telefonas'];
                    $adres = $newArray['adresas'];
                    $lytis = $newArray['lytis'];
                    $seima = $newArray['seimosStatusas'];


           
                    echo " ID " . $id. "<br/>";
                    echo " vardas " . $name . "<br/>";
                    echo " pavarde " . $lastname . "<br/>";
                    echo " email " . $email . "<br/>";
                    echo " telefonas " . $tel . "<br/>";
                    echo " adresas " . $adres . "<br/>";
                    echo " lytis " . $lytis . "<br/>";
                    echo " seimos Statusas " . $seima . "<br/>";
                   echo " <hr>";
                }
            } else {
                printf("Could not insert record: %s\n", mysqli_error($mysqli));
            }
            mysqli_free_result($res);
            mysqli_close($mysqli);
        }






        //   if (isset($_POST['act']) && $_POST['act'] == 'act') {
//        $mysqli = mysqli_connect("localhost", "root", "", "vartotojuregistras");
//        if (mysqli_connect_errno()) {
//            printf("Connect failes: %s\n", mysqli_connect_error());
//            exit();
//            echo "labas1";
//        } else {
//
//            echo "labas2";
//
//            $uzklausa2 = "SELECT * from vartotojuregistras JOIN papildomi ON vartotojuregistras.id = papildomi.id";
//
//            $rez3 = mysqli_query($mysqli, $uzklausa2);
//            echo "labas5";
//
//            if ($rez3) {
//                echo "$id";
//                echo " NAME = 'name";
//
//
//                //    "<INPUT TYPE='checkbox' NAME='chk$i' VALUE='pasirinkti $i'> Pasirinkimas $i <br>"
//            } else {
//                printf("nieko gero %s\n", mysqli_error($mysqli));
//            }
//            mysqli_close($mysqli);
//        }
//
//        exit;
        //     }

        echo "labas3";
        ?>
    </body>
</html>