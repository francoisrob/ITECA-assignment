<?php
require_once '../vendor/autoload.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $db = new Database();
    $db->validate($email, $password);
    $db->closedb();
}

class Database
{
    public $host = "localhost";
    public $username = "root";
    public $password = "";
    public $database = "gym";
    public $conn;

    function connectdb()
    {
        $this->password = $_ENV["MYSQLPASS"];
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