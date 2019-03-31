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
        $_SESSION['question12'] = $_POST['question12'];

        $qa13 = [ '1', '2', '3', ''];
        $question13 = '';

        if (!empty($_SESSION['question13'])) {
            $question13 = $_SESSION['question13'];
        }

        if (!empty($_POST['question13'])) {
            $question13 = trim(strtolower($_POST['5']));
            if (!in_array($question13, $qa13))
                $question13 = '';
        }

        $_SESSION['question13'] = $question13;

        $radio = NULL;
        $radio .= 'Parašius komandą exit: <input type="radio" value="1" name="question13" ';
        if ($question13 == '1')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= 'Panaudojus klaviatūros kombinaciją Ctrl+D : <input type="radio" value="2" name="question13" ';
        if ($question13 == '2')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= 'Tinka abu variantai : <input class="mb-3" type="radio" value="3" name="question13" ';
        if ($question13 == '3')
            $radio .= 'checked';
        $radio .= ' /><br>';

        $form = <<<EOD
<h2 class="mb-5"> 14 klausimas iš 15</h2>
    <form action="t15.php" method="POST">
        <h5 class="mb-3"><b>Kokiu būdu galima baigti darbą su terminalo langu? </b></h5>
        $radio
        
        <input type="hidden" name ="act2" value="act2">  
        <input class=" mt-2 btn btn-success" type="submit" />
  
    </form>
EOD;
        echo $form;
        ?>
    </body>
</html>