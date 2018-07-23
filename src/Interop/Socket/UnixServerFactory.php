<?php

namespace PHPPM\Interop\Socket;

use PHPPM\Interop\EventLoop\LoopInterface;
use PHPPM\Interop\EventLoop\React\Loop as ReactLoop;

class UnixServerFactory
{
    public static function create(string $unixSocketFile, LoopInterface $loop): UnixServerInterface
    {
        if ($loop instanceof ReactLoop) {
            return new React\UnixServer($loop->getLoop(), $unixSocketFile);
        }

        throw new \InvalidArgumentException('Unknown loop interface ' . get_class($loop));
    }
}
