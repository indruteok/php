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
  
        $mysqli = mysqli_connect("localhost", "root", "", "centras");
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        } else {
            $sql = "SELECT*FROM person WHERE id =1";
            $res = mysqli_query($mysqli, $sql);
            if ($res) {
                while($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){ //imama iekviena nauja rezultatu eilute. kiekviena eilute irasoma i atskira masyva. Pavercia i string 
                $id=$newArray['id'];
                $firstname = $newArray['firstname'];
                $lastname = $newArray['lastname'];
                $age = $newArray['age'];
                echo "The ID is ".$id." and the name is ".$firstname."  and lastname  is  ".$lastname." ang age is ".$lastname." <br/>";    
                }
                
            } else {
                printf("Could not insert record: %s\n", mysqli_error($mysqli));
            }
            mysqli_free_result($res);
            mysqli_close($mysqli);
        }
        ?>
    </body>
</html>
