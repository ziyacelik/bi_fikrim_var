<?php
session_start();
if($_GET){
	$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "bi_fikrim_var";
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $donate=$_GET['wallet2'];
    if($_SESSION['wallet']-$donate>=0){
      $wallet=$_SESSION['wallet']-$donate;
      $_SESSION['wallet']=$wallet;
      $sql = "UPDATE user SET wallet = ? WHERE id = ?";
       
      $query = $conn->prepare($sql);
      $update = $query->execute(array($_SESSION['wallet'], $_SESSION['id']));
      if ( $update ){
        $last_id = $conn->lastInsertId();
        
      }	
    
    
    

    $query = "select * from havuz_parasi";
  
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $current = $row['para'];

    
    $sql = "UPDATE havuz_parasi SET para = ? ";
		
		$query = $conn->prepare($sql);
		$update = $query->execute(array($current + $donate));
		if ( $update ){
			$last_id = $conn->lastInsertId();
    }
    
		}
		header("Location: projects.php");
	}	
?>