<?php

namespace PHPPM\Interop\Stream\React;

use PHPPM\Interop\Stream\WritableStreamInterface;

interface WritableStream extends WritableStreamInterface
{
    public function getStream(): \React\Stream\WritableStreamInterface;
}
