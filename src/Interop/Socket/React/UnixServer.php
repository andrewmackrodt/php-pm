<?php

namespace PHPPM\Interop\Socket\React;

use PHPPM\Interop\Socket\UnixServerInterface;

class UnixServer implements UnixServerInterface
{
    use ServerTrait;

    public function __construct(\React\EventLoop\LoopInterface $loop, string $path)
    {
        $this->server = new \React\Socket\UnixServer($path, $loop);
    }
}
