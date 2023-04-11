<?php
require_once '../vendor/autoload.php';
use Dotenv\Dotenv;

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $age = $_POST['age'];
//     $address = $_POST['address'];
//     $gender = $_POST['gender'];
//     $favorite_character = $_POST['favorite_character'];
//     $db = new Database($name, $email, $age, $address, $gender, $favorite_character);

// }

class Database
{
    public $host = "localhost";
    public $username = "root";
    public $password = "";
    public $name;
    public $email;
    public $age;
    public $address;
    public $gender;
    public $favorite_character;
    public $database = "comicon";
    public $conn;

    public function __construct($name, $email, $age, $address, $gender, $favorite_character)
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../");
        $dotenv->load();
        $this->password = $_ENV["MYSQLPASS"];
        $this->name = $name;
        $this->email = $email;
        $this->age = $age;
        $this->address = $address;
        $this->gender = $gender;
        $this->favorite_character = $favorite_character;
        $this->connectdb();
    }

    public function __destruct()
    {
        $this->closedb();
    }

    public function adduser()
    {
        $name = $this->name;
        $email = $this->email;
        $age = $this->age;
        $address = $this->address;
        $gender = $this->gender;
        $favorite_character = $this->favorite_character;
        $SQL = "INSERT INTO members (name, email, age, address, gender, favourite_character) 
        VALUES ('$name', '$email', '$age', '$address', '$gender', '$favorite_character')";
        $result = $this->conn->query($SQL);
        if ($result) {
            echo "User added successfully";
        } else {
            echo "User not added";
        }
    }

    function connectdb()
    {
        $mysqli = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($mysqli->connect_errno) {
            return False;
        } else {
            $this->conn = $mysqli;
            return True;
        }
    }

    function closedb()
    {
        mysqli_close($this->conn);
    }
}
?>