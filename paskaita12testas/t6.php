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
        $_SESSION['question4'] = $_POST['question4'];

        $qa5 = [ '1', '2', '3', ''];
        $question5 = '';

        if (!empty($_SESSION['question5'])) {
            $question5 = $_SESSION['question5'];
        }

        if (!empty($_POST['question5'])) {
            $question5 = trim(strtolower($_POST['$question5']));
            if (!in_array($question5, $qa5))
                $question5 = '';
        }

        $_SESSION['question5'] = $question5;

        $radio = NULL;
        $radio .= 'sh: <input type="radio" value="1" name="question5" ';
        if ($question5 == '1')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= 'fish : <input type="radio" value="2" name="question5" ';
        if ($question5 == '2')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= 'bash : <input class="mb-3" type="radio" value="3" name="question5" ';
        if ($question5 == '3')
            $radio .= 'checked';
        $radio .= ' /><br>';

        $form = <<<EOD
<h2 class="mb-5"> 6 klausimas iš 15</h2>
    <form action="t7.php" method="POST">
        <h5 class="mb-3"><b>Koks interpretatorius pagal nutylėjimą naudojamas Xubuntu OS? </b></h5>
        $radio
        
        <input type="hidden" name ="act2" value="act2">  
        <input class=" mt-2 btn btn-success" type="submit" />
  
    </form>
EOD;
        echo $form;
        ?>
    </body>
</html>