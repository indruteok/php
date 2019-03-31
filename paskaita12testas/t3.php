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
        session_start();
        $_SESSION['question1'] = $_POST['question1'];

        if (!isset($_SESSION['question1']) ) {
            header("Location: http://localhost/paskaita12testas/t2.php");
        } else {
            
        }

        $qa2 = [ '1', '2', '3', ''];
        $question2 = '';

        if (!empty($_SESSION['question2'])) {
            $question2 = $_SESSION['question2'];
        }

        if (!empty($_POST['question2'])) {
            $question2 = trim(strtolower($_POST['question2']));
            if (!in_array($question2, $qa2))
                $question2 = '';
        }

        $_SESSION['question2'] = $question2;

        $radio = NULL;
        $radio .= 'Operacinės sistemos namų nustatymai.: <input type="radio" value="1" name="question2" ';
        if ($question2 == '1')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= 'Sistemos vartotojų sąrašas. : <input type="radio" value="2" name="question2" ';
        if ($question2 == '2')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= 'Vartotojų namų katalogai ir failai. : <input class="mb-3" type="radio" value="3" name="question2" ';
        if ($question2 == '3')
            $radio .= 'checked';
        $radio .= ' /><br>';

        $form = <<<EOD
<h2 class="mb-5"> 3 klausimas iš 15</h2>
    <form action="t4.php" method="POST">
        <h5 class="mb-3"><b>Kas saugoma Linux OS /home kataloge? </b></h5>
        $radio
        
        <input type="hidden" name ="act2" value="act2">  
        <input class=" mt-2 btn btn-success" type="submit" />
  
    </form>
EOD;
        echo $form;
        ?>
    </body>
</html>
