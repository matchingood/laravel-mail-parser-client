<?php

namespace MatchinGood\MailParserClient\Facades;

use Illuminate\Support\Facades\Facade;

class MailParserFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'mailparser';
    }
}
