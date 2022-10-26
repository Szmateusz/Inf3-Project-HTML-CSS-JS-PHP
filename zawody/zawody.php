<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zawody wedkarskie</title>

    <link rel="stylesheet" href="style.css"/>

</head>
<body>
    <header>
        <div class="header" id="h1">
            <h1>Zawody polskich wędkarzy</h1>
        </div>

        <div class="header" id="h2">
            <img src="zawody.jpg" alt="wedkowanie"/>
        </div>
    </header>
    <main>
        <h3>Łowiska</h3>

        <ul>
            <li>Zalew Węgrowski</li>
            <li>Zbiornik Bukówka</li>
            <li>Jeziorko Bartbetowskie</li>
            <li>Warta-Obrzycko</li>
        </ul>

        <h3>Dodaj zawody wędkarskie</h3>

        <form action="zgloszenie.php" method="POST">

        <span>Łowisko:</span><input type="number" name="lowisko"/><br>
        <span>Data:</span><input type="date" name="data"/><br>
        <span>Sędzia:</span><input type="text" name="sedzia"/><br>

        <input type="button" value="Czyść" onclick="clear()"/>
        <input type="submit" value="Dodaj"/>




        </form>

    </main>

    <footer>
        <div class="footer" id="f1">

            <a href="kwerendy.txt">Pobierz</a>

        </div>

        <div class="footer" id="f2">

            <p>Stronę przygotował: Mateusz Szalast</p>
            
        </div>
    </footer>
    
</body>
</html>