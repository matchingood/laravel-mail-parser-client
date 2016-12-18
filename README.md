# laravel-mail-parser-client
Laravel client library for [mail-parser-api](https://github.com/matchingood/mail-parser-api)

## Install
In your composer.json,
```
{
    "require": {
        "matchingood/mail-parser-client": "dev-master"
    },

    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/matchingood/laravel-mail-parser-client"
        }
    ]
}
```
Then register `MailParserServiceProvider` at `config/app.php`.
```php
'providers' => [
    .
    .
    .
    MatchinGood\MailParserClient\MailParserServiceProvider::class
],
```
Now, you create configuration file at `config/mailparser.php`.

## Usage
```php
$mail = MailParser::parse($mime);
$mail->getFrom(); // ['address' => 'luke@example.com', 'name' => 'Luke']
$mail->getTo();
$mail->getBcc();
$mail->getCc();
$mail->getSubject();
$mail->getHtml();
$mail->getDate(); // 2016-12-02T07:44:11.000Z
```
