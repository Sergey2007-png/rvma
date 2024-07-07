<?php  
// Включаем файлы PHPMailer  
require 'phpmailer/src/PHPMailer.php';  
require 'phpmailer/src/Exception.php';  
require 'phpmailer/src/SMTP.php';  
  
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;  
  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    if (isset($_POST['workType']) && isset($_POST['checkbox']) && isset($_FILES['file'])) {  
        $name = $_POST['name'];  
        $email = $_POST['email'];  
        $message = $_POST['message'];  
          
          
        $mail = new PHPMailer(true);  
          
  
        try {  
            // Настройки сервера  
            $mail->isSMTP();  
            $mail->Host = 'smtp.gmail.com';  // Укажите SMTP-сервер  
            $mail->SMTPAuth = true;  
            $mail->Username = 'samsungkh0901@gmail.com';  // Ваш email  
            $mail->Password = 'fgyl hpoc xijr unvv';  // Ваш пароль  
            $mail->SMTPSecure = 'ssl';  
            $mail->Port = 465;  
  
            // Включаем отладочную информацию (для разработки)  
            // Получатель  
            $mail->setFrom($email,$name);  
            $mail->addAddress('samsungkh0901@gmail.com','Jopa');  // Получатель  
  
            // Вложение  
            $uploadFile = $_FILES['file']['tmp_name'];  
            $uploadFileName = $_FILES['file']['name'];  
  
            // Проверяем, существует ли временный файл  
            if (!file_exists($uploadFile)) {  
                throw new Exception('Временный файл не существует: ' . $uploadFile);  
            }  
  
            $mail->addAttachment($uploadFile, $uploadFileName);  
  
            // Содержание письма  
            $mail->isHTML(true);  
            $mail->Subject = 'New Form Submission';  
            $mail->Body    = '<p>Work Type: ' . $_POST['workType'] . '</p>' 
                           . '<p>Name: ' . htmlspecialchars($name) . '</p>' 
                           . '<p>Email: ' . htmlspecialchars($email) . '</p>' 
                           . '<p>Message: ' . nl2br(htmlspecialchars($message)) . '</p>';  
  
            $mail->send();  
            echo 'Письмо успешно отправлено.';  
        } catch (Exception $e) {  
            echo "Письмо не может быть отправлено. Ошибка: {$mail->ErrorInfo}";  
        }  
    } else {  
        echo 'Пожалуйста, заполните все поля формы.';  
    }  
} else {  
    echo 'Неверный метод запроса.';  
}  
?>