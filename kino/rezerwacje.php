<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> KINO „Za rogiem”</title>

    <link rel="stylesheet" href="style.css"/>
</head>
<body>

    <header>
        <img src="baner.jpg" alt="baner"/>
    </header>

    <main>
        <div class="main" id="lewy">
            <ol>
                <li><a href="index.html">Strona główna</a></li>
            </ol>

            <hr/>

            <form action="rezerwacje.php" method="POST">
                <p>Data i godzina seansu</p>
                <br>
                <input type="date" name="dzien"/>
                <input type="time" name="czas"/>
                <input type="submit" value="POKAŻ"/>


            </form>


        </div>

        <div class="main" id="prawy">
<?php
        if(isset($_POST['dzien'])&&isset($_POST['czas'])){

            $data=$_POST['dzien'];
            $czas=$_POST['czas'];
    
    
            $connect = mysqli_connect("localhost","root","","kino");
    
         //   $query="SELECT Rzad, Miejsce from rezerwacje where Data=\"$data\" and Godzina=\"$czas\"";
            $query="SELECT Rzad, Miejsce from rezerwacje where Data=\"2022-08-08\" and Godzina=\"15:00:00\"";

    
            $result=$connect->query($query);

            

            echo "<span>EKRAN</span>";

            $r=15;
            $c=20;
            

            for($x=0;$x<=$r;$x++){

                for($y=0;$y<=$c;$y++){

                    $array[$x][$y]=0;
                }
            }
            
            
            
            while($row=$result->fetch_array()){

                 $array[$row[0]][$row[1]]=1;
                

            }

            
                
            echo "<table>";

                for($i=0;$i<=$r;$i++){
                    
                    
                    echo "<tr>";
                    echo "<th>$i </th>";
                    
                    for($j=0;$j<=$c;$j++){
                        
                         if($array[$i][$j]==1){
                            echo "<td class=\"zaj\">$j</td>";
                        }else{
                            echo "<td class=\"wol\">$j</td>";
                        }
                        
                        
                    }

                    echo "</tr>";
                }

                echo "</table>";
    
            
    
    
    
            mysqli_close($connect);
    
        }else{

            echo "<span>Podaj poprawną datę i godzinę seansu!</span>";
            
        }
       
?>
        </div>
    </main>

    <footer>
        <h5>Egzamin INF.03 - AUTOR:Mateusz Szalast</h5>
    </footer>
    
</body>
</html>