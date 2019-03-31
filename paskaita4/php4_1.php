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
        // put your code here
        ?>

        <form action="php4_2.php" method="POST">
            
            
            <h2>Papildomi duomenys: </h2>
            Adresas: <input type="text" name="adres"> <br>
            Lytis: <input type="text" name="lytis"><br>
            Seimos Statusas: <input type="text" name="seima"<br><br>

            <input type="hidden" name="act" value="act">
            <button type="submit" name="submit" >Submit</button>

        </form>
    </body>
</html>
