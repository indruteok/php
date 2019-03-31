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
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="m-3 bg-light text-center">
        <?php
        echo "Prekių sąrašas: ";
        $prekes = array(
            "laisvalaikoPrekes" => array("kamuolys", "akiniai"),
            "maistoPrekes" => array(
                "saldyti" => array("zirneliai", "ledai"),
                "sviezi" => array("duona", "pienas")),
            "statybinės prekės" => array("plyta", "cementas")
        );
        ?>
    </body>
</html>
