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
       // $adress="localhost";  galima cia rasyti ir ikelti i mysql
        $mysqli = mysqli_connect("localhost", "root", "", "testDb");  // prisijungimas   funkcija bet kas kas yra sklaisstuose ir turi argumentus
        if (mysqli_connect_errno()) {   //traukia klaidos koda, jei kas negerai 
            printf("Connect failes: %s\n", mysqli_connect_error()); // %s ar %d, ten bus iterpiamas pirma funkcija po kablelio. error funkcija siuo atveju
            exit();  // jei luzta iskart iseina is kodo
        } else {
            printf("Host information: %s\n", mysqli_get_host_info($mysqli)); // issapusdina kas pakure  ir pan (mysqli_get..) funkcijos..
            mysqli_close($mysqli);   // atminties vieta neuzimama, yra uzdaroma.  Ir duomenu nebeistrauksi
        }

        //$ put your code here
        ?>
    </body>
</html>
