<?php

namespace PHPPM\Interop\Socket\React;

use PHPPM\Interop\Promise\PromiseInterface;
use PHPPM\Interop\Promise\React\FulfilledPromise;
use PHPPM\Interop\Socket\ConnectionTransformer;
use PHPPM\Interop\Socket\UnixConnectorInterface;

class UnixConnector implements UnixConnectorInterface
{
    /**
     * @var \React\Socket\UnixConnector
     */
    protected $connector;

    public function __construct(\React\EventLoop\LoopInterface $loop)
    {
        $this->connector = new \React\Socket\UnixConnector($loop);
    }

    public function connect(string $unixSocketFile): PromiseInterface
    {
        $this->connector->connect($unixSocketFile)
            ->then(function ($value) use (&$connection) {
                $connection = $value;
            });

        $connection = ConnectionTransformer::transform($connection);

        return new FulfilledPromise($connection);
    }
}
