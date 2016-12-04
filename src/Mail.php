<?php

namespace MatchinGood\MailParserClient;

class Mail
{
    private $from;
    private $to;
    private $bcc;
    private $cc;
    private $subject;
    private $html;
    private $date;

    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }

    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }

    public function setBcc(array $bcc)
    {
        $this->bcc = $bcc;
        return $this;
    }

    public function setCc(array $cc)
    {
        $this->cc = $cc;
        return $this;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    public function setHtml($html)
    {
        $this->html = $html;
        return $this;
    }

    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function getBcc()
    {
        return $this->bcc;
    }

    public function getCc()
    {
        return $this->cc;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getHtml()
    {
        return $this->html;
    }

    public function getDate()
    {
        return $this->date;
    }
}
