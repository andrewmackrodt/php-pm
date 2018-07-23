<?php

namespace PHPPM\Interop\Socket;

use PHPPM\Interop\EventLoop\LoopInterface;
use PHPPM\Interop\EventLoop\React\Loop as ReactLoop;

class UnixConnectorFactory
{
    public static function create(LoopInterface $loop): UnixConnectorInterface
    {
        if ($loop instanceof ReactLoop) {
            return new React\UnixConnector($loop->getLoop());
        }

        throw new \InvalidArgumentException('Unknown loop interface ' . get_class($loop));
    }
}
