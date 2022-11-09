<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>

    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <header>

        <h1>Forum miłośników psów</h1>

    </header>

    <main>

        <div class="main" id="lewy">

            <img src="Avatar.jpg" alt="Użytkownik forum"/>

<?php

        $connect = mysqli_connect("localhost","root","","psy");

        $query="SELECT konta.nick, konta.postow, pytania.pytanie from konta inner join pytania on konta.id=pytania.konta_id  where pytania.id = 1";

        $result=$connect->query($query);

        while($row=$result->fetch_assoc()){
            $nick=$row["nick"];
            $postow=$row["postow"];
            $pytanie=$row["pytanie"];
            


            echo "<h4>Uzytkownik: $nick</h4> <p>$postow postów na forum</p> <p>$pytanie</p>";
        }

        




?>
        <video height="auto" width="100%" controls>

            <source src="video.mp4" type="video/mp4">
        </video>
           

        </div>

        <div class="main" id="prawy">

            <form action="index.php" method="POST">

                <textarea name="pole" rows="4" cols="50"></textarea>
                <br>
                <input type="submit" value="Dodaj odpowiedź"/>

            </form>
<?php
    if(isset($_POST['pole'])){

         $tekst=$_POST['pole'];

        $query="Insert Into odpowiedzi values (NULL,1,5,\"$tekst\")";

        $result=$connect->query($query);

    }
       




?>

            <h2>Odpowiedzi na pytanie</h2>

            <ol>
<?php

        $query="SELECT odpowiedzi.id, odpowiedzi.odpowiedz, konta.nick from odpowiedzi inner join konta on odpowiedzi.konta_id = konta.id where konta.id = 5";

        $result=$connect->query($query);


        while($row=$result->fetch_assoc()){
            $odpowiedz=$row["odpowiedz"];
            $nick=$row["nick"];
            
            


            echo "<li>$odpowiedz <em>$nick</em><hr></li>";
        }

        



        mysqli_close($connect);
?>
            </ol>

        </div>

    </main>
<div style="clear:both"></div>
    <footer>

        <span>Stronę wykonał: Mateusz Szalast</span>

        <a href="http://mojestrony.pl/" target="_blank">Zobacz nasze realizacje</a>

    </footer>
    
</body>
</html>