<?php

namespace PHPPM\Interop\EventLoop\React;

use PHPPM\Interop\EventLoop\TimerInterface;

class Timer implements TimerInterface
{
    /**
     * @var \React\EventLoop\TimerInterface
     */
    protected $timer;

    public function __construct(\React\EventLoop\TimerInterface $timer)
    {
        $this->timer = $timer;
    }

    public function getTimer(): \React\EventLoop\TimerInterface
    {
        return $this->timer;
    }
}
