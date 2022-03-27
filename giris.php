<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
//yeni kayıt yapıldıktan sonra direk giriş yapılamıyor
if ($_GET) {
include("db.php");
$veritabani = new database();
$name=$_GET['name'];
$surname=$_GET['surname'];
$mail=$_GET['mail'];
$password=$_GET['password'];
$city=$_GET['city'];
$school=" ";
$veritabani->add_user($name,$surname,$mail,$password,$city,$school);
}
if($_POST)
{
include("db.php");
$veritabani = new database();
$mail=$_POST['mail'];
$password=$_POST['password'];
$veritabani->login_control($mail,$password);
header('Location: projects.php');
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
            <p style = "font-family : 'Freestyle Script'; font-size:7vw;color : gray;text-decoration-line: none;" href = "main.html">Giris Yap/Kayıt Ol</p>
            </font>
			<?php if($_SESSION["login"] == false){ ?>
            <div class = "giris">
                <div class = "row">
                    <div class="col-6 card">
                        <div class="card-body">
                          <h5 class="card-title">Giriş yap</h5>
                          <form action="" method="POST">
                                <table>
                                    <tr>
                                        <td><label for="mail">E-Posta:</label></td>
                                        <td><input type="text" id="mail" name="mail"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="password">Şifre:</label></td>
                                        <td><input type="password" id="password" name="password">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td><td><button type="submit">Gönder</button></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                      </div>
                      <div class="col-6 card">
                        <div class="card-body">
                          <h5 class="card-title">Kayıt Ol</h5>
                          <form action="" method="GET">
                            <table>
                                <tr>
                                    <td><label for="name">İsim:</label></td>
                                    <td><input type="text" id="name" name="name"></td>
                                </tr>
                                <tr>
                                    <td><label for="surname">Soyisim:</label></td>
                                    <td><input type="text" id="surname" name="surname"></td>
                                </tr>
                                <tr>
                                    <td><label for="mail">E-Posta:</label></td>
                                    <td><input type="text" id="mail" name="mail"></td>
                                </tr>
                                <tr>
                                    <td><label for="password">Şifre:</label></td>
                                    <td><input type="password" id="password" name="password"></td>
                                </tr>
                                <tr>
                                    <td></td><td><select name="city">
									<option value="1">Adana</option>
									<option value="2">Adıyaman</option>
									<option value="3">Afyonkarahisar</option>
									<option value="4">Ağrı</option>
									<option value="5">Amasya</option>
									<option value="6">Ankara</option>
									<option value="7">Antalya</option>
									<option value="8">Artvin</option>
									<option value="9">Aydın</option>
									<option value="10">Balıkesir</option>
									<option value="11">Bilecik</option>
									<option value="12">Bingöl</option>
									<option value="13">Bitlis</option>
									<option value="14">Bolu</option>
									<option value="15">Burdur</option>
									<option value="16">Bursa</option>
									<option value="17">Çanakkale</option>
									<option value="18">Çankırı</option>
									<option value="19">Çorum</option>
									<option value="20">Denizli</option>
									<option value="21">Diyarbakır</option>
									<option value="22">Edirne</option>
									<option value="23">Elazığ</option>
									<option value="24">Erzincan</option>
									<option value="25">Erzurum</option>
									<option value="26">Eskişehir</option>
									<option value="27">Gaziantep</option>
									<option value="28">Giresun</option>
									<option value="29">Gümüşhane</option>
									<option value="30">Hakkâri</option>
									<option value="31">Hatay</option>
									<option value="32">Isparta</option>
									<option value="33">Mersin</option>
									<option value="34">İstanbul</option>
									<option value="35">İzmir</option>
									<option value="36">Kars</option>
									<option value="37">Kastamonu</option>
									<option value="38">Kayseri</option>
									<option value="39">Kırklareli</option>
									<option value="40">Kırşehir</option>
									<option value="41">Kocaeli</option>
									<option value="42">Konya</option>
									<option value="43">Kütahya</option>
									<option value="44">Malatya</option>
									<option value="45">Manisa</option>
									<option value="46">Kahramanmaraş</option>
									<option value="47">Mardin</option>
									<option value="48">Muğla</option>
									<option value="49">Muş</option>
									<option value="50">Nevşehir</option>
									<option value="51">Niğde</option>
									<option value="52">Ordu</option>
									<option value="53">Rize</option>
									<option value="54">Sakarya</option>
									<option value="55">Samsun</option>
									<option value="56">Siirt</option>
									<option value="57">Sinop</option>
									<option value="58">Sivas</option>
									<option value="59">Tekirdağ</option>
									<option value="60">Tokat</option>
									<option value="61">Trabzon</option>
									<option value="62">Tunceli</option>
									<option value="63">Şanlıurfa</option>
									<option value="64">Uşak</option>
									<option value="65">Van</option>
									<option value="66">Yozgat</option>
									<option value="67">Zonguldak</option>
									<option value="68">Aksaray</option>
									<option value="69">Bayburt</option>
									<option value="70">Karaman</option>
									<option value="71">Kırıkkale</option>
									<option value="72">Batman</option>
									<option value="73">Şırnak</option>
									<option value="74">Bartın</option>
									<option value="75">Ardahan</option>
									<option value="76">Iğdır</option>
									<option value="77">Yalova</option>
									<option value="78">Karabük</option>
									<option value="79">Kilis</option>
									<option value="80">Osmaniye</option>
									<option value="81">Düzce</option>
								</select></td>
                                </tr>
                                <tr>
                                    <td></td><td><button type="submit">Gönder</button></td>
                                </tr>
                            </table>
                        </form>
                        </div>
                      </div>
                </div>
            </div>
			
			<?php } ?>
        </div>
    </body>
</html>