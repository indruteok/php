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
        $a = 8;

        function globalVars() {
            $GLOBALS['a'] ++; // paimamas kaip masyva
            $a; // neras paimto is sisores
            global $a;  // sugaudymas kintamjojo a reiksme is isores 
        }

        globalVars();
        echo $a;

        // STATINIAI



        function staticVars() {
            static $num = 0; // jei norisi kad butu isaugota, jis islieka atminty, kol jis aktyvus. I masyvus irasineja stringaus
            $num++;
            echo $num;
        }

        staticVars();






        $arr = array();

        function addStringToArray($string) {
            global $arr;  // naudojant kita peles mygtuka find used galima rasti kur buvo deklaruotas.
            static $num = 0;  // statinis funkcijai pasibaigus lieka atminty
            $arr[$num] = $string;
            $num++;  // kad taptu vienetu, kaskart isaukus funkcija didetu
        }

        addStringToArray("labas");
        addStringToArray("rytas");

        echo "<pre>";
        print_r($arr);
        echo "<pre>";
        ?>
    </body>
</html>
