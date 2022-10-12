<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warzywniak</title>

    <link rel="stylesheet" href="style.css"/>
</head> 
<body>
    <div id="container">

        <div id="baner">
            <div class="baner" id="baner1">
                <h1>Internetowy sklep z eko-warzywami</h1>
            </div>
            <div class="baner" id="baner2">
                
                <ol>
                    <li>warzywa</li>
                    <li>owoce</li>
                    <li><a href="https://terapiasokami.pl/">soki</a></li>
                </ol>
                
            </div>
        </div>

        <div style="clear:both"></div>

        <div id="main">
<?php

        $connect = mysqli_connect("localhost","root","","sklep");

        $query="Select nazwa, ilosc, opis, cena, zdjecie from produkty where Rodzaje_id in (1,2)";

        $result=$connect->query($query);


        while($row=$result->fetch_assoc()){
 
            echo '<div class="block">';

            echo '<img src="'.$row['zdjecie'].'" alt="warzywniak"/>';
            echo "<h5>".$row['nazwa']."</h5>";
            echo "<p>Opis: ".$row['opis']."</p>";
            echo "<p>Na stanie: ".$row['ilosc']."</p>";
            echo "<h2>".$row['cena']."zł</h2>"; 
            

            echo '</div>';
        }


        mysqli_close($connect);

?>


        </div>

        <div id="footer">

        <form action="sklep.php" method="POST">

            <span>Nazwa: </span><input type="text" name="nazwa"/> 
            <span>Cena: </span><input type="text" name="cena"/> 
            <input type="submit" value="Dodaj produkt"/>


        </form>
<?php
        if(isset($_POST['nazwa']) && isset($_POST['cena'])){
            
             $connect = mysqli_connect("localhost","root","","sklep");
            
             
             $nazwa=$_POST['nazwa'];
             $cena=$_POST['cena'];
             

             $query='INSERT INTO `produkty` (`id`, `Rodzaje_id`, `Producenci_id`, `nazwa`, `ilosc`, `opis`, `cena`, `zdjecie`) VALUES (NULL,2,2,"'.$nazwa.'",10,"puste",'.$cena.',"owoce.jpg")';

             $connect->query($query);

             mysqli_close($connect);

             unset($_POST['nazwa']);
             unset($_POST['cena']);

        }

?>

        <p>Stronę wykonał: Mateusz Szalast</p>



        </div>


    </div>
    
</body>
</html>