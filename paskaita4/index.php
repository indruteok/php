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
        <!DOCTYPE html>
    <!--
    To change this license header, choose License Headers in Project Properties.
    To change this template file, choose Tools | Templates
    and open the template in the editor.
    -->
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Data form</title>
        </head>
        <body>

            <?php
            ?>
            <form action="php4.php" method="POST">
                <h2>Registracijos forma: </h2>
                Vardas: <input type="text" name="name"> <br>
                Pavarde: <input type="text" name="lastname"><br>
                Emailas: <input type="text" name="email"<br><br>
                Telefonas: <input type="text" name="tel"<br><br>

                <input type="hidden" name="act" value="act">
                <button type="submit" name="submit" >Submit</button>

            </form>


        </body>
    </html>
