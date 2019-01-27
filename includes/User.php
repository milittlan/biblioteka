<?php

require_once('connection.php');

class User {

    private $conn;

    public function __construct() {
        $database = new Connection();
        $db = $database->openConnection();
        $this->conn = $db;
    }


    public function runQuery($sql) {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    // funkcija za registraciju korisnika
    public function register($uname,$usurname,$umail,$upass) {
        try {
            $new_password = password_hash($upass, PASSWORD_DEFAULT);

            $stmt = $this->conn->prepare("INSERT INTO users(user_name,surname,email,password) 
		                                               VALUES(:uname, :usurname, :umail, :upass)");

            $stmt->bindparam(":uname", $uname);
            $stmt->bindparam(":usurname", $usurname);
            $stmt->bindparam(":umail", $umail);
            $stmt->bindparam(":upass", $new_password);

            $stmt->execute();

            return $stmt;
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    //Funkcija za logovnjae korisnika
    public function doLogin($uname,$umail,$upass) {
        try {
            $stmt = $this->conn->prepare("SELECT id, user_name, surname email, password FROM users WHERE user_name=:uname OR email=:umail ");
            $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
            $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() == 1)
            {
                if(password_verify($upass, $userRow['password'])) {
                    $_SESSION['user_session'] = $userRow['id'];
                    return true;
                }
                else {
                    return false;
                }
            }
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    // funkcija za redirekciju
    public function redirect($url) {
        header("Location: $url");
    }


    public function is_loggedin() {
        if(isset($_SESSION['user_session'])) {
            return true;
        }
    }

    public function doLogout() {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }

    public function get_users() {

        $stmt = $this->conn->prepare("SELECT * FROM `users` ");

        try{
            $results = array();
            $stmt->execute();
            while($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $results[] = $rows;
            }
        }catch(PDOException $e){
            die($e->getMessage());
        }

        return $results;

    }
}

?>