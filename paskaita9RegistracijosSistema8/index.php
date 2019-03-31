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
        <form action="userlist.php" method="POST">
            Vardas:   
            <input type="text" name="name"><br>
            Slaptažodis:
            <input type="password" name="password1"><br>
            Slaptažodis:
            <input type="password" name="password2"><br>
            El_Paštas:
            <input type="email" name="email"><br>
            URL:
            <input type="url" name="url"><br>
            <br><br>

            <input type="hidden" name ="act" value="act">
            <input type="submit" name="submit" value="Registruotis">
         

        </form>







        <?php
        // put your code here
        ?>
    </body>
</html>
