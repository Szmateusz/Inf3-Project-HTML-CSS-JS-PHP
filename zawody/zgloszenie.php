<?php
$lowisko = $_POST["lowisko"];
$data = $_POST["data"];
$sedzia = $_POST["sedzia"];

        $connect = mysqli_connect("localhost","root","","zawody");
        
        $query = "INSERT INTO zawody_wedkarskie VALUES (NULL,0,$lowisko,\"$data\",\"$sedzia\")";

        $result=$connect->query($query);

        mysqli_close($connect);

        header("Location: zawody.php");
?>