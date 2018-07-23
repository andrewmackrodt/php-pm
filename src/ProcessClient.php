<?php

namespace PHPPM;

use PHPPM\Interop\EventLoop\Factory;
use PHPPM\Interop\EventLoop\LoopInterface;
use PHPPM\Interop\Socket\ConnectionInterface;
use PHPPM\Interop\Socket\UnixConnectorFactory;

class ProcessClient
{
    use ProcessCommunicationTrait;

    /**
     * @var LoopInterface
     */
    protected $loop;

    public function __construct()
    {
        $this->loop = Factory::create();
    }

    protected function request($command, $options, $callback)
    {
        $data = [
            'cmd' => $command,
            'options' => $options
        ];

        $connector = UnixConnectorFactory::create($this->loop);
        $unixSocket = $this->getControllerSocketPath(false);

        $connector->connect($unixSocket)->done(
            function (ConnectionInterface $connection) use ($data, $callback) {
                $result = '';

                $connection->on('data', function ($data) use (&$result) {
                    $result .= $data;
                });

                $connection->on('close', function () use ($callback, &$result) {
                    $callback($result);
                });

                $connection->write(json_encode($data) . PHP_EOL);
            }
        );
    }

    public function getStatus(callable $callback)
    {
        $this->request('status', [], function ($result) use ($callback) {
            $callback(json_decode($result, true));
        });
        $this->loop->run();
    }

    public function stopProcessManager(callable $callback)
    {
        $this->request('stop', [], function ($result) use ($callback) {
            $callback(json_decode($result, true));
        });
        $this->loop->run();
    }

    public function reloadProcessManager(callable $callback)
    {
        $this->request('reload', [], function ($result) use ($callback) {
            $callback(json_decode($result, true));
        });
        $this->loop->run();
    }
}
