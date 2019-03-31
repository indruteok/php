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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    </head>
    <body class="m-3 bg-light text-center">
        <?php
        include 'functions.php';
        arPrisijunge();

//        echo "<pre>";
//        print_r($_POST);
//        echo "</pre>";

        if (isset($_POST['username']) && !empty($_POST['username'])) {
            $username = $_POST['username'];
            setcookie('username', $username);
        } elseif (isset($_COOKIE['username'])) {
            $username = $_COOKIE['username'];
        } else {
            $username = 'Svecias';
        }

        if(isset($_POST['act2']) && $_POST['act2']=='act3'){
            orderDuomenuIvedimasIDB();
             
        }

        
   
     
        ?>
           
        <p>Sveiki,  <?php echo $username; ?> </p>

        <br><b> Sausainių sąrašas:<b> <br>
                Sausainiai su vyšniomis - 3 Eur<br>
                Sausainiai su razinomis - 2,5 Eur<br>
                Sausainiai su šokoladu - 2 Eur<br>
                Sausainiai su karamele - 3,5 Eur<br>
                Sausainiai be priedų - 1,5 Eur<br>


                <form action="sarasas.php" method="POST">
                    <br> Pasirinkite produktą: <br>
                    <select name="operation" id="id_of_select">
                        <option value="1">Sausainiai su vyšniomis</option>
                        <option value="2">Sausainiai su razinomis</option>
                        <option value="3">Sausainiai su šokoladu</option>
                        <option value="4">Sausainiai su karamele</option>
                        <option value="5">Sausainiai be priedų</option>
                    </select>
                    <input type="number" name="addKiekis" value="1">

                    <input type="hidden" name ="act2" value="act3">
                    <input class=" mt-2 btn btn-success" type="submit" name="submit" value="Pateikti">

                </form>

               
                <a href="uzbaigti.php"><button class=" mt-2 btn btn-warning"  type="button">Užbaigti</button></a>
                <a href="SelgosSausainine9.php"><button class=" mt-2 btn btn-danger" type="button">Atsijungti</button></a>



                </body>
                </html>
