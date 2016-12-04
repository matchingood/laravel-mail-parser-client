<?php

use MatchinGood\MailParserClient\MailParserClient;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class MailParserClientTest extends TestCase
{
    private $response;

    public function setUp()
    {
        parent::setUp();
        $this->validMock = new MockHandler([
            new Response(200, [], json_encode([
                'from' => [
                    'address' => 'han@example.com',
                    'name' => 'Han'
                ],
                'to' => [
                    'address' => 'luke@example.com',
                    'name' => 'Luke'
                ],
                'bcc' => [
                    [
                        'address' => 'leia@example.com',
                        'name' => 'Leia'
                    ]
                ],
                'cc' => [
                    [
                        'address' => 'chewbacca@example.com',
                        'name' => 'Chewbacca'
                    ]
                ],
                'subject' => 'test',
                'html' => 'hello',
                'date' => '2016-09-28'
            ]))
        ]);
    }

    public function testGet()
    {
        $handler = HandlerStack::create($this->validMock);
        $client = new Client(['handler' => $handler]);
        $mailParser = new MailParserClient($client, 'key');
        $mail = $mailParser->parse('test');
        $this->assertEquals($mail->getSubject(), 'test');
        $this->assertEquals($mail->getHtml(), 'hello');
    }
}
