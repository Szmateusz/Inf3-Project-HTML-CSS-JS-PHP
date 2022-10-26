<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opinie klientów</title>

    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <header>
        <h1>Hurtownia spożywcza</h1>

    </header>

    <main>
        <h2>Opinie naszych klientów</h2>

<?php
        $connect = mysqli_connect("localhost","root","","opinie");

        $query = "SELECT klienci.zdjecie, klienci.imie, opinie.opinia from klienci inner join opinie on klienci.id = opinie.Klienci_id where klienci.Typy_id in (2,3) ";

        $result = $connect->query($query);

        while($row=$result->fetch_assoc()){

            $zdj=$row["zdjecie"];
            $imie=$row["imie"];
            $opinia=$row["opinia"];
           
            echo "<div class=\"blok\"><img src=\"$zdj\" alt=\"klient\"/> <i>$opinia</i><h4>$imie</h4></div>";



        }


?>

    </main>

    <footer>
        <div class="footer" id="f1">

            <h3>Współpracują z nami”</h3>
            <a href="http://sklep.pl/">Sklep 1</a>

        </div>

        <div class="footer" id="f2">

            <h3>Nasi top klienci”</h3>
<?php

            $query = "SELECT imie, nazwisko, punkty from klienci order by punkty desc limit 3";

            $result = $connect->query($query);

            echo "<ol>";
            while($row=$result->fetch_assoc()){

                $nazwisko=$row["nazwisko"];
                $imie=$row["imie"];
                $punkty=$row["punkty"];
               
                echo "<li>$imie $nazwisko pkt $punkty</li>";
    
    
    
            }
            echo "</ol>";

            mysqli_close($connect);


?>
            
        </div>

        <div class="footer" id="f3">

            <h3>Skontaktuj się</h3>

            <p>telefon: 111222333</p>
            
        </div>

        <div class="footer" id="f4">
            
        <p>Autor: Mateusz Szalast</p>

        </div>

    </footer>
    
</body>
</html>