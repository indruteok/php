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
        session_start();
        
        $_SESSION["name"] =$_POST["2nd"];
        echo "sesion id is: "; sesion_id();
        
        
//        session_unset() - istrina;
        ?>
    </body>
</html>
