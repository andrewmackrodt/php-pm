<?php

namespace PHPPM\Interop\ChildProcess;

use PHPPM\Interop\Stream\ReadableStreamInterface;

interface ProcessInterface
{
    public function isRunning(): bool;

    public function start();

    public function terminate();

    public function stderr(): ReadableStreamInterface;
}
