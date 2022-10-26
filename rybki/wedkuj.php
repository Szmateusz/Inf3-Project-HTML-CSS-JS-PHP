<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>

    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <header>
        <h1>Portal dla wędkarzy</h1>

    </header>

    <main>

    <div class="main" id="prawy">
            <img src="ryba1.jpg" alt="Sum"/>
            <p><a href="kwerendy.txt">Pobierz kwerendy</a></p>
        </div>
        <div class="lewy" id="lewy1">
            <h3>Ryby zamieszkujące rzeki</h3>

            <ol>
<?php
            $connect=mysqli_connect("localhost","root","","rybki");

            $query='SELECT ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo from ryby inner join lowisko on ryby.id = lowisko.Ryby_id where ryby.wystepowanie Like "%rzeki%"';

            $result=$connect->query($query);

            while($row=$result->fetch_assoc()){
                $nazwa=$row['nazwa'];
                $akwen=$row['akwen'];
                $woj=$row['wojewodztwo'];

                echo "<li>$nazwa pływa w rzece $akwen, $woj</li>";

            }


?>

            </ol>

        </div>

        

        

        <div class=" lewy" id="lewy2">
            <h3>„Ryby drapieżne naszych wód</h3>

            <table>
                <tr><td>LP.</td><td>Gatunek</td><td>Wystepowanie</td></tr>
<?php
                $query='SELECT id, nazwa, wystepowanie from ryby where  styl_zycia = 1';

                $result=$connect->query($query);
    
                while($row=$result->fetch_assoc()){
                    $id=$row['id'];
                    $nazwa=$row['nazwa'];
                    $wys=$row['wystepowanie'];
    
                    echo "<tr><td>$id</td><td>$nazwa</td><td>$wys</td></tr>";
    
                }
    
                mysqli_close($connect);
?>
            </table>
            
        </div>

        

    </main>

    <footer>
        <p>Stronę wykonał:Mateusz Szalast</p>

    </footer>
    
</body>
</html>