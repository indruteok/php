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
        $_SESSION['question8'] = $_POST['question8'];

        $qa9 = [ '1', '2', '3', ''];
        $question9 = '';

        if (!empty($_SESSION['question9'])) {
            $question9 = $_SESSION['question9'];
        }

        if (!empty($_POST['question9'])) {
            $question9 = trim(strtolower($_POST['$question9']));
            if (!in_array($question9, $qa9))
                $question9 = '';
        }

        $_SESSION['question9'] = $question9;

        $radio = NULL;
        $radio .= 'Pakeis esamą katalogą į šakninį katalogą: <input type="radio" value="1" name="question9" ';
        if ($question9 == '1')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= 'Grįš vienu katalogu atgal: <input type="radio" value="2" name="question9" ';
        if ($question9 == '2')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= 'Išves klaidą : <input class="mb-3" type="radio" value="3" name="question9" ';
        if ($question9 == '3')
            $radio .= 'checked';
        $radio .= ' /><br>';

        $form = <<<EOD
<h2 class="mb-5"> 10 klausimas iš 15</h2>
    <form action="t11.php" method="POST">
        <h5 class="mb-3"><b>Ką padarys komanda cd ../ Linux terminalo lange? </b></h5>
        $radio
        
        <input type="hidden" name ="act2" value="act2">  
        <input class=" mt-2 btn btn-success" type="submit" />
  
    </form>
EOD;
        echo $form;
        ?>
    </body>
</html>