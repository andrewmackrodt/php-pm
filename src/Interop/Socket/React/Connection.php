<?php

namespace PHPPM\Interop\Socket\React;

use PHPPM\Interop\Socket\ConnectionInterface;
use PHPPM\Interop\Stream\React;
use PHPPM\Interop\Stream\WritableStreamInterface;

class Connection implements ConnectionInterface, React\WritableStream
{
    /**
     * @var \React\Socket\ConnectionInterface
     */
    protected $connection;

    public function __construct(\React\Socket\ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    public function getStream(): \React\Stream\WritableStreamInterface
    {
        return $this->connection;
    }

    public function pipe(WritableStreamInterface $dest, array $options = [])
    {
        if (!$dest instanceof React\WritableStream) {
            throw new \InvalidArgumentException('Stream is expected to be an instance of ' . React\WritableStream::class);
        }

        $this->connection->pipe($dest->getStream(), $options);
    }

    public function write(string $data)
    {
        $this->connection->write(...func_get_args());
    }

    public function end(string $data = null)
    {
        $this->connection->end(...func_get_args());
    }

    public function close()
    {
        $this->connection->close();
    }

    public function getRemoteAddress(): string
    {
        return $this->connection->getRemoteAddress();
    }

    public function on($event, callable $listener)
    {
        $this->connection->on(...func_get_args());
    }

    public function once($event, callable $listener)
    {
        $this->connection->once(...func_get_args());
    }

    public function removeListener($event, callable $listener)
    {
        $this->connection->removeListener(...func_get_args());
    }

    public function removeAllListeners($event = null)
    {
        $this->connection->removeAllListeners(...func_get_args());
    }

    public function listeners($event = null)
    {
        return $this->connection->listeners(...func_get_args());
    }

    public function emit($event, array $arguments = [])
    {
        $this->connection->emit(...func_get_args());
    }

    public function isWritable(): bool
    {
        return $this->connection->isWritable();
    }
}
