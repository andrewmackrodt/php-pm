<?php

namespace PHPPM\Interop\Socket;

use PHPPM\Interop\Stream\DuplexStreamInterface;

interface ConnectionInterface extends DuplexStreamInterface
{
    public function write(string $data);

    public function end(string $data = null);

    public function close();

    public function getRemoteAddress(): string;
}
