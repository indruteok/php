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
        $mysqli = mysqli_connect("localhost", "root", "", "testDb");
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        } else {
            $sql = "SELECT*FROM testTable";
            $res = mysqli_query($mysqli, $sql);
            if ($res) {
                while($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)){ //imama iekviena nauja rezultatu eilute. kiekviena eilute irasoma i atskira masyva. Pavercia i string 
                $id=$newArray['id'];
                $testField = $newArray['testField'];
                echo "The ID is ".$id." and the text is ".$testField."<br/>";    
                }
                
            } else {
                printf("Could not insert record: %s\n", mysqli_error($mysqli));
            }
            mysqli_free_result($res);
            mysqli_close($mysqli);
        }
// put your code here
        ?>
    </body>
</html>
