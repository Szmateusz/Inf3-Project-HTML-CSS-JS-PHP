<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wycieczki i urlopy</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="container">
        <div class="bif"  id="baner">
            <h1>BIURO PODRÓŻY</h1>
        </div>

        <div id="main">
            <div class="main" id="m1">
                <h2>KONTAKT</h2>
                <a href="mailto:biuro@wycieczki.pl">napisz do nas</a>
                <p>telefon 555666777</p>

            </div>
            <div class="main" id="m2">
                <h2>GALERIA</h2>
<?php
            $connect = mysqli_connect("localhost","root","","wycieczki");

            $query = "SELECT nazwaPliku, podpis from zdjecia order by podpis asc ";

            $result=$connect->query($query);

            while($row=$result->fetch_assoc()){

                echo '<img src="'.$row['nazwaPliku'].'" alt="'.$row['podpis'].'"/>';

            }
?>
                
            </div>
            <div class="main" id="m3">
                <h2>PROMOCJE</h2>

                <table>
                    <tr><td>Jesień</td><td>Grupa 4+</td><td>Grupa 10+</td></tr>
                    <tr><td>5%</td><td>10%</td><td>15%</td></tr>
                </table>
                
            </div>
        </div>

<div style="clear:both"></div>

        <div id="dane">
            <h2>LISTA WYCIECZEK</h2>
<?php
            $query = "SELECT id, dataWyjazdu, cel, cena from wycieczki where dostepna = 1";

            $result=$connect->query($query);

            while($row=$result->fetch_assoc()){
                
                $id=$row['id'];
                $data=$row['dataWyjazdu'];
                $cel=$row['cel'];
                $cena=$row['cena'];

                echo "$id. $data, $cel, cena: $cena <br>";

            }

            mysqli_close($connect);

?>

        </div>

        <div class="bif" id="footer">
            <p>Strone wykonał: Mateusz Szalast</p>

        </div>

    </div>
    
</body>
</html>