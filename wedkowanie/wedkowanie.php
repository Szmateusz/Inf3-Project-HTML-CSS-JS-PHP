<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klub wedkowania</title>

    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <header>
        <h2>Wedkuj z nami!</h2>


    </header>

    <main>
        <div class="main" id="lewy">
            <img src="ryba2.jpg" alt="szczupak" style="height:400px"/>
    
        </div>
        <div class="main" id="prawy">
            <h3>Ryby spokojnego zeru (biale)</h3>
<?php
            $connect=mysqli_connect("localhost","root","","wedkowanie2");

            $query="SELECT id, nazwa, wystepowanie from ryby where styl_zycia=2 ";

            $result=$connect->query($query);

            while($row=$result->fetch_assoc()){
                $id=$row['id'];
                $nazwa=$row['nazwa'];
                $wystepowanie=$row['wystepowanie'];


                echo "<li>$id. $nazwa, wystepuje w: $wystepowanie</li>";
            }

?>

            <ol>
                <li><a href="https://wedkuje.pl/" target="_blank">Odwiedź także</a></li>
                <li><a href="https://pzw.org.pl/" target="_blank">Polski Zwiazek Wędkarski</a></li>

            </ol>

        </div>

    </main>

    <footer>
        <p>Strone wykonal:Mateusz Szalast</p>
    </footer>
    
</body>
</html>