<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Testas</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="m-3 bg-light text-center">
        <?php
        if (isset($_COOKIE['wrong2']) && $_COOKIE['wrong2'] == 'wrong2') {
            echo "<p>Nepalikite neįvertintų laukų!!</p>";
        }
        ?>
        <p><b>Atlikite kokybės įvertinimą: </b></p>
        <p> kur vertinima:</p>
        <p>
            <b class="text-secondary"> 1- prastai, 2 - patenkinamai, 3 - vidutiniškai, 4 - gerai, 5 - puikiai.</b>
        </p>

        <form action="rezultatai.php" method="post">
            <ol>
                <li>Kaip vertinate puslapio funkcionalumą?</li>
                <select name="operation1" id="id_of_select1">
                    <option value=>--Pasirinkite--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <li>Kaip vertinate pristatymo greitį ?</li>
                <select name="operation2" id="id_of_select2">
                    <option value=>--Pasirinkite--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <li>Kaip vertinate šviežio maisto kokybę?</li>
                <select name="operation3" id="id_of_select3">
                    <option value=>--Pasirinkite--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <li>Kaip vertinate pasitinkimo asortimentą ?</li>
                <select name="operation4" id="id_of_select4">
                    <option value=>--Pasirinkite--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <li>Kaip vertinate Šaldyto maisto kokybę?</li>
                <select name="operation5" id="id_of_select5">
                    <option value=>--Pasirinkite--</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </ol> 

            <button class=" mt-2 btn btn-success" >Įvertinti</button>
        </form> 


        <a href="vidus.php"><button class=" mt-2 btn btn-warning"  type="button">Grįžti į pagrindinį puslapį</button></a>
    </body>
</html>
