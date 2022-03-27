<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "bi_fikrim_var";
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$query = "select * from project  where `id`=?";
  
	$stmt = $conn->prepare($query);
	$stmt->execute(array( $_GET['id']));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
  if($_GET){
    $donate=$_GET['donate'];
    if($_SESSION['wallet']-$donate>0){
      $wallet=$_SESSION['wallet']-$donate;
      $_SESSION['wallet']=$wallet;
      $sql = "UPDATE user SET wallet = ? WHERE id = ?";
       
      $query = $conn->prepare($sql);
      $update = $query->execute(array($_SESSION['wallet'], $_SESSION['id']));
      if ( $update ){
        $last_id = $conn->lastInsertId();
        
      }	
    
    
    

    $query = "select * from project  where `id`=?";
  
    $stmt = $conn->prepare($query);
    $stmt->execute(array( $_GET['id']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $collected = $row['collected_money'];

    
    $sql = "UPDATE project SET collected_money = ? WHERE id = ?";
		 
		$query = $conn->prepare($sql);
		$update = $query->execute(array($collected + $donate, $_GET['id']));
		if ( $update ){
			$last_id = $conn->lastInsertId();
    }
    
		}	
    else
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Uyarı! </strong> Para Yetersiz!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="./css/style.css" rel="stylesheet">
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <script src="./js/bootstrap.bundle.min.js"></script>
    </head>
    <body style = "background-color : #FDFFEF;">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
          <div class="container-fluid">
            <a class="navbar-brand" style = "font-family : 'Freestyle Script'; font-size:40px;" href="index.html">bi' fikrim var</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="index.html">Anasayfa</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="projects.php">Projeler</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="hakkinda.php">Hakkımızda</a>
                </li>
                <li class="nav-item">
                <?php if($_SESSION["login"] == false){ ?>
                    <a class="nav-link" href="giris.php">Giriş Yap/Kayıt Ol</a>
                <?php }else { ?>
                    <li class="nav-item">
                  <a class="nav-link" href="cuzdan.php">Cüzdan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="cikis.php">Çıkış Yap</a>
                </li>
                <?php } ?>
                  </li>
              </ul>
            </div>
          </div>
        </nav>
        <div class = "container" style = "text-align : center;">
			<h1><?php echo $row['project_name']; ?></h1>
			<hr>
			<p><?php echo $row['description']; ?></p><br>
      
      <p><input  type="text" id = "donate" name="donate"></p>
      
      <p> <button type="button" onclick="Yonlendir()" style="width:150px; height:35px" href="project.php?id=<?php echo $row['id']; ?>&donate= ">Destekle!</p></button>
      
			<p><a href = "like.php?id=<?php echo $row['id']; ?>&like=<?php echo $row['like_count']; ?>">Beğen</a> (<?php echo $row['like_count']; ?>)</p><br>
			<p><?php echo $row['collected_money']; ?>/<?php echo $row['goal_money']; ?></p>
        </div>

        <script>
        
        function Yonlendir(){
          window.location="project.php?id=<?php echo $row['id']; ?>&donate="+ document.getElementById("donate").value;
        }
        
        </script>
    </body>
</html>