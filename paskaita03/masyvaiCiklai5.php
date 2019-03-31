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
//  5. Sudaryti pirkinių kainos skaičiavimo programą.
//5.1. sudaryti krepšelį: prekė1 - kaina, prekė1 - kiekis, prekė2- kaina, prekė2 - kiekis .... 5 viso.

        $arr = array(
            "preke1" => array("kaina" => "5", "kiekis" => "10"),
            "preke2" => array("kaina" => "15", "kiekis" => "50"),
            "preke3" => array("kaina" => "51", "kiekis" => "55"),
            "preke4" => array("kaina" => "50", "kiekis" => "15"),
            "preke5" => array("kaina" => "2", "kiekis" => "5"));

        echo "<pre>";
        print_r($arr);
        echo "<pre>";

//5.2. programa turi paskaičiuoti kiekvienos pirktos prekės kainą bei bendrą kainą ir išvesti šią info.

        foreach ($arr as $key => $value) {
            echo $key . " kaina yra ";
            echo $arr[$key]["kaina"] . " eu.";
            echo "<br>";
        }
        echo "<br>";

        foreach ($arr as $key => $value) {
            echo $key . " bendra kaina , kai jos kiekis yra " . $arr[$key]["kiekis"] . " bus: ";
            $sum = ($arr[$key]["kaina"]) * ($arr[$key]["kiekis"]);
            echo $sum;
            echo " eu. <br>";
        }


        echo "<br>";
//5.3. Įvesti nuolaidos konstantą. Pakeisti programą taip, kad viršijus tam tikrą sumą (pvz 100 eu), pritaikoma nuolaida. 
//(Išvedama, kokia nuolaida pritaikyta.)
//        define("YEAR", 2019); // jei po kablelio  yra true, tada galima naudoti bet kokiom raidem didziosiomarba mzosiom
//        echo YEAR, __FILE__; // fille - parodo kuruoj vietoj dirbi
        //  kiek pirkta kokios prekes:


        foreach ($arr as $key => $value) {
            echo $key . " bendra kaina , kai jos kiekis yra " . $arr[$key]["kiekis"] . " bus: ";
            $sum = ($arr[$key]["kaina"]) * ($arr[$key]["kiekis"]);
            echo $sum;
            echo " eu. <br>";
        }
        
        
        
        
        
        
        
        
//        
//        echo "<pre>";
//        print_r($prekes);
//        echo "</pre>";
//
//        $suma = 0;
//        $count = 0;
//        define("nuolaida", 20);
//
//
//        foreach ($prekes as $i => $val) {
//            echo "Preke: " . $i . ", kaina:" . $val["Kaina"] . ", Kiekis: " . $val["Kiekis"] . "<br>";
//            $suma += $val["Kaina"];
//            $count += $val["Kiekis"];
//        }
//
//        echo "Isviso pirkta prekiu: " . $count . "<br>Visko kaina: " . $suma . "<br>";
//
//        if ($suma > nuolaida) {
//            echo "Nuolaida taikoma nes suma virs 20 ";
//            echo "Kaina po nuolaidas (10%): " . $suma * 0.90;
//        } else {
//            echo "Nuolaida netaikoma!";
//            
//            
        ?>
    </body>
</html>
