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
        //masyvai - reiksmiu eile, sarasas
        $arr = array(1, 2, 3, 4, 5, 6, "dfg", "rftgh");
        // su echo galima ispausdinti tik viena elementa

        echo $arr[0];
        echo "<br>";
        var_dump($arr); // vienas is budu
        echo "<br>";

        //    vienmatis masyvas
        echo "<pre>";
        print_r($arr);
        echo "<pre>";


        // asiociatyvinis masyvas, kai vitoj skaiciu aprasomas indexas //dvimatis masyvas : masyvas masyve
        $arr2 = array(
            array("vardas" => "Jonas", "pavarde" => "Jonaitis", "adresas" => array("gatve" => "geguzes", "numeris" => "7")),
            array("vardas" => "Vardenis", "pavarde" => "Pavardenis", "adresas" => array("gatve" => "lapeliu", "numeris" => "15")),
        );


        //
        foreach ($arr2 as $key => $value) {   // graziai spausdina
            print_r($value);
        }
        //




        echo "<pre>";
        print_r($arr2);
        echo "<pre>";


        echo $arr2[1]["pavarde"];  // vieno elemento istraukimas
        echo "<br>";
        echo "<br>";

        // kontsantos - nekintamas dydis per visa programa, rasomas be jokiu zenklu

        define("YEAR", 2019); // jei po kablelio  yra true, tada galima naudoti bet kokiom raidem didziosiomarba mzosiom
        echo YEAR, __FILE__; // fille - parodo kuruoj vietoj dirbi
        ?>
    </body>
</html>
