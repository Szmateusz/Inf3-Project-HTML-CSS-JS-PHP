<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora</title>
    
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <div id="container">

        <div class="bif" id="baner">
            <h3>Portal społecznościowy - panel administratora</h3>
        </div>

        <div id="main">
            <div class="main" id="gl">
                <h4>Użytkownicy</h4>
<?php
        $connect = mysqli_connect("localhost","root","","portal");

        $query="Select id, imie, nazwisko, rok_urodzenia, zdjecie from osoby limit 30";

        $result=$connect->query($query);

        while($row=$result->fetch_assoc()){
            $wiek=Date("Y")-$row['rok_urodzenia'];

            echo "<br>".$row['id'].". ".$row['imie']." ".$row['nazwisko'].", $wiek lat";
            
        }

        mysqli_close($connect);


?>
                <p><a href="settings.html">Inne ustawienia</a></p>
            </div>
            <div class="main" id="gp">
                <h4>Podaj id użytkownika</h4>

                <form action="users.php" method="POST">

                    <input type="number" name="dane"/>
                    <input type="submit" value="ZOBACZ"/>

                </form>

                <hr>

<?php
    if(isset($_POST['dane'])){
         $ID=$_POST['dane'];

        $connect = mysqli_connect("localhost","root","","portal");

        $query="Select osoby.imie, osoby.nazwisko, osoby.rok_urodzenia, osoby.opis, osoby.zdjecie, hobby.nazwa from osoby inner join hobby on osoby.Hobby_id = hobby.id where osoby.id=$ID";

        $row=$connect->query($query)->fetch_assoc();

        echo "<h2>".$_POST['dane'].".".$row['imie']." ".$row['nazwisko']."</h2><br>";

        echo '<img src="'.$row['zdjecie'].'" alt="'.$_POST['dane'].'"<br>';

        echo "<p>Rok urodzenia: ".$row['rok_urodzenia']."</p>";
        echo "<p>Opis: ".$row['opis']."</p>";
        echo "<p>Hobby: ".$row['nazwa']."</p>";


        mysqli_close($connect);
    }
       



?>

            </div>

<div style="clear:both"></div>

        </div>

        <div class="bif" id="footer">
            Stronę wykonał: Mateusz Szalast
        </div>








    </div>
    
</body>
</html>