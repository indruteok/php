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
        $_SESSION['question13'] = $_POST['question13'];

        $qa14 = [ '1', '2', '3', ''];
        $question14 = '';

        if (!empty($_SESSION['question14'])) {
            $question14 = $_SESSION['question14'];
        }

        if (!empty($_POST['question14'])) {
            $question14 = trim(strtolower($_POST['$question13']));
            if (!in_array($question14, $qa14))
                $question14 = '';
        }

        $_SESSION['question14'] = $question14;

        $radio = NULL;
        $radio .= 'Komanda clear: <input type="radio" value="1" name="question14" ';
        if ($question14 == '1')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= 'Ctrl+l: <input type="radio" value="2" name="question14" ';
        if ($question14 == '2')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= 'Tinka abu variantai : <input class="mb-3" type="radio" value="3" name="question14" ';
        if ($question14 == '3')
            $radio .= 'checked';
        $radio .= ' /><br>';

        $form = <<<EOD
<h2 class="mb-5"> 15 klausimas iš 15</h2>
    <form action="pabaiga.php" method="POST">
        <h5 class="mb-3"><b>Ekrano išvalymas </b></h5>
        $radio
        
        <input type="hidden" name ="act2" value="act2">  
        <input class=" mt-2 btn btn-success" type="submit" />
  
    </form>
EOD;
        echo $form;
        ?>
        
         
    </body>
</html>