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

        $_SESSION['question0'] = $_POST['question0'];


        if (!isset($_SESSION['question0'])) {
            header("Location: http://localhost/paskaita12testas/login.php");
        } else {
            
        }

        echo "Sveiki, " . $_SESSION['username'];

// WHAT Q DO WE RECOGNIZE?
        $qa1 = [ '1', '2', '3', ''];

// WHAT IS THE DEFAULT Q?
        $question1 = '';

// TRY TO GET THE Q FROM THE PHP SESSION
        if (!empty($_SESSION['question1'])) {
            $question1 = $_SESSION['question1'];
        }
// TRY TO OVERRIDE THE DEFAULT/SESSION WITH THE REQUEST VARIABLE
        if (!empty($_POST['question1'])) {
            $question1 = trim(strtolower($_POST['question1']));
            if (!in_array($question1, $qa1))
                $question1 = '';
        }

// SET THE Q IN THE PHP SESSION
        $_SESSION['question1'] = $question1;
        //    echo $_SESSION['question1'];
// PREPARE THE RADIO BUTTONS
        $radio = NULL;
        $radio .= 'Windows: <input type="radio" value="1" name="question1" ';
        if ($question1 == '1')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= 'Linux : <input type="radio" value="2" name="question1" ';
        if ($question1 == '2')
            $radio .= 'checked';
        $radio .= ' /><br>';
        $radio .= 'MacOS : <input class="mb-3" type="radio" value="3" name="question1" ';
        if ($question1 == '3')
            $radio .= 'checked';
        $radio .= ' /><br>';

// PREPARE THE FORM
        $form = <<<EOD
<h2 class="mb-5"> 2 klausimas iš 15</h2>
    <form action="t3.php" method="POST">
        <h5 class="mb-3"><b> Kokios šeimos operacinės sistemos dominuoja tarnybinėse stotyse? </b></h5>
        $radio
        
        <input type="hidden" name ="act2" value="act2">  
        <input class=" mt-2 btn btn-success" type="submit" />
  
    </form>
EOD;

        echo $form;
        ?>
    </body>
</html>
