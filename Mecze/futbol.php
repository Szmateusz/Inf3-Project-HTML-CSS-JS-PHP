	<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Rozgrywki Futbolowe</title>
	
	<link rel="stylesheet" href="style.css">
	
	
</head>

<body class="customScroll">

<div class="container">

<main>

<div id="main">
	<div id="baner">
      <h2>Światowe Rozgrywki Piłkarskie</h2>
	  <img alt="boisko" src="obraz1.jpg">
	</div>
	
	<div class="customScroll" id="mecze">
<?php
   $conn = mysqli_connect("localhost","root","","egzamin");

   if ($conn->connect_error)
	echo "Nie udało sie nawiazać połączenia z bazą: " . $conn->connect_error;
	
   

   $result = $conn -> query("SELECT zespol1, zespol2, wynik , data_rozgrywki FROM rozgrywka");

   echo "<div class=\"line\"></div>";

   while($row = $result->fetch_assoc()) {
	$zes1=$row["zespol1"];
	$zes2=$row["zespol2"];
	$wyn=$row["wynik"];
	$data=$row["data_rozgrywki"];

    echo "<div class=\"block\"<h3> $zes1 - $zes2 </h3><h4> $wyn </h4><p>w dniu: $data </p></div>";
   }

  	echo "<div class=\"line\"></div>";


  

?>

	</div>
</div>





	<div id="glowny">
	<div>
	  <h2>Reprezentacja Polski</h2>
	</div>


  <div class="pola" id="pl">
  <p>Podaj pozycję zawodników (1-bramkarze, 2-obrońcy, 3-pomocnicy, 4-napastnicy):
		  
		  <form action="futbol.php" method="Post">
			<input type="number" name="pole">
			<input type="submit" value="Sprawdź">
		  </form>
  
	  <ul>
<?php

if(isset($_REQUEST['pole']) && $_REQUEST['pole']!=""){
	$id = $_REQUEST['pole'];
	$result = $conn -> query("SELECT imie, nazwisko FROM zawodnik Where pozycja_id = $id");

while($row = $result->fetch_assoc()) {
 $i=$row["imie"];
 $n=$row["nazwisko"];
 echo "<li>$i $n </li>";
}
}



mysqli_close($conn);


?>
	  </ul>
  </div>
  
	  <div class="pola" id="pr">
		<div id="pr2">
		<image id="image" alt="ikona" src="zad1.png">
		<p>Autor:Mateusz Szalast
		</div>
	  </div> 

 
</div>

	


</main>

</div>



</body>

</html>