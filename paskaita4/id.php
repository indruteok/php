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
        $id;
        if (isset($_POST['act']) && $_POST['act'] == 'act') {

            $mysqli = mysqli_connect("localhost", "root", "", "vartotojuregistras");
            if (mysqli_connect_errno()) {
                printf("Connect failes: %s\n", mysqli_connect_error());
                exit();
            } else {
                $sql = "SELECT max(id) from vartotojuregistras";
                $rez2 = mysqli_query($mysqli, $sql);

                if ($rez2) {
                    while ($newArray = mysqli_fetch_array($rez2, MYSQLI_ASSOC)) { //imama iekviena nauja rezultatu eilute. kiekviena eilute irasoma i atskira masyva
                        $id = $newArray['max(id)'];
                        setcookie("user_id", $id);
                       //  print_r($newArray);
                    }
                } else {
                    printf("Could not insert record: %s\n", mysqli_error($mysqli));
                }
                mysqli_free_result($rez2);

                mysqli_close($mysqli);
            }
        }
        ?>


    </body>
</html>