<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nasz sklep komputerowy</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="container">

    <div id="header">
         <div class="header" id="menu">
            <ul id="menu">
                <li><a href="index.php">Główna</a></li>
                <li><a href="procesory.html">Procesory</a></li>
                <li><a href="ram.html">RAM</a></li>
                <li><a href="grafika.html">Grafika</a></li>
            </ul>

        </div>

        <div class="header" id="logo">
            <h2>Podzespoły komputerowe</h2>

        </div>
    </div>
       
<div style="clear:both"></div>

        <div id="main">
            <h1>Dzisiejsze promocje</h1>

            <table>
                <tr id="naglowek"><td>NUMER</td><td>NAZWA</td><td>PODZESPÓŁ</td><td>OPIS</td><td>CENA</td></tr>
<?php
            $connect = mysqli_connect("localhost","root","","podzespoly");

            $query="SELECT id, nazwa, opis, cena from podzespoly where cena < 1000";


            $result=$connect->query($query);

            while($row=$result->fetch_assoc()){
                $id=$row['id'];
                $nazwa=$row['nazwa'];
                $opis=$row['opis'];
                $cena=$row['cena'];

                echo "<tr><td>$id</td><td>$nazwa</td><td>$opis</td><th>$cena</th></tr>";


            }

            mysqli_close($connect);

?>
            </table>



        </div>

        <div id="footer">
            <div class="footer" id="f1">
                <img src="scalak.jpg" alt="promocje na procesory" />

            </div>
            <div class="footer" id="f2">
                <h4>Nasz Sklep Internetowy</h4>

                <p>Współpracujemy z hurtownią <a href="http://www.edata.pl/" target="_blank">edata</a></p>
                
            </div>
            <div class="footer" id="f3">
                <p>zadzwoń: 601 602 603</p>
                
            </div>
            <div class="footer" id="f4">
                <p>Stronę wykonał: Mateusz Szalast</p>
                
            </div>
        </div>
















    </div>
</body>
</html>