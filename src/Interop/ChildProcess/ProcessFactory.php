<?php

namespace PHPPM\Interop\ChildProcess;

use PHPPM\Interop\EventLoop\LoopInterface;
use PHPPM\Interop\EventLoop\React\Loop as ReactLoop;

class ProcessFactory
{
    public static function create(string $commandLine, LoopInterface $loop): ProcessInterface
    {
        if ($loop instanceof ReactLoop) {
            return new React\Process($loop->getLoop(), $commandLine);
        }

        throw new \InvalidArgumentException("Unknown loop interface $loop");
    }
}
