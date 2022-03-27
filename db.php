<?php
class database{
    function add_user($name, $surname, $mail, $pass, $city, $school){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bi_fikrim_var";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql = "INSERT INTO user(name, surname, mail, password, city, school) VALUES(?, ?, ?, ?, ?, ?)";
          
        $query = $conn->prepare($sql);
        $insert = $query->execute(array($name, $surname, $mail, $pass, $city, $school));
        if ( $insert ){
            $last_id = $conn->lastInsertId();    
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Başarılı! </strong> Kayıt başarılı!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    function add_project($project_name, $description, $goal_money){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bi_fikrim_var";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql = "INSERT INTO project(project_name, description, goal_money, collected_money, user_id) VALUES(?, ?, ?, ?, ?)";
          
        $query = $conn->prepare($sql);
        $insert = $query->execute(array($project_name, $description, $goal_money, 0, $_SESSION['id']));
        if ( $insert ){
            $last_id = $conn->lastInsertId();
            
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Başarılı! </strong> Kayıt başarılı!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    function delete_user($id){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bi_fikrim_var";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql = "DELETE FROM user WHERE id=?";
          
        $query = $conn->prepare($sql);
        $delete = $query->execute(array($id));
        if ( $delete ){
            $last_id = $conn->lastInsertId();    
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Uyarı! </strong> Silme başarılı!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    function delete_project($id){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bi_fikrim_var";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql = "DELETE FROM project WHERE id=?";
          
        $query = $conn->prepare($sql);
        $delete = $query->execute(array($id));
        if ( $delete ){
            $last_id = $conn->lastInsertId();
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Uyarı! </strong> Silme başarılı!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    function update_user($name, $surname, $mail, $pass, $city, $school, $wallet, $id ){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bi_fikrim_var";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql = "UPDATE user SET name = ?, surname= ?, mail= ?, password= ?, city= ?, school = ?, wallet=? WHERE id = ?";
          
        $query = $conn->prepare($sql);
        $update = $query->execute(array($name, $surname, $mail, $pass, $city, $school, $wallet, $id));
        if ( $update ){
            $last_id = $conn->lastInsertId();
            
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Başarılı! </strong> Güncelleme başarılı!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    function update_project($project_name, $description, $goal_money, $collected_money, $user_id, $id){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bi_fikrim_var";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $sql = "UPDATE project SET project_name = ?, description= ?, goal_money= ?, collected_money= ?, user_id= ? WHERE id = ?";
          
        $query = $conn->prepare($sql);
        $update = $query->execute(array($project_name, $description, $goal_money, $collected_money, $user_id, $id));
        if ( $update ){
            $last_id = $conn->lastInsertId();
            
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Başarılı! </strong> Güncelleme başarılı!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    function login_control($mail, $pass){
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bi_fikrim_var";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $query = "select * from `user` where `mail`=:mail and `password`=:password";
        $stmt = $conn->prepare($query);
        $stmt->bindParam('mail', $mail, PDO::PARAM_STR);
        $stmt->bindValue('password', $pass, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($count > 0) {
            $_SESSION['id']=$row['id'];
            $_SESSION['login'] = true;
            $_SESSION['mail'] = $mail;
            $_SESSION['pass'] = $pass;
            $_SESSION['wallet']=$row['wallet'];
        }
        else {
            
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Uyarı! </strong> Kullanıcı adı veya parola yanlış!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            
        }
    }
}

?>