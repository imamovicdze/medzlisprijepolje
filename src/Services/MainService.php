<?php
/**
 * Created by PhpStorm.
 * User: imamo
 * Date: 2/10/2018
 * Time: 5:37 PM
 */

namespace MedzlisPrijepolje\Services;
use MedzlisPrijepolje\Models\Category;
use MedzlisPrijepolje\Models\News;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class MainService
{
    /** @var PHPmailer $mail**/
    private $mail;

    public function __construct(){

    }

    public function sendMail($clientMail, $clientName, $title, $text)
    {
        try {
            $this->mail = new PHPMailer(true);
            $this->mail->SMTPdebug = 4;
            $this->mail->isSMTP();
            $this->mail->SMTPAuth = true;
            $this->mail->SMTPSecure = 'ssl';
            $this->mail->SMTPAutoTLS = false;
            $this->mail->Host = 'smtp.gmail.com';
            $this->mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $this->mail->Username = 'login.service222@gmail.com';
            $this->mail->Password = 'desktop12';
            $this->mail->Port = 465;

            $this->mail->setFrom($clientMail, $clientName);
            $this->mail->addReplyTo($clientMail, $clientName);
            $this->mail->CharSet = 'UTF-8';

            $this->mail->isHTML();
            $mailContent = '<p style="text-align:center">' . htmlentities($text) . '</p><br/><p> This mail has been sent from medzlisprijepolje.org contact form</p>';
            $this->mail->Subject = $title;
            $this->mail->Body = $mailContent;
            $this->mail->AltBody = htmlentities($text);
            $this->mail->addAddress('login.service111@gmail.com');
            $this->mail->Send();
            return true;
        } catch (Exception $e) {
            return $e;
        }
    }
}