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
        $_SESSION['question9'] = $_POST['question9'];

        $qa10 = [ '1', '2', '3', ''];
        $question10 = '';

        if (!empty($_SESSION['question10'])) {
            $question10 = $_SESSION['question10'];
        }

        if (!empty($_POST['question10'])) {
            $question10 = trim(strtolower($_POST['$question10']));
            if (!in_array($question10, $qa10))
                $question10 = '';
        }

        $_SESSION['question10'] = $question10;

        $radio = NULL;
        $radio .= 'Ctrl+Z: <input type="radio" value="1" name="question10" ';
        if ($question10 == '1')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= 'Ctrl+C : <input type="radio" value="2" name="question10" ';
        if ($question10 == '2')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= 'Ctrl+D : <input class="mb-3" type="radio" value="3" name="question10" ';
        if ($question10 == '3')
            $radio .= 'checked';
        $radio .= ' /><br>';

        $form = <<<EOD
<h2 class="mb-5"> 11 klausimas iš 15</h2>
    <form action="t12.php" method="POST">
        <h5 class="mb-3"><b>Kokia mygtukų kombinacija sustabdo vykdomą procesą? </b></h5>
        $radio
        
        <input type="hidden" name ="act2" value="act2">  
        <input class=" mt-2 btn btn-success" type="submit" />
  
    </form>
EOD;
        echo $form;
        ?>
    </body>
</html>