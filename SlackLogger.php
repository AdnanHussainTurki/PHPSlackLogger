<?php

namespace myPHPnotes;

use Crummy\Phlack\Phlack;


class SlackLogger
{
    protected $client;
    function __construct(string $webhook_url)
    {
        $this->client = new Phlack($webhook_url);
    }
    public function logError($e)
    {

        $messageBuilder = $this->client->getMessageBuilder();
        $messageBuilder
                ->setText("Error Type: " . get_class($e))
                ->createAttachment()
                    ->setTitle($e->getMessage() . "\n" . "File: ".$e->getFile() . "\n" ."Line: " . $e->getLine())
                    ->setText($e->getTrace())
                    ->setColor("#ff0000")
                ->end();
        $message = $messageBuilder->create();
        return $this->client->send($message);
    }
}