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
//        2. Masyvai (masyvas int tipo):
//2.1. masyvo elementų užpildymas nuliais.
        $arr = array();

        for ($i = 1; $i < 10; $i++) {
            $arr[$i] = 0;
        }
        echo "<pre>";
        print_r($arr);
        echo "<pre>";


//2.2. masyvo elementų užpildymas atsitiktiniais skaičiais.
        $arr2 = array();

        for ($i = 1; $i < 10; $i++) {
            $b = rand(1, 50);
            $arr2[$i] = $b;
        }
        echo "<pre>";
        print_r($arr2);
        echo "<pre>";

//2.3. masyvo elementų suma/vidurkis.
        $arr3 = array(2, 1, 1, 1, 1);

        echo "kiek " . count($arr3) . "<br>";
        echo "suma " . array_sum($arr3) . "<br>";
        echo "vidurkis " . array_sum($arr3) / count($arr3) . "<br>";




//        for ($i = 0; $i < 4; $i++) {
//            echo "<br>" . $sum;
//            $sum = $sum + $i;
//            echo "<br>" . $sum . "<br>";
//        }
        //    echo $sum;
        //2.4. max/min masyvo elementas. 
        $arr4 = array(2, 1, 1, 1, 1);

        echo "max" . max($arr4) . "<br>";


        $b = 0;
        foreach ($arr4 as $key => $val) {
            if ($val > $b) {
                $b = $val;
            }
        }
        echo "max be funkcijos: " . $b . "<br>";


        echo "min" . min($arr4) . "<br>";


        $c = $arr4[0];
        foreach ($arr4 as $min) {
            if ($min < $c) {
                $c = $min;
            }
        }
        echo "min be funkcijos: " . $c . "<br>";
















//        
//        
//        int did = arr[0]; // -18
//        for (int i = 1;
//        i < arr . length;
//        i++) {
//            if (arr[i] > did) { // arr[1]>did -12> -18
//                did = arr[i];
//            }
        ?>
    </body>
</html>
