<!DOCTYPE HTML><html lang="pl"><head><meta charset="utf-8" /><title>Twój wskaźnik BMI</title><link rel="stylesheet" href="style.css"></head><body><div id="container"><header><div id="baner"><h2>Oblicz wskaźnik BMI</h2></div><div id="logo"><img alt="Liczymy BMI" src="wzor.png"/></div></header><main><div style="clear:both"></div><section><div id="lewy"><img alt="zrzuć kalorie!" src="rys1.png"/></div><div id="prawy"><h1>Podaj dane</h1><form action="waga.php" method="POST">Waga: <input type="number" name="weight"/>Wzrost: <input type="number" name="height"/><p><input type="submit" value="Licz BMI i zapisz wynik"/></p></form><p>
<?php
		if(isset($_REQUEST['weight']) && isset($_REQUEST['height']) && $_REQUEST['height'] !="" && $_REQUEST['weight'] !=""){
			
			$weight = $_POST['weight'];
			$height = $_POST['height'];

			$bmi = $weight/($height*$height)*10000;

			$bmi_id;
			
			if($bmi<19)
			{$bmi_id=1;}
			if($bmi<26)
			{$bmi_id=2;}
			if($bmi<31)
			{$bmi_id=3;}
			if($bmi>31)
			{$bmi_id=4;}
			
			$data = date('Y-m-d');
			
			echo "Twoja waga: $weight Twój wzrost: $height <br></br> BMI wynosi: $bmi";

			$conn = mysqli_connect("localhost","root","","egzamin_bmi");

			$conn -> query("INSERT INTO wynik (bmi_id, data_pomiaru, wynik) VALUES ($bmi_id, $data, $bmi)");
			
			

		}

?>
				</p>
			</div>
		</section>
			<div style="clear:both"></div>
		<section>
			<div id="glowny">
				<table>
					<tr><td>Lp.</td><td>Interpretacja</td><td>zaczyan się od...</td></tr>
<?php
			$conn = mysqli_connect("localhost","root","","egzamin_bmi");
			$result=$conn -> query("SELECT id, informacja, wart_min	from bmi");

			while($row = $result->fetch_assoc()) {
				echo "<tr><td>".$row["id"]."</td><td>".$row["informacja"]."</td><td>".$row["wart_min"]."</td></tr>";
			  }

			  mysqli_close($conn);
?>

				</table>
			</div>
		</section>
		

		</main>
		

			
<footer>
		<div id="footer">Autor:Mateusz Szalast</div>
	</footer>

		














	</div>

</body>

</html>