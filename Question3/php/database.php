<?php
require_once '../vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $favorite_character = $_POST['favorite_character'];
    $db = new Database($name, $email, $age, $address, $gender, $favorite_character);

}

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
    public $database = "gym";
    public $conn;

    public function __construct($name, $email, $age, $address, $gender, $favorite_character)
    {
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
        $SQL = "INSERT INTO members (name, email, age, address, gender, favourite_character) VALUES ('John Doe', 'example@mail.om', '12', '7 main street', 'male', 'batman')";
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

    function validate($email, $password)
    {
        if ($this->connectdb()) {
            $sql = "SELECT * FROM members WHERE email = '$email' AND password = '$password'";
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc();
                $name = $data['first_name'];
                $surname = $data['last_name'];
                echo "<h1>Welcome $name $surname</h1>";
            } else {
                echo "Login Failed";
            }
        } else {
            echo "Connection Failed";
        }
    }


}
?>