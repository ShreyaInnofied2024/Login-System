<?php
session_start();
include('database.php');
class User
{
    private $db;
    public function __construct(
        public $user_name,
        public $password
    ){
        $this->db = new Database();
    }

    public function register()
    {
        $query = "INSERT INTO user1(username,password) VALUES (:user_name, :password)";
        $params = [':user_name' => $this->user_name,':password' => password_hash($this->password, PASSWORD_BCRYPT)];
        $this->db->executeQuery($query,$params);
        echo "New Record Added <br>";
    }

    public function login()
    {
        $query = "SELECT username, password FROM user1 WHERE username = :user_name";
        $params = [':user_name' => $this->user_name];
        $stmt= $this->db->executeQuery($query,$params);
        $user=$stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $password1= $user['password'];
            $res=password_verify($this->password,$password1);
            if($res==true){
                $_SESSION['user_name']=$this->user_name;
                echo "Successful Login";
            }else{
                echo "Not authenticated";
            }
        }
            else {
                echo "User not found.";
            }
    }

    public function logout(){
        session_destroy();
        echo "Successfully logged out";
    }

}