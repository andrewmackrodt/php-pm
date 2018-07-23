<?php

namespace PHPPM\Interop\Stream;

use Evenement\EventEmitterInterface;

interface WritableStreamInterface extends EventEmitterInterface
{
    public function isWritable(): bool;
}
