<?php

namespace PHPPM\Interop\Http;

use PHPPM\Interop\EventLoop\LoopInterface;
use PHPPM\Interop\EventLoop\React\Loop as ReactLoop;

class ServerFactory
{
    public static function create(callable $requestHandler, LoopInterface $loop): ServerInterface
    {
        if ($loop instanceof ReactLoop) {
            return new React\Server($requestHandler);
        }

        throw new \InvalidArgumentException('Unknown loop interface ' . get_class($loop));
    }
}
