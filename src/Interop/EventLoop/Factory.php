<?php

namespace PHPPM\Interop\EventLoop;

use PHPPM\Interop\EventLoop\React\Loop as ReactLoop;

class Factory
{
    public static function create(string $loop = ReactLoop::class): LoopInterface
    {
        switch ($loop) {
            case ReactLoop::class:
                return new ReactLoop(\React\EventLoop\Factory::create());
        }

        throw new \InvalidArgumentException("Unknown loop interface $loop");
    }
}
