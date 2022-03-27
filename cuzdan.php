<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
if($_GET)
{
include("db.php");
$veritabani = new database();
$wallet=$_GET['wallet'];
$wallet_db=$_SESSION['wallet'];
$new_wallet=$_SESSION['wallet']+$wallet;
$_SESSION['wallet']=$new_wallet;
            $servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "bi_fikrim_var";
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$sql = "UPDATE user SET wallet = ? WHERE id = ?";
		 
		$query = $conn->prepare($sql);
		$update = $query->execute(array($_SESSION['wallet'], $_SESSION['id']));
		if ( $update ){
			$last_id = $conn->lastInsertId();
			
		}
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
            <font>
            <p style = "font-family : 'Freestyle Script'; font-size:7vw;color : gray;text-decoration-line: none;" href = "main.html">Cüzdan</p>
            </font>
            <div class = "cuzdan">
                <div class = "row">
                    <p align=center style="font-size:30px">Bakiye :<?php echo $_SESSION['wallet'];?></p>
                    <form action="" method="GET">
                    <br><p><input type="text" name="wallet"style="width:170px" style="font-size:20px"></input></p>
                    
                    <br><p><button type="submit" style="width:170px" style="font-size:20px">Bakiye Ekle</button></p><hr>
                </form>
                    <form action="havuz_para.php" method="GET">
                    <br><p><input type="text" name="wallet2"style="width:170px" style="font-size:20px"></input></p>
                    <br><p><button type="submit" style="width:170px" style="font-size:20px">Havuza Para Aktar</button></p>
                </form>
                </div>
            </div>
        </div>
    </body>
</html>