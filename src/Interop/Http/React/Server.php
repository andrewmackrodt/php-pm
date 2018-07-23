<?php

namespace PHPPM\Interop\Http\React;

use PHPPM\Interop\Http\ServerInterface;
use PHPPM\Interop\Socket\ServerInterface as SocketServer;

class Server implements ServerInterface
{
    /**
     * @var \React\Http\Server
     */
    protected $server;

    public function __construct(callable $requestHandler)
    {
        $this->server = new \React\Http\Server($requestHandler);
    }

    public function listen(SocketServer $server)
    {
        if (!$server instanceof \PHPPM\Interop\Socket\React\Server
            && !$server instanceof \PHPPM\Interop\Socket\React\UnixServer) {
            throw new \InvalidArgumentException(sprintf(
                'Server must be an instance of "%s" or "%s" not "%s"',
                \PHPPM\Interop\Socket\React\Server::class,
                \PHPPM\Interop\Socket\React\UnixServer::class,
                get_class($server)
            ));
        }

        $this->server->listen($server->getServer());
    }
}
