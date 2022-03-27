<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
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
	<body style = "background-color : #fdffef;">
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
			<p style = "font-family : 'Freestyle Script'; font-size:7vw;color : gray;text-decoration-line: none;" href = "main.html">Hakkımızda</p>
			</font>
			<div class = "hakkinda">
				<div class = "row">
					<p style="font-size:20px">İçinde bulunduğumuz dönemde kendi projelerini planlayıp maddi imkansızlıklardan ötürü hayata geçiremeyen ve sesini duyuramayan  onlarca belki yüzlerce genç yeteneğimiz projelerini gerçekleştirememenin sıkıntısını yaşamaktadır. Her ne kadar bu projelere finansal yardım sağlamak isteyen destekçiler olsa da bu projeleri bulmakta zorluk çekebiliyorlar. Bu proje sayesinde bu iki kesimin birbirilerine ulaşabilecekleri dijital bir ortam oluşturuluyor. Bu gerçekleşebilecek projeler sayesinde daha çok startup oluşacak ve ülkemizin kalkınmasında olumlu bir etki sağlayabilecektir.</p>
				</div>
			</div>
		</div>
		
	</body>
</html>


