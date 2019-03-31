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
        $_SESSION['question7'] = $_POST['question7'];

        $qa8 = [ '1', '2', '3', ''];
        $question8 = '';

        if (!empty($_SESSION['question8'])) {
            $question8 = $_SESSION['question8'];
        }

        if (!empty($_POST['question8'])) {
            $question8 = trim(strtolower($_POST['$question8']));
            if (!in_array($question8, $qa8))
                $question8 = '';
        }

        $_SESSION['question8'] = $question8;

        $radio = NULL;
        $radio .= 'Vartotojas: <input type="radio" value="1" name="question8" ';
        if ($question8 == '1')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= 'OS branduolys : <input type="radio" value="2" name="question8" ';
        if ($question8 == '2')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= 'Komandų interpretatorius : <input class="mb-3" type="radio" value="3" name="question8" ';
        if ($question8 == '3')
            $radio .= 'checked';
        $radio .= ' /><br>';

        $form = <<<EOD
<h2 class="mb-5"> 9 klausimas iš 15</h2>
    <form action="t10.php" method="POST">
        <h5 class="mb-3"><b>Kas sistemoje bendrauja tiesiogiai su technine įranga? </b></h5>
        $radio
        
        <input type="hidden" name ="act2" value="act2">  
        <input class=" mt-2 btn btn-success" type="submit" />
  
    </form>
EOD;
        echo $form;
        ?>
    </body>
</html>