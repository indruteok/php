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
        //SELECT max(id) from vartotojuregistras;
//selsct id from mokiniai order by id desc limit 1
        //viens lapas su kintamuoju// 
        //
        $arr = array(1, 2, 3);


        //kitam lape:

        $arr;
        print_r($arr);  // nemato
        // istraukimas
        include "lapopavadinimasKuriameyraKintamasis.php";  // ima visus veiksmus is to lapo
        require "lapopavadinimasKuriameyraKintamasis.php"; // reikalauti, praso viskas kas yra tame lape, kad veiktu
        //3dalis


        $fp = fopen("pastai.txt", "a");
        $write = fwrite($fp, $_POST['name']);
        fclose($fp);
        ?>
    </body>
</html>
