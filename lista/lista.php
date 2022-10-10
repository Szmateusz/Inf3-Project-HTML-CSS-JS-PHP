<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista przyjaciół</title>

    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <div id="container">

        <div id="baner">
            <h1>Portal społecznościowy - moje konto</h1>
        </div>

        <div id="main">

            <h2>Moje zainteresowania</h2>

            <ul>
                <li>muzyka</li>
                <li>filmy</li>
                <li>komputery</li>
            </ul>

            <h2>Moi znajomi</h2>

<?php


        $connect = mysqli_connect("localhost","root","","lista");

        $query="SELECT imie, nazwisko, opis, zdjecie from osoby where Hobby_id in (1,2,6)";

        $result = $connect->query($query);

        while($row=$result->fetch_assoc()){

            echo '<div class="block"><div class="zdj"><img src="'.$row['zdjecie'].'" alt="przyjaciel"/></div>';
            echo '<div class="opis"><h3>'.$row['imie']." ".$row['nazwisko'].'</h3><p>Ostatni wpis: '.$row['opis'].'</p></div>';
            echo '<div class="linia"></div>';
            echo "</div>";
        }



        mysqli_close($connect);
        
?>
        


        </div>

        <div id="footers">
            <div class="footer" id="footer1">
                
                Stronę wykonał: Mateusz Szalast

            </div>

            <div class="footer" id="footer2">

                <a href="ja@portal.pl">Napisz do mnie</a>

            </div>
        </div>



    </div>
    
</body>
</html>