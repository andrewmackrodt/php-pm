<?php

namespace PHPPM\Interop\Stream;

use Evenement\EventEmitterInterface;

interface ReadableStreamInterface extends EventEmitterInterface
{
    public function pipe(WritableStreamInterface $dest, array $options = array());
}
