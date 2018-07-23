<?php

namespace PHPPM\Interop\Socket;

use PHPPM\Interop\EventLoop\LoopInterface;
use PHPPM\Interop\EventLoop\React\Loop as ReactLoop;

class ServerFactory
{
    public static function create(string $host, int $port, LoopInterface $loop): ServerInterface
    {
        if ($loop instanceof ReactLoop) {
            return new React\Server($loop->getLoop(), sprintf('%s:%d', $host, $port));
        }

        throw new \InvalidArgumentException('Unknown loop interface ' . get_class($loop));
    }
}
