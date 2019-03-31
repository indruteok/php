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
        //      Turime du kintamuosius int tipo: $a ir $b. Jiems yra priskirtos reikšmės. 
        //      Galimos situacijos: a>b, a<b, a = b. Reikia visais atvejais išvesti atitinkamą pranešimą, 
        //      pvz. jei a>b, tai pranešimas: kintamasis a yra didesnis už kintamąjį b ir analogiškai dėl kitų situacijų. 
        //      Pateikite savo sprendimą.
        $a = 5;
        $b = 6;
        if ($a == $b) {
            echo " kintamasis $a yra lygus kintamajam $b";
        } else if ($a > $b) {
            echo "kintamasis $a yra didesnis už kintamajį $b";
        } else if ($a < $b) {
            echo "kintamasis $a  yra mažesnis už kintamajį " . $b;
        } else

// Turime 4 kintamuosius int tipo, kurioms yra priskirtos reikšmės. 
// Reikia nustatyti, kuris yra didžiausias. Pateikite savo sprendimą. 
            $a = 1000;
        $b = 100;
        $c = 1000;
        $d = 1000;

        if ($a == $b && $a == $c && $a == $d) {
            echo " vsi kintamieji yra lygūs";
        } else if ($a == $b && $a > $c && $a > $d) {
            echo "kintamasis $a yra lygus su kintamuoju $b, ir jie didesni už kintamuosius $c ir $d";
        } else if ($a == $c && $a > $b && $a > $d) {
            echo "kintamasis $a yra lygus su kintamuoju $c, ir jie didesni už kintamuosius $b ir $d";
        } else if ($a == $d && $a > $b && $a > $c) {
            echo "kintamasis $a yra lygus su kintamuoju $d, ir jie didesni už kintamuosius $b ir $c";
        } else if ($b == $c && $b > $a && $b > $d) {
            echo "kintamasis $b yra lygus su kintamuoju $c, ir jie didesni už kintamuosius $a ir $d";
        } else if ($b == $d && $b > $a && $b > $c) {
            echo "kintamasis $b yra lygus su kintamuoju $d, ir jie didesni už kintamuosius $a ir $c";
        } else if ($c == $d && $c > $a && $c > $b) {
            echo "kintamasis $c yra lygus su kintamuoju $d, ir jie didesni už kintamuosius $a ir $b";
        } else if ($a > $b && $a > $c && $a > $d) {
            echo "kintamasis $a yra daugiau už kintamuosius  $b, $c, $d";
        } else if ($b > $a && $b > $c && $b > $d) {
            echo "kintamasis $b yra daugiau už kintamuosius  $a, $c, $d";
        } else if ($c > $a && $c > $a && $c > $d) {
            echo "kintamasis $c yra daugiau už kintamuosius  $a, $b, $d";
        } else if ($d > $a && $d > $c && $d > $a) {
            echo "kintamasis $d  yra daugiau už kintamuosius  $a, $c, $a";
        } else if ($a == $b && $a == $c) {
            echo "kintamasis $a yra lygus su kintamuoju $b ir $c, ir jie visi didesni už kintamajį $d";
        } else if ($a == $b && $a == $d) {
            echo "kintamasis $a yra lygus su kintamuoju $b ir $d, ir jie visi didesni už kintamajį $c";
        } else if ($a == $d && $a == $c) {
            echo "kintamasis $a yra lygus su kintamuoju $d ir $c, ir jie visi didesni už kintamajį $b";
        } else if ($b == $c && $b == $d) {
            echo "kintamasis $b yra lygus su kintamuoju $d ir $c, ir jie visi didesni už kintamajį $a";
        }


        //   7. Paskelbkite masyvą ir inicializuokite jo elementus:
        $arr = array();
//a) nuliais;
        for ($i = 1; $i < 10; $i++) {
            $arr[$i] = 0;
        }

//b) pagal formulę: kitas elementas yra pusantro karto didesnis už prieš tai buvusį;
        $sk = 1;
        for ($i = 1; $i < 10; $i++) {
            $arr[$i] = $sk;
            $sk = $sk * 1.5;
        }

