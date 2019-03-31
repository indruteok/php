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
        
<!--            <form action="laukaiDB2.php" method="POST"> 

            <p>Text to Add:<br>
                <input type="text" name="testfield" size="30">
            <p><input type="submit" name="submit" value="insert record"></p>
        </form>
        -->
        
         
        
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                Vardas: <input type="text" name="name"> <br>
                Emailas: <input type="text" name="email"<br><br>
                Galima pasirinkti dauk <br>
                <?php
                for ($i = 1; $i < 4; $i++) {
                    echo "<INPUT TYPE='checkbox' NAME='chk$i' VALUE='pasirinkti $i'> Pasirinkimas $i <br>";
                }
                ?>
                <br>Vienintelis pasirinkimas: <br>
                <INPUT type="radio" Name="rad" VALUE="Pasirinkimas 1"CHECKED>1 Pasirinkimas<br>
                <INPUT type="radio" Name="rad" VALUE="Pasirinkimas 2">2 Pasirinkimas<br>
                <INPUT type="radio" Name="rad" VALUE="Pasirinkimas 3">3 Pasirinkimas<br>
                Komentaras: <br>
                <textarea name="coment" rows="5" cols="20">Cia komentaras</textarea>
                <br><br>
                <input type="hidden" name="act" value="act">
                <input type="submit" name="submit" value="Issiusti">  
                <input type="reset" name="reset" value="Isvalyti">


            </form>

        
        
        
        
        
        
        
        <?php
//        $mysqli = mysqli_connect("localhost", "root", "", "testUser");
//        if (mysqli_connect_errno()) {
//            printf("Connect failes: %s\n", mysqli_connect_error());
//            exit();
//        } else {
//            printf("Host information: %s\n", mysqli_get_host_info($mysqli));
//            mysqli_close($mysqli);
//        }
        
        
         
//        $mysqli = mysqli_connect("localhost", "root", "", "testUser"); 
//        if (mysqli_connect_errno()) {
//            printf("Connect failed: %s\n", mysqli_connect_error());
//            exit();
//        } else {
//            
//            $sql = "CREATE TABLE testTABLE2 " . // cia vienoj eilutej jei netelpa . Taskas sujungia, kalbelis- perskirai.
//                    "(id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, vardas varchar (78), emailas varchar(78), pasirinkimas  varchar(78), komentaras varchar(120) )";// kintamasis sql, saugo uzklausa, 
//            $res = mysqli_query($mysqli, $sql); //kitamasis rezult pvz.  padaro uzklausa duombazej. turi jungimasis ir 
//            if ($res == TRUE) {  // patikrina tipa, ar jis egzistuoja, yra ivyko. paklausia ar funkcija ivykde-true
//                echo "Table testTable successfully created.";
//            } else {
//                printf("Could not create table: %s\n", mysqli_error($mysqli)); // jei luzo, spausdina su kalida, kuri paima is duombazes
//            }
//            mysqli_close($mysqli);
//        }
      
       

        
        
        
        
     
        
        
        ?>
        
      









    </body>
</html>
