<?php

namespace PHPPM\Interop\Socket\React;

use PHPPM\Interop\Socket\ServerInterface;

class Server implements ServerInterface
{
    use ServerTrait;

    public function __construct(\React\EventLoop\LoopInterface $loop, string $hostPort)
    {
        $this->server = new \React\Socket\Server($hostPort, $loop);
    }
}
