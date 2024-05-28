<?php

use PHPMailer\PHPMailer\PHPMailer;


$phpmailer = new PHPMailer();
$phpmailer->isSMTP();
$phpmailer->Host = 'sandbox.smtp.mailtrap.io';
$phpmailer->SMTPAuth = true;
$phpmailer->Port = 2525;
$phpmailer->Username = 'e7c6b701579b1f';
$phpmailer->Password = 'f0f21bc13c0352';
$phpmailer->setFrom('mohammd.shirani.developer@gmail.com', 'auth projet');
$phpmailer->isHTML(true);
