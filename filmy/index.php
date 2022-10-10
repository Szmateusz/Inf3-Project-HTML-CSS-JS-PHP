<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css"/>
    <title>Filmoteka</title>
</head>
<body>
<div id="container">

    <div id="baner">
        <div class="baner" id="baner1">
            <img src="klaps.png" alt="Nasze Filmy"/>
        </div>
        <div class="baner" id="baner2">
            <h2>BAZA FILMÓW</h2>
        </div>
        <div class="baner" id="baner3">
            <form action="index.php" method="POST">

                <select name="type">
                    <option value="1">Sci-fi</option>
                    <option value="2">Animacja</option>
                    <option value="3">Dramat</option>
                    <option value="4">Horror</option>
                    <option value="5">Komedia</option>
                </select>
                <input type="submit" value="Filmy"/>
            </form>
        </div>
        <div class="baner" id="baner4">
            <img src="gwiezdneWojny.jpg" alt="Szturmowcy"/>
        </div>

    </div>

    <div id="main">

        <div class="glowny" id="gl">
            <h2>Wybrano filmy</h2>
<?php
    $connect = mysqli_connect("localhost","root","","filmoteka");

    

    if(isset($_POST["type"])){
        $wybor = $_POST["type"];

        $query = "Select tytul, rok, ocena from filmy where gatunki_id = $wybor ";

        $result = $connect->query($query);

        while($row = $result->fetch_assoc()){
            echo "Tytuł: ".$row["tytul"].",<br>Rok Produkcji: ".$row["rok"].",<br>Ocena: ".$row["ocena"]."<br>";
        }
    }
    mysqli_close($connect);
?>
        </div>

        <div class="glowny" id="gp">
        <h2>Wszystkie filmy</h2>
<?php
    $connect = mysqli_connect("localhost","root","","filmoteka");

    

    

        $query = "Select filmy.id, filmy.tytul, rezyserzy.imie, rezyserzy.nazwisko from filmy inner join rezyserzy on rezyserzy.id = filmy.rezyserzy_id ";

        $result = $connect->query($query);

        while($row = $result->fetch_assoc()){
            echo "<br>".$row["id"]." ".$row["tytul"]." reżyseria: ".$row["imie"]." ".$row["nazwisko"];
        }
    
    mysqli_close($connect);
?>
        </div>


    </div>

    <div id="footer">
        <p> Autor:Mateusz Szalast</p>
        <p><a href="kwerendy.txt">Zapytania do bazy</a></p>
        <a href="filmy.pl">Przejdź do filmy.pl</a>

    </div>

</div>
    
</body>
</html>