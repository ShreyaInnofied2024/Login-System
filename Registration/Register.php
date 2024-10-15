<?php
include('database.php');
class User
{
    public $user_name;
    public $password;

    public function __construct($user_name, $password)
    {
        $this->user_name = $user_name;
        $this->password=$password;
    }

    public function add_user()
    {
            $query = "INSERT INTO user1(username,password)
            VALUES (:username, :password)";
            $stmt=connection($query);
            $stmt->bindParam(':username', $this->user_name, PDO::PARAM_STR);
            $stmt->bindParam(':password', password_hash($this->password,PASSWORD_BCRYPT), PDO::PARAM_STR);
            execute($stmt);
            echo "New User added successfully <br>";
            }
    }

$person = new User($_POST['username'], $_POST['password']);
$person->add_user();
