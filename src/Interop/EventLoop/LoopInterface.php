<?php

namespace PHPPM\Interop\EventLoop;

interface LoopInterface
{
    public function run();

    public function stop();

    public function futureTick(callable $callable);

    public function addSignal(int $signal, callable $callable);

    public function addPeriodicTimer(float $interval, callable $callable): TimerInterface;

    public function addTimer(float $interval, callable $callable): TimerInterface;

    public function cancelTimer(TimerInterface $timer);
}
