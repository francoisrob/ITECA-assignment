<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
require '../vendor/autoload.php';

$mail = new Mail();
$mail->sendregister();
$mail->sendsurvey();

header("Location: ../index.php");

class Mail
{
    public $mail;
    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . "/../");
        $dotenv->load();
    }
    public function setmail()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $_ENV["EMAIL"];
        $this->mail->Password = $_ENV["APP_PASSWORD"];
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->mail->Port = 465;
    }

    public function sendregister()
    {
        $this->setmail();
        $mail = $this->mail;

        $mail->setFrom($_ENV["EMAIL"], 'Kimiko Entertainment');
        $mail->addAddress($_POST["email"], $_POST["name"]);

        $mail->isHTML(true);
        $mail->Subject = 'May the Kimiko be with you!';

        $mail_vars = array(
            'name' => $_POST["name"],
            'age' => $_POST["age"],
            'character' => $_POST["favorite_character"],
            'mail' => $_POST["email"]
        );
        $body = file_get_contents('template.php');
        foreach ($mail_vars as $key => $value) {
            $body = str_replace('{' . $key . '}', $value, $body);
        }
        $mail->Body = $body;
        $mail->send();
    }
    public function sendsurvey()
    {
        $this->setmail();
        $mail = $this->mail;

        $mail->setFrom($_ENV["EMAIL"], 'Kimiko Entertainment - Survey');
        $mail->addAddress($_POST["email"], $_POST["name"]);

        $mail->isHTML(true);
        $mail->Subject = 'Please take our survey!';

        $body = file_get_contents('survey.php');
        $mail->Body = $body;
        $mail->send();
    }
}
?>