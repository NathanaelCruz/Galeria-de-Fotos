<?php

namespace PhotoGallery;

header('Content-Type: text/html; charset=UTF-8');

use PhotoGallery\DB\Sql;
use Rain\Tpl;
use PHPMailer\PHPMailer\PHPMailer;

class Mailer
{
    CONST USERNAME = ""; //Seu email que devera receber a mensagem do usuário
    CONST PASSWORD = ""; //Sua senha para encaminhar o email
    CONST NAME_FROM = "Contact Developer";

    private $mail;

    public function __construct($toAddress, $toName, $subject, $tplName, $msg)
    {
        $config = array(
            "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/photogallery/views/email/",
            "cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/photogallery/views-cache/",
            "debug"         => false // set to false to improve the speed
           );

        Tpl::configure( $config );

        $tpl = new Tpl;

        $tpl->assign("mensagem", $msg);
        $tpl->assign("email", $toAddress);
        $tpl->assign("nome", $toName);

        $html = $tpl->draw($tplName, true);
        $this->mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $this->mail->isSMTP();

        $this->mail->SMTPOptions = array(
            'ssl' => array(

                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true

            )
        );
        $this->mail->CharSet = 'UTF-8';
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $this->mail->SMTPDebug = 2;
        //Set the hostname of the mail server
        $this->mail->Host = 'smtp.gmail.com';
        // use
        // $this->mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $this->mail->Port = 587;
        //Set the encryption system to use - ssl (deprecated) or tls
        $this->mail->SMTPSecure = 'tls';
        //Whether to use SMTP authentication
        $this->mail->SMTPAuth = true;
        //Username to use for SMTP authentication - use full email address for gmail
        $this->mail->Username = Mailer::USERNAME;
        //Password to use for SMTP authentication
        $this->mail->Password = Mailer::PASSWORD;
        //Set who the message is to be sent from
        $this->mail->setFrom(Mailer::USERNAME, Mailer::NAME_FROM);
        //Set an alternative reply-to address
        //$this->mail->addReplyTo('nathan_300@live.com', 'NA');
        //Set who the message is to be sent to
        $this->mail->addAddress(Mailer::USERNAME, Mailer::NAME_FROM);
        //Set the subject line
        $this->mail->Subject = $subject;
        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $this->mail->msgHTML($html);
        //Replace the plain text body with one created manually
        $this->mail->AltBody = utf8_decode($msg);
        //Attach an image file
        //$this->mail->addAttachment('images/phpmailer_mini.png');
        //send the message, check for errors
        
    }

    public function send()
	{

		return $this->mail->send();

	}
}

?>