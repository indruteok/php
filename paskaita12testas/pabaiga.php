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
        include 'functions.php';

        session_start();
        $_SESSION['question14'] = $_POST['question14'];

        $atsakymai = array($_SESSION['question0'], $_SESSION['question1'], $_SESSION['question2'], $_SESSION['question3'], $_SESSION['question4'], $_SESSION['question5'], $_SESSION['question6'], $_SESSION['question7'], $_SESSION['question8'], $_SESSION['question9'], $_SESSION['question10'], $_SESSION['question11'], $_SESSION['question12'], $_SESSION['question13'], $_SESSION['question14']);
        $atsTeisingi = array();


        $mysqli = mysqli_connect("localhost", "root", "", "test");
        if (mysqli_connect_errno()) {
            printf(mysqli_connect_error());
            exit();
        } else {
            $sql2 = "SELECT * FROM testats ";
            $res2 = mysqli_query($mysqli, $sql2);

            if ($res2) {
                while ($newArray = mysqli_fetch_array($res2, MYSQLI_ASSOC)) { //imama iekviena nauja rezultatu eilute. kiekviena eilute irasoma i atskira masyva. Pavercia i string 
                    $id = $newArray['id'];
                    $ats = $newArray['rightAnswer'];

                    array_push($atsTeisingi, $ats);
                }

                $balai = 0;
                foreach ($atsakymai as $key => $value) {
                    if ($atsTeisingi[$key] == $value) {
                        $balai = $balai + 1;
                    } else {
                        $balai = $balai;

                        $sql = "INSERT INTO ats (userid, question, answerWrong) VALUES ('" . $_SESSION['id'] . "','" . ($key + 1) . "','" . $atsakymai[$key] . "')";
                        $res = mysqli_query($mysqli, $sql);
                        if ($res == TRUE) {
                            //  echo "A record has been inserted";
                        } else {
                            printf("Could not insert record: %s\n", mysqli_error($mysqli));
                        }
                    }
                }
                echo "teisingi atsakymai " . $balai . " iš 15 galimų <br>";
                $pazimys = 10 / 15 * $balai;
                echo "Pažimys " . $pazimys;

                $_SESSION['pazimys'] = $pazimys;
                pazymioIkelimasIDB();
            } else {
                printf("Could not insert record: %s\n", mysqli_error($mysqli));
            }

            if ($res2) {
                
            } else {
                echo mysqli_error($mysqli);
            }
            mysqli_close($mysqli);
        }
        ?>

        <br><a href="pazymiai.php"><button class=" mt-2 btn btn-warning"  type="button">Peržiūrėti visus pažymius</button></a>


    </body>
</html>
