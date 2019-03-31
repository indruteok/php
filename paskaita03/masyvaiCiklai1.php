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
//        echo count($array_or_countable);
//        echo max($values);
//        echo min($values);


        $pasaulioSostines = array(
            array("kontinentas" => "Azija", "saliu skaicius" => "49", "Salis" =>
                array("Salis" => "Kinija", "Indija"),
                array("kontinentas" => "europa", "saliu skaicius" => "52", "Salis" =>
                    array("Salis" => "Lietuva", "Estija"))
        ));

        echo "<pre>";
        print_r($pasaulioSostines);
        echo "<pre>";
        ?>
    </body>
</html>
