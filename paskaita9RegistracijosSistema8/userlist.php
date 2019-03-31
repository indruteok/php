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
        $duomenys = fopen("userlist.txt", "a"); // //kintamojo priskyrimas fwrite funkcijai                                                        
        fwrite($duomenys, " " . $_POST['name'] . "::"
                . "" . $_POST['name'] . "::"
                . "" . $_POST['email'] . "::"
                . "" . $_POST['url'] . ""
                . "" . "\n"
        );
        fclose($duomenys);  //su fopen atidaryto failo uždarymas (kad nekybotų sistemos atminty)
        ?>
    </body>
</html>
