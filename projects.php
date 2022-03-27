<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "bi_fikrim_var";
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$query = "select * from havuz_parasi";

$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$current = $row['para'];
if($_POST)
{
  include("db.php");
$veritabani = new database();
$name=$_POST['project_name'];
$description=$_POST['description'];
$goal_money=$_POST['goal_money'];
$veritabani->add_project($name,$description,$goal_money);
}
if($_GET)
{
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
            <p style = "font-family : 'Freestyle Script'; font-size:7vw;color : gray;text-decoration-line: none;" href = "main.html">Projeler</p>
            </font>
            Projelere toplanan genel havuz parası;
            <br>
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: <?php echo $current/10000;?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"><?php echo $current;?>/1000000</div>
            </div>
            <br>
            <div class = "projects">
                <div class = "row">
                    <div class="col-6 card">
                        <div class="card-body">
                        <?php if($_SESSION["login"] == true){ ?>
                          <h5 class="card-title">Proje Ekle</h5>
                          <form action="" method="POST">
                                <table>
                                    <tr>
                                        <td><label for="project_name">Proje Adı :</label></td>
                                        <td><input type="text" id="project_name" name="project_name"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="description">Açıklama :</label></td>
                                        <td><textarea name="description" width: 200px; height: 100px;></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="goal_money">Hedeflenen Para:</label></td>
                                        <td><input type="text" id="goal_money" name="goal_money">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td><td><button type="submit">Gönder</button></td>
                                    </tr>
                                </table>
                            </form>
                            <hr>
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "bi_fikrim_var";
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $query = "select * from `project` where `user_id`=:user_id";
                            $stmt = $conn->prepare($query);
                            $stmt->bindParam('user_id', $_SESSION['id'], PDO::PARAM_STR);
                            $stmt->execute();
                            $count = $stmt->rowCount();
                            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            if($count > 0) {
                                foreach($rows as $row){
                                    if($row['user_id'] == $_SESSION['id']){
                                    ?>
                                    <div class="col-12 card">
                                      <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['project_name'] ?></h5>
                                        <p class="card-text"><?php echo $row['description'] ?></p>
                                        <p class="card-text"><small class="text-muted"><?php echo $row['collected_money'] ?>  / <?php echo $row['goal_money'] ?></small></p>
                                      </div>
                                    </div>
                                    <?php
                                }
                                }
                            }
                            else {
                                echo "herhangi bir projeniz bulunmamaktadır.";
                            }
                            }
                            else{ ?>
                            Proje Göndermek İçin <a href="giris.php">Giriş Yapınız!</a><?php } ?>
                        </div>
                      </div>
                    <div class="col-6 card">
                      <div class="card-body">
                        <h5 class="card-title">Son Projeler</h5>
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "bi_fikrim_var";
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $query = "select * from `project`";
                            $stmt = $conn->prepare($query);
                            $stmt->execute();
                            $count = $stmt->rowCount();
                            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                            if($count > 0) {
                                foreach($rows as $row){
                                    ?>
                                    <div class="col-12 card">
                                      <div class="card-body">
                                        <a href = "project.php?id=<?php echo $row['id']; ?>"><h5 class="card-title"><?php echo $row['project_name'] ?></h5></a>
                                        <p class="card-text"><?php echo $row['description'] ?></p>
                                        <p class="card-text"><small class="text-muted"><?php echo $row['collected_money'] ?>  / <?php echo $row['goal_money'] ?></small></p>
                                      </div>
                                    </div>
                                    <?php
                                }
                            }
                            else {
                                echo "herhangi bir proje bulunmamaktadır.";
                            }?>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>