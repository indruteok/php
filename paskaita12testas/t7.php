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
        $_SESSION['question5'] = $_POST['question5'];

        $qa6 = [ '1', '2', '3', ''];
        $question6 = '';

        if (!empty($_SESSION['question6'])) {
            $question6 = $_SESSION['question6'];
        }

        if (!empty($_POST['question6'])) {
            $question6 = trim(strtolower($_POST['$question6']));
            if (!in_array($question6, $qa6))
                $question6 = '';
        }

        $_SESSION['question6'] = $question6;

        $radio = NULL;
        $radio .= 'man cat: <input type="radio" value="1" name="question6" ';
        if ($question6 == '1')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= ' --help cat : <input type="radio" value="2" name="question6" ';
        if ($question6 == '2')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= 'Abiejomis : <input class="mb-3" type="radio" value="3" name="question6" ';
        if ($question6 == '3')
            $radio .= 'checked';
        $radio .= ' /><br>';

        $form = <<<EOD
<h2 class="mb-5"> 7 klausimas iš 15</h2>
    <form action="t8.php" method="POST">
        <h5 class="mb-3"><b>Kokia komanda išsikviesime pagalbą komandai cat? </b></h5>
        $radio
        
        <input type="hidden" name ="act2" value="act2">  
        <input class=" mt-2 btn btn-success" type="submit" />
  
    </form>
EOD;
        echo $form;
        ?>
    </body>
</html>
