<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video On Demand</title>

    <link rel="stylesheet" href="style.css"/>
</head>
<body>

<div id="container">

<header>
        <div id="baner1" class="baner">
            <h1>Internetowa wypożyczalnia filmów</h1>
        </div>

        <div id="baner2" class="baner">
            <table>
                <tr> <td>Kryminał</td><td>Horrory</td>Przygodowy<td></td> </tr>
                <tr> <td>20</td><td>30</td><td>40</td> </tr>
            </table>
        </div>
</header>

<div style="clear:both"></div>
    
    <section>
        <div id="blok_listy" class="lista">
            <h3>Polecamy</h3>
<?php
        $connect= mysqli_connect("localhost","root","","video");

        $query = "Select id, nazwa, opis, zdjecie from produkty where id in (18, 22, 23, 25);";

        $result = $connect->query($query);

        while($row=$result->fetch_assoc()){

            echo '<div class="block">'.'<h4>'.$row['id'].'. '.$row['nazwa'].'</h4>';

            echo '<img src="'.$row['zdjecie'].'" alt="film"';

            echo '<p>'.$row['opis'].'</p></div>';
        }
?>
        </div>
   

    </section>

    <section>
        <div id="blok_fantasy" class="lista">
             <h3>Polecamy</h3>
 <?php
       

        $query = "Select id, nazwa, opis, zdjecie from produkty where Rodzaje_id=12;";

        $result = $connect->query($query);

        while($row=$result->fetch_assoc()){

            echo '<div class="block">'.'<h4>'.$row['id'].'. '.$row['nazwa'].'</h4>';

            echo '<img src="'.$row['zdjecie'].'" alt="film"';

            echo '<p>'.$row['opis'].'</p></div>';
        }

        mysqli_close($connect);
?>

        </div>
    
    </section>

    <footer>
        <div id="stopka">
            <form action="video.php" method="POST">
                <p>Usuń film nr. : <input type="number" name="numer"/> <input type="submit" value="Usuń film"/>
            </form>

            <p>Stronę wykonał Mateusz Szalast</p>

        </div>

<?php
    if(isset($_POST['numer'])){
        $connect= mysqli_connect("localhost","root","","video");

        $wiersz = $_POST['numer'];
        $query = "Delete from produkty where id=$wiersz";

         $connect->query($query);


        mysqli_close($connect);
    }

?>
    </footer>


</div>

</body>
</html>