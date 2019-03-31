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
        // Parašyti funkciją, kuri išvestų, ar dviejų įvestų stačiakampių plotai nesusikerta(x, y kordinačių sistemoje

        $x1 = 1;
        $x2 = 4;
        $y1 = 2;
        $y2 = 4;
        $vx = $x2 - $x1; // kiek tikrinti nuo x1; 

        $x21 = 2;
        $x22 = 5;
        $y21 = 1;
        $y22 = 3;


        $i = $x1;
        for ($i; $x2 >= $i; $i++) {
            echo $i;
            if ($x21 == $i) {
                echo "susikerta";
//                for(){
//                    
//                }
            } else {
                echo "nesusikerta";
            }
        }
        ?>
    </body>
</html>
