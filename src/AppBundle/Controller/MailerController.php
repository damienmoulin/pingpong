<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 11/01/17
 * Time: 13:31
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Mailgun\Mailgun;

class MailerController extends Controller
{
    public function sendMailAction($to, $subject, $text)
    {
        $message = new Mailgun('key-669533d09c44f75f332c453fb8cdf700');
        $domain = 'sandbox9d6a022a47aa440d8c03ee8ac68aa807.mailgun.org';

        $message->sendMessage($domain,
            array(
                'from'    => 'ping@pong.com',
                'to'      => $to,
                'subject' => $subject,
                'html'    => $text
            ));
    }
}