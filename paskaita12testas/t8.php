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
        $_SESSION['question6'] = $_POST['question6'];

        $qa7 = [ '1', '2', '3', ''];
        $question7 = '';

        if (!empty($_SESSION['question7'])) {
            $question7 = $_SESSION['question7'];
        }

        if (!empty($_POST['question7'])) {
            $question7 = trim(strtolower($_POST['$question7']));
            if (!in_array($question7, $qa7))
                $question7 = '';
        }

        $_SESSION['question7'] = $question7;

        $radio = NULL;
        $radio .= 'Raginimo simbolis: <input type="radio" value="1" name="question7" ';
        if ($question7 == '1')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= 'Esamas katalogas : <input type="radio" value="2" name="question7" ';
        if ($question7 == '2')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= 'Interpretatoriaus tipas : <input class="mb-3" type="radio" value="3" name="question7" ';
        if ($question7 == '3')
            $radio .= 'checked';
        $radio .= ' /><br>';

        $form = <<<EOD
<h2 class="mb-5"> 8 klausimas iš 15</h2>
    <form action="t9.php" method="POST">
        <h5 class="mb-3"><b>Terminalo lange bash apvalkale po vartotojo ir kompiuterio vardo nurodoma: </b></h5>
        $radio
        
        <input type="hidden" name ="act2" value="act2">  
        <input class=" mt-2 btn btn-success" type="submit" />
  
    </form>
EOD;
        echo $form;
        ?>
    </body>
</html>