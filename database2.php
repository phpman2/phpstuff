<!DOCTYPE html>
<html>

	<body>
<form method="POST">

<input type="text" name="Title">Title<br>
<input type="text" name="Author">Author<br>
<input type="text" name="Genre">Genre<br>
<input type="checkbox" name="Hardcopy">Hardcopy?<br>
<button method="POST">update</button>

</form>


	</body>

<?php

$servername = "localhost";
$username = "root";
$password = "";

if($_POST){

    $conn = new PDO("mysql:host=$servername;dbname=practicebase1", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $STATEMENT = $conn->PREPARE("INSERT INTO book1 (Title, Author, Genre, Hardcopy) VALUES (?, ?, ?, ?)");

    $STATEMENT->bindValue(1,$_POST["Title"]); 
    $STATEMENT->bindValue(2,$_POST["Author"]); 
    $STATEMENT->bindValue(3,$_POST["Genre"]); 
    $STATEMENT->bindValue(4,isset($_POST["Hardcopy"])?0:1); 
    $STATEMENT->execute();
    }

?>


</html>