<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:/xampp/PHPMailer/src/Exception.php';
require 'C:/xampp/PHPMailer/src/PHPMailer.php';
require 'C:/xampp/PHPMailer/src/SMTP.php';
require 'C:/xampp/phpMyAdmin/vendor/autoload.php';

function send_mail($email,$firstname,$lastname,$username,$address,$city,$state,$zip)
{
 
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
    
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = gethostbyname('smtp.gmail.com');  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'livestock.cville@gmail.com';                 // SMTP username
        $mail->Password = 'LiveStockCVille123$$$';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
    

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        
        //Recipients
        $mail->setFrom('livestock.cville@gmail.com', 'LiveStock');
        $mail->addAddress($email);               // Name is optional
        $mail->addReplyTo('no-reply@LiveStock.com', 'NO-REPLY');
    
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Thank You for Signing Up!';
        $mail->Body   = '<html>
                            <body style="font-family:Arial,Helvetica,sans-serif;font-size:13px;color:#000;">
                                <p>Dear '.$firstname.' '.$lastname.',</p>
                            <p>
                                Congratulations on creating your <strong>LiveStock</strong> account! You will receive special deals and discounts when you login,<br>
                                and will be able to access bundles not available to the public.<br><br>
    
                                Click to shop at <a href="localhost/product.html">LiveStock.com</a> now.<br><br>
    
                                If you did not sign up for <strong>LiveStock</strong>, please use the following contact information:<br>
                                &emsp;<a href="localhost/product.html">LiveStock.com</a><br>
                                &emsp;Phone: (571) 477-0037<br>
                                &emsp;Email: livestock.cville@gmail.com<br>
                                We have sent you a transcipt of your sign-up below:<br>
                                &emsp;<strong>Name:</strong> '.$firstname.' '.$lastname.'<br>
                                &emsp;<strong>Username:</strong> '.$username.'<br>
                                &emsp;<strong>Address:</strong> '.$address.'<br>
                                             '.$city.' '.$state.' '.$zip.'
                            </p>
                            <p>
                                Please contact us if this information is not correct.<b></b>
                            </p>
                            <p>
                                Thanks,<br>
                                LiveStock Team.
                            </p>
                            </body>
                        </html>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent';
      
    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }  
}
?>