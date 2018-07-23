<?php

namespace PHPPM\Interop\Socket;

use PHPPM\Interop\EventLoop\LoopInterface;
use PHPPM\Interop\EventLoop\React\Loop as ReactLoop;

class TimeoutConnectorFactory
{
    public static function create(LoopInterface $loop, int $timeout): TimeoutConnectorInterface
    {
        if ($loop instanceof ReactLoop) {
            return new React\TimeoutConnector($loop->getLoop(), $timeout);
        }

        throw new \InvalidArgumentException('Unknown loop interface ' . get_class($loop));
    }
}
