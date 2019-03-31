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
//4.1. sukurti tokį asociatyvinį masyvą.
//4.2. išvesti masyvą.
//4.3. Parašyti programą masyvo atvaizdavimui taip, kaip paveikslėlyje.

        $arr = array(
            "Europa" => array("Austrija", "Vokietija", "Ispanija"),
            "Azija" => array("Kinija", "Laosas", "Malaizija"),
            "Afrika" => array("Kenija", "Egiptas", "Libija"));

        echo "<pre>";
        print_r($arr);
        echo "</pre>";

        
        foreach ($arr as $key => $value) {
            echo "<h3>".$key."</h3>";
            foreach ($arr[$key] as $i) {
                echo "<ul>";
                echo  "<li>" . $i . "</li>";
                echo "</ul>";
            }
        }
        

     
        ?>
    </body>
</html>
