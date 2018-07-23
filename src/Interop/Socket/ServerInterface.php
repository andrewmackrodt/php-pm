<?php

namespace PHPPM\Interop\Socket;

use Evenement\EventEmitterInterface;

interface ServerInterface extends EventEmitterInterface
{
    public function close();
}
