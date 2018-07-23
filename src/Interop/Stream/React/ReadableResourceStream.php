<?php

namespace PHPPM\Interop\Stream\React;

use PHPPM\Interop\Stream\ReadableResourceStreamInterface;

class ReadableResourceStream implements ReadableResourceStreamInterface
{
    use ReadableStreamTrait;

    public function __construct(\React\EventLoop\LoopInterface $loop, $resource)
    {
        if (is_string($resource)) {
            $resource = fopen($resource, 'rb');

            $stream = new \React\Stream\ReadableResourceStream($resource, $loop);
        } else {
            $stream = $resource;
        }

        $this->stream = $stream;
    }
}
