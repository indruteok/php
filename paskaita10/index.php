<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
setcookie('vardas', 'Petras', time() + 3600); // nustatyt sausaini,laika galima nurodyti. data nuo dabar iki kiek laiko tesis. pvz iki 3600s.
// eroru nukreipimas
echo "<HTML><HEAD>
<META HTTP-EQUIV='REFRESH' CONTENT ='0; URL =index,php'>
</HEAD<HTML>";



//index.php
if (isset($_POST['name']) && (!empty($_POST['name']))) {
    $name = $_POST['name'];
    setcookie('name', $name);
} elseif (isset($_COOKIE['name'])) {
    $name = $_COOKIE['name'];
} else {
    $name = 'Svecias';
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title> index.php puslapis </title>
    </head>
    <body>
        <h1>index.php puslapis</h1>
        <a href = 'page.php'> page.php puslapis </a>
        <br><br>
        <p>Sveiki,  <?php echo $name; ?> </p>
        <form method ='post'>
            <input type = 'text' name = 'name' />
            <input type = 'submit' />
        </form>
    </body>
</html>





<!--page.php-->
<?php
if (isset($_COOKIE['name'])) {
    $name = $_COOKIE['name'];
} else {
    $name = 'Svecias';
}
?>

<html>
    <head>
        <title> page.php puslapis </title>
    </head>
    <body>
        <h1>page.php puslapis</h1>
        <p>Sveiki,  <?php echo $name; ?> </p>
        <a href = 'index.php'> index.php puslapis </a>
    </body>
</html>


