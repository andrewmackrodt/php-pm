<?php

namespace PHPPM\Interop\ChildProcess\React;

use PHPPM\Interop\ChildProcess\ProcessInterface;
use PHPPM\Interop\Stream\React\ReadableResourceStream;
use PHPPM\Interop\Stream\ReadableStreamInterface;

class Process implements ProcessInterface
{
    /**
     * @var \React\EventLoop\LoopInterface
     */
    protected $loop;

    /**
     * @var \React\ChildProcess\Process
     */
    protected $process;

    public function __construct(\React\EventLoop\LoopInterface $loop, string $commandLine)
    {
        $this->loop = $loop;
        $this->process = new \React\ChildProcess\Process($commandLine);
    }

    public function isRunning(): bool
    {
        return $this->process->isRunning();
    }

    public function start()
    {
        $this->process->start($this->loop);
    }

    public function terminate()
    {
        $this->process->terminate();
    }

    public function stderr(): ReadableStreamInterface
    {
        return new ReadableResourceStream($this->loop, $this->process->stderr);
    }
}
