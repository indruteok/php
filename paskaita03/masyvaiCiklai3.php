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
//        3. Darbas su ciklais:
//3.1. Duotas kintamasis (tarkime 36). Išvesti per kablelį visus šiuo skaičiaus daliklius 
//(kai duotas skaičius dalijasi į daliklį be liekanos). Pvz. Skaičius 6 Ats: 1,2,3,6
        $a = 36;
        $d = array();
        echo "Skaicous $a dalikliai: ";
        for ($daliklis = 1; $daliklis < $a; $daliklis++) {
            if ($a % $daliklis == 0) {
                array_splice($d, sizeof($d), 0, $daliklis);
            }
        };
        echo implode(",", $d) . ". <br>";  // masyvo elementus galima isskirti sringus   
          
//3.2. Duoti du skaičiai. Išvesti ekrane jų bendrus daliklius eilutėje per kablelį. Galima panaudoti Užduotį 1.        
        $b = 6;
        $c = 36;
        $e = array();

        echo "bendri $b ir $c daliklaiai yra: ";
        for ($daliklis = 1; $daliklis < $a; $daliklis++) {
            if ($b % $daliklis == 0 && $c % $daliklis == 0)
                array_splice($e, sizeof($e), 0, $daliklis);
        };
        echo implode(",", $e) . ". <br>";
        ?>
    </body>
</html>
