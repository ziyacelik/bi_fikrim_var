<?php
	session_start();
	error_reporting(E_ERROR | E_PARSE);
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bi_fikrim_var";
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$query = "update project set like_count = ? where `id`=?";
	$stmt = $conn->prepare($query);
	$stmt->execute(array($_GET['like'] + 1 , $_GET['id']));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	header("Location:project.php?id=".$_GET['id']);
?>