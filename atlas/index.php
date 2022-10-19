<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dane o zwierzętach</title>

    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <header>
        <h1>Atlas zwierząt</h1>
    </header>

    <main>
        <section class="form">
            <h2>Gromady</h2>

            <ol>
                <li>Ryby</li>
                <li>Płazy</li>
                <li>Gady</li>
                <li>Ptaki</li>
                <li>Ssaki</li>
            </ol>

            <form action="index.php" method="POST">
                <input type="number" id="pole" name="pole"/>
                <label for="pole">Wybierz gromadę</label>
                <input type="submit" value="Wyświetl"/>
            </form>

        </section>

        <section>
            <div class="main" id="lewy">
                <img src="zwierzeta.jpg" alt="dzikie zwierzęta"/>

            </div>
            <div class="main" id="srodkowy">
<?php
            $connect=mysqli_connect("localhost","root","","atlas");

            if(isset($_POST['pole'])){
                if($_POST['pole']!=NULL && $_POST['pole']>0){
                    $id=$_POST['pole'];

                $query="SELECT gatunek, wystepowanie from zwierzeta where Gromady_id = $id";

                

                $result=$connect->query($query);
    
                while($row=$result->fetch_assoc()){
                    $gatunek=$row['gatunek'];
                    $wystepowanie=$row['wystepowanie'];

                    echo " $gatunek, $wystepowanie <br>";
    
                }
    
    
                }else{
                    echo "PODANA WARTOSĆ JEST NIEPRAWIDŁOWA";
                }
                }
                

                
        

?>
                
            </div>
            <div class="main" id="prawy">
                <h2>Wszystkie zwierzęta w bazie</h2>
<?php

            $query="SELECT zwierzeta.id, zwierzeta.gatunek, gromady.nazwa from zwierzeta inner join gromady on zwierzeta.Gromady_id=gromady.id";

            $result=$connect->query($query);

            while($row=$result->fetch_assoc()){
                $id=$row['id'];
                $gatunek=$row['gatunek'];
                $gromada=$row['nazwa'];

                echo "$id, $gatunek, $gromada <br>";
                
            }


            mysqli_close($connect);

?>
                
            </div>

        </section>
    </main>

    <footer>
        <a href="atlas-zwierzat.pl" target="_blank">Poznaj inne strony o zwierzętach</a>
        <span>Stronę wykonał: Mateusz Szalast</span>

    </footer>
    
</body>
</html>