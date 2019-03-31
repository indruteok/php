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
        error_reporting(E_ALL);  // rodys visus erorus 
        ini_set("display_errors", 1); // rodys erorus
//    1.Išvesti eilę 1-2-3-4-5-6-7-8-9-10 (be brūkšnelių priekyje ir gale).

        for ($i = 1; $i < 11; $i++) {
            if ($i != 10) {
                echo "$i-";
            } else {
                echo "$i";
            }
        }
        echo"<br>";

//2.Išvesti pasirinkto skaičiaus faktorialą (pvz. 5 faktorialas - 1*2*3*4*5=120).

        $sum = 0;
        $k = 0;

        while ($k < 5) {
            $k++;
            $sum = $sum + $k;
        }
        echo "5 faktorialas yra $sum";
        echo"<br>";

// 3. Išvesti šachmatų lentelę: (td height = 30px width = 30px bgcolor = #FFFFFF/#000000)
        $ilgis = 8;
        for ($row = 1; $row <= $ilgis; $row++) {
            if ($row % 2 == 0) {
                echo "<br>g";
            }
            for ($col = 1; $col <= $ilgis; $col++) { 
                    echo " f ";
                }
            }









            //4.Išspausdinti pasirinktą eilučių kiekį šiuo formatu (4 eilučių pvz.):
            //1
            //2 3
            //4 5 6
            //7 8 9 10
            //5. Išvesti duoto skaičiaus skaitmenų sumą (naudinga funkcija - strlen).
            //6. Išvesti dviejų skaičių sumos skaitmenų kiekį.
//		int i = 0;
//		int sum = 0;
//
//		while (i < sk) {
//			i++;
//			sum = sum + i;
//		}
//		System.out.println("Sum is " + sum); 
            ?>
    </body>
</html>