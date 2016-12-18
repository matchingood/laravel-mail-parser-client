<?php

namespace MatchinGood\MailParserClient;

use GuzzleHttp\Client;

class MailParserClient
{
    private $client;
    private $apiKey;

    public function __construct(Client $client, $apiKey)
    {
        $this->client = $client;
        $this->apiKey = $apiKey;
    }

    public function parse($mime)
    {
        $response = $this->client->request('POST', "parse",[
            'headers' => [
                'x-api-key' => $this->apiKey,
                'content-type' => 'application/json'
            ],
            'json' => [
                'mime' => $mime
            ]
        ]);
        $json = json_decode($response->getBody(), true);

        $mail = new Mail;
        $mail->setFrom($json['from'])
            ->setTo($json['to'])
            ->setBcc($json['bcc'])
            ->setCc($json['cc'])
            ->setSubject($json['subject'])
            ->setHtml($json['html'])
            ->setDate($json['date']);
        return $mail;
    }
}
