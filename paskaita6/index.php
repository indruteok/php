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
    </head>
    <body>
        <?php
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING); // jei yra daigiau vardo ivesciu, galima isivesti i kintamaji , filtravimo sakini.ir naudoti kintamaji
        $surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING); // filtravimo sakinys ivestas i kintamaji
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING); // filtravimo sakinys ivestas i kintamaji
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING); // filtravimo sakinys ivestas i kintamaji
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING); // filtravimo sakinys ivestas i kintamaji
        $familyStatus = filter_input(INPUT_POST, 'familyStatus', FILTER_SANITIZE_STRING); // filtravimo sakinys ivestas i kintamaji

        if (null !== filter_input(INPUT_POST, 'act', FILTER_SANITIZE_STRING) && filter_input(INPUT_POST, 'act', FILTER_SANITIZE_STRING) == 'act') {// filtruoja konkretu kintamajo pagal nurodyta pavadinima, 
            echo "<br> Vardas: " . $name;  // issapusdinama kintamojo reiksme
            echo "<br> Pavarde: " . $surname; // issapusdinama kintamojo reiksme
            echo "<br> E_mailas: " . $email; // issapusdinama kintamojo reiksme
            echo "<br> Telefonas: " . $phone; // issapusdinama kintamojo reiksme
            $mysqli = mysqli_connect("localhost", "root", "", "forms");  // Prisijungimas prie duombazes, vieta;vartotojas;slaptazodis; duomenu bazespavadinimas, ikeltas i kintamaji 
            if (mysqli_connect_errno()) {  // ziurima ar prisijungta, jei ne ispausdina prisijungimo klaida
                printf(mysqli_connect_error()); // klaidos spausdinimas
                exit();  // jei randama klaida stabdoma programa
            } else { // jei buvo neatitikimu salygom vykdo sekaciai
                $sql = "INSERT INTO main (name, surname, email, phone) VALUES ('" . $name . "','" . $surname . "','" . $email . "','" . $phone . "')"; // duomenu insertinimas i pasirinkta main lenetele
                $res = mysqli_query($mysqli, $sql); // paleista uzklausa irasoma i kintamaji 
                if ($res == TRUE) { //jei operacija sekminga, atlika sekacius veiksmus
                    if (isset($address) || isset($sex) || isset($$familyStatus)) {  // tikrinama salyga ar nors vienas laukelis egzistuoja
                        $sqlExtraCreateRow = "INSERT INTO extra (ID) VALUES ((SELECT MAX(ID) FROM main))"; // gautus uzklausos duomenis uzraso i kintamaji
                        $resExtraCreateRow = mysqli_query($mysqli, $sqlExtraCreateRow); // gautus uzklausos duomenis uzraso i kintamaji
                        if ($resExtraCreateRow == TRUE) {//jei operacija sekminga, atlika sekacius veiksmus
                            if (is_string($address) && !empty($address)) { // daromas patikrinimas ar duomenys yra string tipo ir ar jie isvis ivesti
                                $sqlUpdateAddress = "UPDATE extra SET adress='" . $address . "' WHERE ID=((SELECT MAX(ID) FROM main))"; //priskiriamas paskutinis id prie ivesto rezulatao
                                $resUpdateAddress = mysqli_query($mysqli, $sqlUpdateAddress); // gautus uzklausos duomenis uzraso i kintamaji
                                echo "<br> Adresas: " . $address; // issapusdinama kintamojo reiksme
                            }
                            if (is_string($_POST['rad']) && !empty($_POST['rad'])) { // daromas patikrinimas ar duomenys yra string tipo ir ar jie isvis ivesti
                                $sqlUpdateSex = "UPDATE extra SET sex='" . $_POST['rad'] . "' WHERE ID=((SELECT MAX(ID) FROM main))";  //priskiriamas paskutinis id prie ivesto rezulatao
                                $resUpdateSex = mysqli_query($mysqli, $sqlUpdateSex); // gautus uzklausos duomenis uzraso i kintamaji
                                if ($resUpdateSex) { // jei yra pasinikimas at;ieka sekancius veiksmus
                                    echo "<br> Lytis: " . $_POST['rad']; // issapusdinama kintamojo reiksme
                                }
                            }
                            if (is_string($familyStatus) && !empty($familyStatus)) {  // daromas patikrinimas ar duomenys yra string tipo ir ar jie isvis ivesti
                                $sqlUpdateFamilyStatus = "UPDATE extra SET familyStatus='" . $familyStatus . "' WHERE ID=((SELECT MAX(ID) FROM main))";  //priskiriamas paskutinis id prie ivesto rezulatao
                                $resUpdateFamilyStatus = mysqli_query($mysqli, $sqlUpdateFamilyStatus); // gautus uzklausos duomenis uzraso i kintamaji
                                echo "<br> Seimos statusas: " . $familyStatus; // issapusdinama kintamojo reiksme
                            }
                        } else { // jei buvo neatitikimu salygom vykdo sekaciai
                            printf(mysqli_error($mysqli)); //grazina  klaidos eilute, jei tokia yra
                            exit(); // jei randama klaida stabdoma programa
                        }
                    } else {// jei buvo neatitikimu salygom vykdo sekaciai
                        printf(mysqli_error($mysqli)); // grazina  klaidos eilute, jei tokia yra
                        exit(); // jei randama klaida stabdoma programa
                    }
                }
                $querry2 = "SELECT * FROM extra WHERE ID=(SELECT MAX(ID) FROM main)"; // duomenu isrinkimas is lentes
                $res2 = mysqli_query($mysqli, $querry2); // uzklausa isaugoma i kintamaji

                $idisraukiamas = "SELECT MAX(ID) FROM main";  // id isrinkimas is lenteles
                $res3 = mysqli_query($mysqli, $idisraukiamas);  // uzklausa isaugoma i kintamaji

                while ($row = mysqli_fetch_array($res3, MYSQLI_ASSOC)) {// uzklausos  reziltatai irasomi i kintamaji
                    $masyvas = $row["MAX(ID)"];  // gautas id perkeliamas i masyva

                    if ($res2) {
                        $duomenys = fopen("data.txt", "a"); // //kintamojo priskyrimas fwrite funkcijai                                                        
                        fwrite($duomenys, "id: " . $masyvas . "\n"     //įrašymas į failą
                                . "Vardas: " . $name . "\n"
                                . "Pavarde: " . $surname . "\n"
                                . "Emailas: " . $email . "\n"
                                . "Telefonas: " . $phone . "\n"
                                . "Adresas: " . $address . "\n"
                                . "Lytis: " . $_POST['rad'] . "\n"
                                . "Seimos statusas: " . $familyStatus . "\n"
                        );
                        fclose($duomenys);  //su fopen atidaryto failo uždarymas (kad nekybotų sistemos atminty)
                        $read = file("data.txt"); //failo nuskaitymas į masyvą 
                        echo "<pre>";
                        print_r($read); //failo išspausdinimas, kaip masyvo
                        echo "<pre>";
                    } else { // jei buvo neatitikimu salygom vykdo sekaciai
                        printf("MySQL Querry error: %s\n", mysqli_error($mysqli)); // grazina  klaidos eilute, jei tokia yra
                        exit(); // jei randama klaida stabdoma programa
                    }
                }
                mysqli_close($mysqli);  // darbo pabaiga, atsijungiama nuo duombazes
            }
        } else {

            $act2 = filter_input(INPUT_POST, 'act2', FILTER_SANITIZE_STRING); // filtravimo sakinys ivestas i kintamaji

            if (isset($act2) && $act2 == 'act2') { 
                ?>
        <!--  nurodo kur ction kur forma kreipasi, metodas- nurodo kokio tipo duomeu maemimas-->
                <form action ="<?php echo $_SERVER['PHP_SELF']; ?>" method ="POST">
                    Adresas: <input type="text" name="address"><br>
                    <br> Lytis: <br>
                    <INPUT type="radio" Name="rad" VALUE="Vyras">Vyras<br>
                    <INPUT type="radio" Name="rad" VALUE="Moteris">Moteris<br>
                    Seimos statusas: <input type="text" name="familyStatus"<br><br>

                    <br><br>
                    
<!--                    suteikiamas pavadinimas formai:-->
                    <input type="hidden" name ="act" value="act">
                    <input type="submit" name="submit" value="Issiusti">
                    <input type="reset" name="reset" value="Isvalyti">
                    <input type="hidden" name ="name" value="<?php echo $name ?>">
                    <input type="hidden" name ="email" value="<?php echo $email ?>">
                    <input type="hidden" name ="surname" value="<?php echo $surname ?>">
                    <input type="hidden" name ="phone" value="<?php echo $phone ?>">
                    <?php
                } else {
                    ?>
<!--   nurodo kur ction kur forma kreipasi, metodas- nurodo kokio tipo duomeu maemimas-->
                    <form action ="<?php echo $_SERVER['PHP_SELF']; ?>" method ="POST">      
                        Vardas: <input type="text" name="name"><br>
                        Pavarde: <input type="text" name="surname"<br><br>
                        Emailas: <input type="text" name=" email"<br><br>
                        Telefonas: <input type="text" name="phone"<br><br>
                        <br><br>
                        <!--                    suteikiamas pavadinimas formai:-->
                        <input type="hidden" name ="act2" value="act2">
                        <input type="submit" name="submit" value="Issiusti">
                        <input type="reset" name="reset" value="Isvalyti">
                    </form>
            </body>
        </html>
        <?php
    }
}        