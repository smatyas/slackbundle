<?php
namespace Orukusaki\Bundle\SlackBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class MessageReceivedEvent extends Event
{
    const KEY = 'slack.message.received';

    protected $message;
    protected $channel;

    public function __construct($message, $channel)
    {
        $this->message = $message;
        $this->channel = $channel;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getChannel()
    {
        return $this->channel;
    }
}
