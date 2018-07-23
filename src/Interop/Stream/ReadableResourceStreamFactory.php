<?php

namespace PHPPM\Interop\Stream;

use PHPPM\Interop\EventLoop\LoopInterface;
use PHPPM\Interop\EventLoop\React\Loop as ReactLoop;

class ReadableResourceStreamFactory
{
    public static function create($resource, LoopInterface $loop): ReadableResourceStreamInterface
    {
        if ($loop instanceof ReactLoop) {
            return new React\ReadableResourceStream($loop->getLoop(), $resource);
        }

        throw new \InvalidArgumentException('Unknown loop interface ' . get_class($loop));
    }
}
