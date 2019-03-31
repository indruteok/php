<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> First psl</title>
    </head>
    <body>
        <?php
//        echo "Hello word<br>";
//        echo 'Labas pasauli<br>';
//          
//        $a = 8;$a;   // priskiriamas astuonetas
//        $string = "labas rytas";
//        
//        echo $a, " ", $string;
//        echo "<br>";
//        echo $a. " ". $string;
//         echo "<br>";
//         
//        $b==7;  // ar lygu septyniems
//        $c===8;// === tikrina ne tik reiksme bet ir ar duomenu tipas tas pats
//        
//        $a=8;
//        $b=&$a;  // b nurodau i kintamojo a ieta - &
//        $a=10;
//        echo $a, $b;
//        
//        for($i=1; $i<=5; $i++){
//            echo "labas $i*$i karta<br>";
//             echo "labas ". $i*$i. " karta<br>";
//             echo 'Labas $i karta <br>';   // viengubose kabutese kintamuju nesupranta
//             echo "<br>";
//        }
//        
//        
//        
        //Daugybos lentele  
//        for($i=1; $i<=12; $i++){
//            for($j=1; $j<=12; $j++){
//          
//            echo "$j*$i=".$j*$i ;
//            echo "<br>";   
//        }
//        echo "<br>"; 
//        }
//        echo " &nbsp   labas"


//       
//
//        // eglute
         $aukstis = 6;
         
        for ($i = 0; $i < $aukstis; $i++) {
            for ($j = $aukstis - $i; $j > 0; $j--) {
                echo "&nbsp";
            }
         for ($j = 0; $j < $i; $j++) {
           echo "*";  
     }
          echo "<br>";
            }
            for($k = 1; $k < $aukstis; $k++){
                echo "&nbsp";
            }
            











        // put your code here
        ?>
    </body>
</html>