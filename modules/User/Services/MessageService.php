<?php

namespace Modules\User\Services;


use Modules\User\Contracts\Message;

class MessageService
{
    private $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function send() {
        return $this->message->send();
    }
}