//c) atsitiktiniais skaičiais.
        for ($i = 1; $i < 10; $i++) {
            $b = rand(1, 50);
            $arr[$i] = $b;
        }


//  8.Yra masyvas. Jo elementai int  tipo reikšmės. Pateikite sprendimus:
        //     a) masyvo elementų suma;
        $arr = array(20, 1, 5, 1);
        $sum = 0;
        for ($i = 0; $i < sizeof($arr); $i++) {
            $sum = $sum + $arr[$i];
        }
        echo $sum;

        //   b) masyvo max/min elementas .
        $arr = array(2, 10, -1, 15, 3);
        echo "max elementas: " . max($arr) . "<br>";
        echo "min elementas: " . min($arr) . "<br>";

//9.  Duotas asociatyvinis masyvas: 
        //
        //
       echo "<hr><hr>";

//10. Parašyti funkcijas:
//10.1. Funkcija apsSuma(), kuri grąžina dviejų kintamųjų sumą. Priima keturis argumentus int tipo;
        function apsSuma($a, $b, $c, $d) {
            $suma = $a + $b;
            return $suma;
        }

        $a = 1;
        $b = 2;
        $c = 3;
        $d = 4;

        apsSuma($a, $b, $c, $d);
        echo "<hr><hr>";

        //10.2. Funkcija showSuma (), kuri išveda ekrane apskaičiuotą funkcijos apsSuma() sumą;
        function showSuma($a, $b, $c, $d) {
            $suma = $a + $b;
            echo "funkcijos apsSuma suma ==  $suma";
            echo "<br>";
        }

        showSuma($a, $b, $c, $d);
        echo "<hr><hr>";

//10.3. Perrašyti showSuma() taip, kad joje būtų iškviečiama funkcija apsSuma().
        function showSuma2($a, $b, $c, $d) {
            apsSuma($a, $b, $c, $d);
            echo "funkcijos apsSuma suma = " . apsSuma($a, $b, $c, $d);
            echo "<br>";
        }

        showSuma2($a, $b, $c, $d);
        echo "<hr><hr>";


        $arr = array(1, 2, 3, 4, 5, 6, "dfg", "rftgh");




        echo "<pre>";
        print_r($arr);
        echo "<pre>";



        $arr2 = array(
            array("Du ratai" =>
                array("Dviraciai" =>
                    array("Extreme" => 10, "Author" => "4"), "Paspirtukai" => "12"),
                "Automobiliai" =>
                array("Opel" =>
                    array(Astra => "5"), "Honda" => 5, "Audi" => 11),
                "Reikmenys" => "7"),
        );

        foreach ($arr2 as $key => $value) {
            print_r($value);
        }

        $arr3 = array(
            array("Fotokameros" => 6, "Videokameros" => 3));

        echo "<br>";
        foreach ($arr3 as $key => $value) {   // graziai spausdina
            print_r($value);
        }
        echo "<br>";

        $g = 3;
        echo $g;

        echo "<hr>";
        echo "<br>";


        $sumarr2 = $arr2[0]["Du ratai"]["Dviraciai"]["Extreme"] + $arr2[0]["Du ratai"]["Dviraciai"]["Author"] + $arr2[0]["Du ratai"]["Paspirtukai"] + $arr2[0]["Automobiliai"]["Opel"]["Astra"] +
                $arr2[0]["Automobiliai"]["Honda"] + $arr2[0]["Automobiliai"]["Audi"] + $arr2[0]["Reikmenys"];

        $sumarr3 = $sumarr3 = $arr3[0]["Fotokameros"] + $arr3[0]["Videokameros"];

        $ats = $sumarr2 + $sumarr3 + $g;

        echo "masyvo arr2 suma:  $sumarr2 <br>";
        echo "masyvo arr3 suma:  $sumarr3 <br>";
        echo "reiksme:  $g <br>";

        echo "visu elementu suma: $ats<br>";
        ?>

    </body>
</html>
