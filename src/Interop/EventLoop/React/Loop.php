<?php

namespace PHPPM\Interop\EventLoop\React;

use PHPPM\Interop\EventLoop\LoopInterface;
use PHPPM\Interop\EventLoop\TimerInterface;

class Loop implements LoopInterface
{
    /**
     * @var \React\EventLoop\LoopInterface
     */
    protected $loop;

    public function __construct(\React\EventLoop\LoopInterface $loop)
    {
        $this->loop = $loop;
    }

    public function getLoop(): \React\EventLoop\LoopInterface
    {
        return $this->loop;
    }

    public function run()
    {
        $this->loop->run();
    }

    public function stop()
    {
        $this->loop->stop();
    }

    public function addSignal(int $signal, callable $callable)
    {
        $this->loop->addSignal(...func_get_args());
    }

    public function addPeriodicTimer(float $interval, callable $callable): TimerInterface
    {
        $timer = $this->loop->addPeriodicTimer(...func_get_args());

        return new Timer($timer);
    }

    public function addTimer(float $interval, callable $callable): TimerInterface
    {
        $timer = $this->loop->addTimer(...func_get_args());

        return new Timer($timer);
    }

    public function cancelTimer(TimerInterface $timer)
    {
        if (!$timer instanceof Timer) {
            throw new \InvalidArgumentException('Timer is expected to be an instance of ' . Timer::class);
        }

        $this->loop->cancelTimer($timer->getTimer());
    }

    public function futureTick(callable $callable)
    {
        $this->loop->futureTick(...func_get_args());
    }
}
