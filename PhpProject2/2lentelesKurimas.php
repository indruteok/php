<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lenteles kurimas</title>
    </head>
    <body>
        <?php
        $mysqli = mysqli_connect("localhost", "root", "", "testDb"); 
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        } else {
            
            $sql = "CREATE TABLE testTABLE " . // cia vienoj eilutej jei netelpa . Taskas sujungia, kalbelis- perskirai.
                    "(id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, testField varchar (78))";// kintamasis sql, saugo uzklausa, 
            $res = mysqli_query($mysqli, $sql); //kitamasis rezult pvz.  padaro uzklausa duombazej. turi jungimasis ir 
            if ($res == TRUE) {  // patikrina tipa, ar jis egzistuoja, yra ivyko. paklausia ar funkcija ivykde-true
                echo "Table testTable successfully created.";
            } else {
                printf("Could not create table: %s\n", mysqli_error($mysqli)); // jei luzo, spausdina su kalida, kuri paima is duombazes
            }
            mysqli_close($mysqli);
        }
        ?>
    </body>
</html>