<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prognoza Pogody Poznań</title>

    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <header>
        <div class="baner" id="b1">
            <p>maj 2019 r.</p>

        </div>
        <div class="baner" id="b2">
            <h2>Prognoza dla Poznania</h2>
            
        </div>
        <div class="baner" id="b3">
            <img src="logo.png" alt="prognoza"/>
            
        </div>
    </header>

    <main>
        <section>
            <div class="mapa"id="lewy">
                <a href="kwerendy.txt">Kwerendy</a>

            </div>
            <div class="mapa"id="prawy">
                <img src="obraz.jpg" alt="Polska,Poznań" style="height:100%;"/>

            </div>
        </section>

        <section id="main">
            <table>
                <tr class="naglowek"><td>Lp.</td><td>DATA</td><td>NOC-Temperatura</td><td>DZIEŃ-TEMPERATURA</td><td>OPADY[mm/h]</td><td>CIŚNIENIE[hPa]</td></tr>
<?php
            $connect = mysqli_connect("localhost","root","","meteo");

            $query="SELECT * from pogoda where miasta_id=2 order by data_prognozy desc ";

            $result=$connect->query($query);

            while($row=$result->fetch_assoc()){
                $id=$row['id'];
                $data=$row['data_prognozy'];
                $noc=$row['temperatura_noc'];
                $dzien=$row['temperatura_dzien'];
                $opady=$row['opady'];
                $cisnienie=$row['cisnienie'];

                echo "<tr><td>$id</td><td>$data</td><td>$noc</td><td>$dzien</td><td>$opady</td><td>$cisnienie</td></tr>";
            }


?>
            </table>


        </section>

    </main>

    <footer>
        <p>Stronę wykonał: Mateusz Szalast</p>
    </footer>
    
</body>
</html>