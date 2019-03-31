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
            $uzklausa = "INSERT INTO person" .
                    "( firstname , lastname , age ) VALUES ('".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['age']."' )";
            $res = mysqli_query($mysqli, $uzklausa);
            if ($res == TRUE) {
                echo "A record has been inserted";
            } else {
                printf("Could not insert record: %s\n", mysqli_error($mysqli));
            }
            mysqli_close($mysqli);
        }
        ?>
    </body>
</html>
