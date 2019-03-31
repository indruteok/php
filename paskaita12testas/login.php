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
    <body  class="m-3 bg-light text-center">

        <?php
        include 'functions.php';
        arPrisijunge();

        session_start();
        echo "Sveiki, " . $_SESSION['username'] . $_SESSION['id'];


        // WHAT Q DO WE RECOGNIZE?
        $qa0 = [ '1', '2', '3', ''];

// WHAT IS THE DEFAULT Q?
        $question0 = '';

// TRY TO GET THE Q FROM THE PHP SESSION
        if (!empty($_SESSION['question0'])) {
            $question0 = $_SESSION['question0'];
        }
// TRY TO OVERRIDE THE DEFAULT/SESSION WITH THE REQUEST VARIABLE
        if (!empty($_POST['question0'])) {
            $question0 = trim(strtolower($_POST['question0']));
            if (!in_array($question0, $qa0))
                $question0 = '';
        }

// SET THE Q IN THE PHP SESSION
        $_SESSION['question0'] = $question0;
        //    echo $_SESSION['question1'];
// PREPARE THE RADIO BUTTONS
        $radio = NULL;
        $radio .= 'Interneto prieigos tiekėjas: <input type="radio" value="1" name="question0" ';
        if ($question0 == '1')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= 'Domeno vardų tarnybinė stotis : <input type="radio" value="2" name="question0" ';
        if ($question0 == '2')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= 'Vietinio tinklo maršrutizatorius : <input class="mb-3" type="radio" value="3" name="question0" ';
        if ($question0 == '3')
            $radio .= 'checked';
        $radio .= ' /><br>';

// PREPARE THE FORM
        $form = <<<EOD
<h2 class="mb-5"> 1 klausimas iš 15</h2>
    <form action="t2.php" method="POST">
        <h5 class="mb-3"><b>  Kas yra DNS? </b></h5>
        $radio
        
        <input type="hidden" name ="act2" value="act2">              
        <input class=" mt-2 btn btn-success" type="submit" />         
    </form>
EOD;



        echo $form;
        ?>



        <a href="pazymiai.php"><button class=" mt-2 btn btn-warning"  type="button">Peržiūrėti visus pažymius</button></a> 

    </body>
</html>
