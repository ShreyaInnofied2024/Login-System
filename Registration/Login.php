<?php
include('database.php');
session_start();
class User
{
    public $user_name;
    public $password;

    public function __construct($user_name, $password)
    {
        $this->user_name = $user_name;
        $this->password=$password;
    }

    public function login()
    {
        $query = "SELECT username, password FROM user1 WHERE username = :username";
        $stmt=connection($query);
        $stmt->bindParam(':username', $this->user_name);
        execute($stmt);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
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
                echo "Product not found.";
            }
    }

    public function logout(){
        session_destroy();
        echo "Successfully logged out";
    }
}



$person = new User($_POST['username'], $_POST['password']);
//$person->login();
//$person->logout();
