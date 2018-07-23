<?php

namespace PHPPM\Interop\Socket;

use PHPPM\Interop\Promise\PromiseInterface;

interface UnixConnectorInterface
{
    public function connect(string $unixSocketFile): PromiseInterface;
}
