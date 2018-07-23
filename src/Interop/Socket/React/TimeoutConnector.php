<?php

namespace PHPPM\Interop\Socket\React;

use PHPPM\Interop\Promise\PromiseInterface;
use PHPPM\Interop\Promise\React\Promise;
use PHPPM\Interop\Socket\ConnectionTransformer;
use PHPPM\Interop\Socket\TimeoutConnectorInterface;

class TimeoutConnector implements TimeoutConnectorInterface
{
    /**
     * @var \React\Socket\TimeoutConnector
     */
    protected $connector;

    public function __construct(\React\EventLoop\LoopInterface $loop, int $timeout)
    {
        $connector = new \React\Socket\UnixConnector($loop);

        $this->connector = new \React\Socket\TimeoutConnector($connector, $timeout, $loop);
    }

    public function connect(string $unixSocketFile): PromiseInterface
    {
        $connection = null;

        $this->connector->connect($unixSocketFile)
            ->then(function ($value) use (&$connection) {
                $connection = ConnectionTransformer::transform($value);
            });

        return new Promise(function ($resolver) use (&$connection) {
            $resolver($connection);
        });
    }
}
