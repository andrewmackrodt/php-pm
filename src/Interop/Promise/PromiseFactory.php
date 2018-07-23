<?php

namespace PHPPM\Interop\Promise;

use PHPPM\Interop\EventLoop\LoopInterface;
use PHPPM\Interop\EventLoop\React\Loop as ReactLoop;

class PromiseFactory
{
    public static function create($value, LoopInterface $loop): PromiseInterface
    {
        if ($loop instanceof ReactLoop) {
            return new React\Promise($value);
        }

        throw new \InvalidArgumentException('Unknown loop interface ' . get_class($loop));
    }
}
