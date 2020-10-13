<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
require_once '../db/db.php';
if(isset($_POST['order'])) {

    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    require_once "../PHPMailer/PHPMailer.php";
    require_once "../PHPMailer/SMTP.php";
    require_once "../PHPMailer/Exception.php";

    $connect->query("INSERT INTO `order` (username,phone,email) VALUES ('$username', '$phone', '$email')");
    $lastId = $connect ->query("SELECT MAX(id) FROM `order` WHERE email = '$email'")->fetch(PDO::FETCH_ASSOC);
    $lastId = $lastId['MAX(id)'];

    $message = "<h2>Здравствуйте, ваш заказ под номером $lastId принят </h2>";
    $message .= "<h3>Состав заказа: </h3>";
    foreach ($_SESSION['cart'] as $product){
        $message.="<div>{$product['rus_name']} в количестве {$product['quantity']} шт.</div>";
    }

    $message.="<p>Сумма заказа: {$_SESSION['totalPrice']} рублей</p> ";

    $subject = "Ваш заказ под номером $lastId принят ";
    $subjectToAdm = "$email совершил заказ под номером $lastId ";
    $messagеToAdm .= "<h3>Состав заказа: </h3>";
    foreach ($_SESSION['cart'] as $product){
        $messageToAdm.="<div>{$product['rus_name']} в количестве {$product['quantity']} шт.</div>";
    }
    $messageToAdm.="<p>Сумма заказа: {$_SESSION['totalPrice']} рублей</p> ";
    $messageToAdm.="<p>Телефон для связи: $phone </p> ";
    $messageToAdm.="<p>Почта для связи: $email </p> ";

    $mail = new PHPMailer();
    $mailAdm = new PHPMailer();
    // SMTP settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username="vartestbot@gmail.com";
    $mail->Password = "2bs8HK2d9!hxa";
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    $mailAdm->isSMTP();
    $mailAdm->Host = "smtp.gmail.com";
    $mailAdm->SMTPAuth = true;
    $mailAdm->Username="vartestbot@gmail.com";
    $mailAdm->Password = "2bs8HK2d9!hxa";
    $mailAdm->Port = 465;
    $mailAdm->SMTPSecure = "ssl";

    // EMAIL settings
    $mail -> isHTML(true);
    $mail -> setFrom($email,"ClrNomaly");
    $mail -> addAddress($email);
    $mail-> Subject = $subject;
    $mail->Body = $message;
    $mail->CharSet ="utf-8";

    $mailAdm -> isHTML(true);
    $mailAdm -> setFrom($email,"ClrNomalyAdm");
    $mailAdm -> addAddress('clrnomaly@gmail.com');
    $mailAdm-> Subject = $subjectToAdm;
    $mailAdm->Body = $messageToAdm;
    $mailAdm->CharSet ="utf-8";

    if ($mail->send() && $mailAdm->send())
        $response = "email is sent!";
    else
        $response= "something is wrong <br><br>". $mail->ErrorInfo;




    unset($_SESSION['totalPrice']);
    unset($_SESSION['totalQuantity']);
    unset($_SESSION['cart']);

    $_SESSION['order'] = $lastId;

//    $headers  = 'MIME-Version: 1.0' . "\r\n";
//    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
//    $to = 'test-g6ihttpe3@srv1.mail-tester.com';

//    mail($email,$subject,$message,$headers);
//    echo '<pre>';
//    var_dump($lastId);
//    echo '</pre>';
}
header("Location:{$_SERVER['HTTP_REFERER']}");