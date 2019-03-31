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
        $_SESSION['question2'] = $_POST['question2'];

        $qa3 = [ '1', '2', '3', ''];
        $question3 = '';

        if (!empty($_SESSION['question3'])) {
            $question3 = $_SESSION['question3'];
        }

        if (!empty($_POST['question3'])) {
            $question3 = trim(strtolower($_POST['question3']));
            if (!in_array($question3, $qa3))
                $question3 = '';
        }

        $_SESSION['question3'] = $question3;

        $radio = NULL;
        $radio .= '/lib: <input type="radio" value="1" name="question3" ';
        if ($question3 == '1')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= '/bin : <input type="radio" value="2" name="question3" ';
        if ($question3 == '2')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= '/dev : <input class="mb-3" type="radio" value="3" name="question3" ';
        if ($question3 == '3')
            $radio .= 'checked';
        $radio .= ' /><br>';

        $form = <<<EOD
<h2 class="mb-5"> 4 klausimas iš 15</h2>
    <form action="t5.php" method="POST">
        <h5 class="mb-3"><b>Kur saugomos sistemos programų bibliotekos? </b></h5>
        $radio
        
        <input type="hidden" name ="act2" value="act2">  
        <input class=" mt-2 btn btn-success" type="submit" />
  
    </form>
EOD;
        echo $form;

        ?>
    </body>
</html>
