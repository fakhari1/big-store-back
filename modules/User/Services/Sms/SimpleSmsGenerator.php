<?php

namespace Modules\User\Services\Sms;

use Modules\User\Contracts\Message;

class SimpleSmsGenerator implements Message
{
    private $from;
    private $text;
    private $to;
    private $is_flash = true;

    public function send()
    {
        $ip_panel_sms_provider = new IpPanelSmsProvider();
        return $ip_panel_sms_provider->sendSmsViaSoapClient('0' . $this->to, $this->text);
    }

    public function getFrom()
    {
        return $this->from;
    }

    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }
}
