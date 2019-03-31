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
        echo "<hr><hr>";

        $a = $_POST["a"];
        $b = $_POST["b"];
        $text = $_POST["text"];

//        Parašyti programą, kuri paima iš įvesties formos du skaičius ir atitinkamai sukurti funkcijas: 
//1. tų skaičių sumos paskaičiavimui; 
        function sumOfNumbers($a, $b) {   //fnc +tab
            $sum = $a + $b;
            echo "skaičių " . $a . " ir " . $b . " suma = " . $sum;
            echo "<br>";
            //  return $a + $b; //
        }

        sumOfNumbers($a, $b);
        echo "<hr><hr>";

//3. sandaugos;
        function multiplication($a, $b) {
            $f = $a * $b;
            echo "skaičių " . $a . " ir " . $b . " sandauga = " . $f;
            echo "<br>";
            return $f;
        }

        multiplication($a, $b);
        echo "<hr><hr>";

//2. vidurkio;
        function average($a, $b) {
            $av = ($a + $b) / 2;
            echo "skaičių " . $a . " ir " . $b . " vidurkis = " . $av;
            echo "<br>";
            return $av;
        }

        average($a, $b);
        echo "<hr><hr>";

//4. skaičių faktorialų sumos paskaičiavimui;
        function factor($b) {
            $i = 1;
            $fa = 1;
            while ($i <= $b) {
                //   echo floor($i) . '<br>';
                $fa = $fa * $i;
                $i = $i + 1;
            }
            return $fa;
        }

        echo "skaičiaus " . $a . " faktorialas = " . factor($b);
        echo "<br>";
        echo "skaičiaus " . $b . " faktorialas = " . factor($a);
        $fsum = factor($b) + factor($a);
        echo "<br>";
        echo "skaičių " . $a . " ir " . $b . " faktorialų suma: " . $fsum;


        echo "<hr><hr>";

//5. patikrinimui, ar skaičiai pirminiai;
        function primary($a) {
            $i = 1;
            $dalikliukiekis = 0;
            while ($i <= $a) {
                $i++;
                if ($a % $i == 0) {
                    $dalikliukiekis = $dalikliukiekis + 1;
                }
            }
            if ($dalikliukiekis == 1) {
                echo "skaičius " . $a . " yra pirminis";
            } else {
                echo "skaičius " . $a . " nera pirminis";
            }
        }

        primary($a);
        echo "<br>";
        primary($b);

        echo "<hr><hr>";

//6. skaičių įvedimui į DB;
        function leadInDB($a, $b) {
            if (isset($_POST['act']) && $_POST['act'] == 'act') {  // formos kintamojo reiksmes patikrinimas ar jis yra act.
                $mysqli = mysqli_connect("localhost", "root", "", "DB7");
                if (mysqli_connect_errno()) {
                    printf("Connect failes: %s\n", mysqli_connect_error());
                    exit();
                } else {
                    $uzklausa = "INSERT INTO duomenuBaze7" .
                            "( number1 , number2 ) VALUES('" . $_POST['a'] . "', '" . $_POST['b'] . "' )";
                    $rez = mysqli_query($mysqli, $uzklausa);

                    if ($rez) {
                        echo " Duomenys įvesti <br>";
                    } else {
                        printf("nieko gero %s\n", mysqli_error($mysqli));
                    }
                    mysqli_close($mysqli);
                }
            }
        }

        leadInDB($a, $b);
        echo "<hr><hr>";

//Parašyti funkciją, kuri skaičiuoja, kiek kartų buvo įvesta formos informacija (įrašo į failą skaičių, kaskart įvedus duomenis ir patvirtinus tą skaičių padidina).
        function counter() {
            $fp = fopen("skaicius.txt", "r+");
            $sk = fread($fp, filesize("skaicius.txt"));   //file($fp); // nuskaito fiala i masyva  //Get Current Hit Count
            $sk = $sk + 1; //Increment Hit Count by 1
            ftruncate($fp, 0);   //Truncate the file to 0
            rewind($fp); //Set write pointer to beginning of file
            fwrite($fp, $sk); //Write the new Hit Count
            fclose($fp);
        }

        counter();

//Parašyti funkciją, išvedančią įvestą į formą tekstą iš kito galo.
        function fromBack($text) {
            $ilgis = strlen($text); //kintamojo ilgis, kiek simboliu yra skaiciuoja

            $i = $ilgis - 1; //masyvo ilgis
            while (0 <= $i) {
                echo "$text[$i]";
                $i = $i - 1;
            }
        }
        
        fromBack($text);
        echo "<hr><hr>";

//Parašyti funkciją, patikrinančią, ar įvestas į formą tekstas skaitomas atbulai yra toks pats (pvz. savas).

        function palindrome($string) {
            if (strrev($string) == $string) { // string rasomas is kitos puses
                return 1;
            } else {
                return 0;
            }
        }

        if (palindrome($text)) {
            echo "Palindrome";
        } else {
            echo "not palindrome";
        }
        ?>
    </body>
</html>
