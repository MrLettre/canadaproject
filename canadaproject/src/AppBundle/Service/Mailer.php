<?php
namespace AppBundle\Service;


class Mailer
{
    private $mailer;
    private $templating;

    public function __construct(\Swift_Mailer $mailer, \Twig_Environment $templating)
    {
        $this->mailer = $mailer;
        $this->templating = $templating;
    }

    public function sendEmail($subject, $sendTo, $render, $user, $content)
    {
        $body = $this->templating->render($render, [
            'user' => $user,
            'content' => $content
        ]);
        $message = (new \Swift_Message($subject))
            ->setFrom('hello@carify.ca')
            ->setTo($sendTo)
            ->setCharset('utf-8')
            ->setContentType('text/html')
            ->setBody($body);
        $this->mailer->send($message);
    }
}