<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odloty samolotów</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="container">
        <div id="baner">
            <div class="baner" id="baner1">
                <h2>Odloty z lotniska</h2>
            </div>
            <div class="baner" id="baner2">
                <img src="zad6.png" alt="logotyp" style="height:150px;width:auto;"/>

            </div>
        </div>
<div style="clear:both"></div>
        <div id="main">
            <h4>Tabela odlotów</h4>
            <table>
                <tr><td>Lp.</td><td>numer rejsu</td><td>czas</td><td>kierunek</td><td>status</td></tr>
<?php
            $connect = mysqli_connect("localhost","root","","airport");

            $query = "Select id, nr_rejsu, czas, kierunek, status_lotu from odloty order by czas desc";

            $result = $connect->query($query);

            while($row=$result->fetch_assoc()){
                echo "<tr><td>".$row['id']."</td><td>".$row['nr_rejsu']."</td><td>".$row['czas']."</td><td>".$row['kierunek']."</td><td>".$row['status_lotu']."</td></tr>";
            }

            mysqli_close($connect);


?>
            </table>
        </div>

        <div class="footer" id="footer1">
            <a href="kw1.jpg">Pobierz obraz</a> 

        </div>
        <div class="footer" id="footer2">
<?php

        $cookie_name = "ciastko";
        if(isset($_COOKIE["ciastko"]))
        {
            echo "<p><b>Miło nam, że znowu nas odwiedziłeś</b></p>";
        }
        else{
            setcookie($cookie_name,"true",time() +(3600*1));
            echo "<p><i>Dzień Dobry!Sprawdź regulamin naszej strony</i></p>";

        }
        

?>
            
        </div>
        <div class="footer" id="footer3">
            Autor: Mateusz Szalast
        </div>


    </div>
    
</body>
</html>