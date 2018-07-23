<?php

namespace PHPPM\Interop\Stream\React;

use PHPPM\Interop\Stream\WritableStreamInterface;

trait ReadableStreamTrait
{
    /**
     * @var \React\Stream\ReadableStreamInterface
     */
    protected $stream;

    public function getStream(): \React\Stream\ReadableStreamInterface
    {
        return $this->stream;
    }

    public function pipe(WritableStreamInterface $dest, array $options = [])
    {
        if (!$dest instanceof WritableStream) {
            throw new \InvalidArgumentException('Stream is expected to be an instance of ' . WritableStream::class);
        }

        $this->stream->pipe($dest->getStream(), $options);
    }

    public function close()
    {
        $this->stream->close();
    }

    public function on($event, callable $listener)
    {
        $this->stream->on(...func_get_args());
    }

    public function once($event, callable $listener)
    {
        $this->stream->once(...func_get_args());
    }

    public function removeListener($event, callable $listener)
    {
        $this->stream->removeListener(...func_get_args());
    }

    public function removeAllListeners($event = null)
    {
        $this->stream->removeAllListeners(...func_get_args());
    }

    public function listeners($event = null)
    {
        return $this->stream->listeners(...func_get_args());
    }

    public function emit($event, array $arguments = [])
    {
        $this->stream->emit(...func_get_args());
    }
}
