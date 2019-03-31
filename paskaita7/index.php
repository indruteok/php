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
        <form action="funkcijos.php" method="POST">
        Iveskite pirmą skičių:<br>
        <input type="number" name="a"><br>
        Įveskite antrą skaičių:<br>
        <input type="number" name="b"><br>
            
        Įveskite sakinį <br>
        <input type="text" name="text"><br>
        
         <input type="hidden" name="act" value="act">
        <input type="submit" value="Submit">
        </form>
        
        <?php
    //    include 'funkcijos.php'; // nukreipia kur yra surasytos visos funkcijos
        ?>
    </body>
</html>
