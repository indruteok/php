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

        <form  action="test.php" >
            <div>
                <label for="username">Username:</label>
                <input type="text"   placeholder="Enter username" name="username">
            </div>
            <div>
                <label for="name">Lastname:</label>
                <input type="text"   placeholder="Enter name" name="name">
            </div>  
            <input type="hidden" name="hidden" value="hidden">

            <button type="submit" >Submit</button>
        </form>





        <form action="second.php" method="POST" >

            <h2>Registracijos forma: </h2>
            Username <input type="text" name="username"> <br>
            Name: <input type="text" name="name"><br>       
            <input type="hidden" name="hidden" value="hidden">
            <button type="submit" name="submit" >Submit</button>

        </form>


    </form>
    <?php
    ?>
</body>
</html>
