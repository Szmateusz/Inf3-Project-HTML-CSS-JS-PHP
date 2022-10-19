<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odżywianie zwierząt</title>

    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <header>
        <h2>Drapieżniki i inne</h2>

    </header>

    <main>
        <section class="form">
            
        <h3>Wybierz styl życia:</h3>
            <form action="index.php" method="POST">
                <select name="wybor">
                    <option value="1">Drapieżniki</option>
                    <option value="2">Roślinożerne</option>
                    <option value="3">Padlinożerne</option>
                    <option value="4">Wszystkożerne</option>
                </select>

                <input type="submit" value="ZOBACZ"/>
            </form>

        </section>
           

        <section>

        <div class="glowny" id="lewy">
                <h3>Lista zwierząt</h3>
<?php
            $connect= mysqli_connect("localhost","root","","drapieznicy");

            $query="SELECT  zwierzeta.gatunek, odzywianie.rodzaj from zwierzeta inner join odzywianie on zwierzeta.Odzywianie_id = odzywianie.id";

            $result=$connect->query($query);

            echo "<ol>";
            while($row=$result->fetch_assoc()){
                $gatunek=$row['gatunek'];
                $rodzaj=$row['rodzaj'];

                echo "<li>$gatunek -> $rodzaj</li>";


            }
            echo "</ol>";


?>
            </div>
            <div class="glowny" id="srodkowy">
 <?php
    
            
            if(isset($_POST['wybor'])){
                $wybor = $_POST['wybor'];

                $query="SELECT id, gatunek, wystepowanie from zwierzeta where Odzywianie_id = $wybor";
                
                $nazwa="";
    
                switch($wybor){
                    case 1:
                        $nazwa="Drapieżniki";
                    break;
                    case 2:
                        $nazwa="Roślinożerne";
                    break;
                    case 3:
                        $nazwa="Padlinożerne";
                    break;
                    case 4:
                        $nazwa="Wszystkożerne";
                    break;
                }
    
                $result=$connect->query($query);
                echo "<h3>$nazwa</h3>";
                while($row=$result->fetch_assoc()){
                    $id=$row['id'];
                    $gatunek=$row['gatunek'];
                    $wystepowanie=$row['wystepowanie'];
                    echo "$id.$gatunek, $wystepowanie <br>";
                }
                
    
    
            }
           
            mysqli_close($connect);

?>
                
            </div>
            <div class="glowny" id="prawy">
                <img src="drapieznik.jpg" alt="Wilki"/>
                
            </div>
        </section>
    </main>

    <div style="clear:both"></div>

    <footer>
        <a href="pl.wikipedia.org" target="_blank">Poczytaj o zwierzątach na Wikipedii</a>
        <span>Autor strony: Mateusz Szalast</span>

    </footer>
    
</body>
</html>