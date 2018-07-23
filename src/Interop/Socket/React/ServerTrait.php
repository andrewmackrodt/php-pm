<?php

namespace PHPPM\Interop\Socket\React;

trait ServerTrait
{
    /**
     * @var \React\Socket\ServerInterface
     */
    protected $server;

    public function getServer(): \React\Socket\ServerInterface
    {
        return $this->server;
    }

    public function close()
    {
        $this->server->close();
    }

    public function on($event, callable $listener)
    {
        $this->server->on(...func_get_args());
    }

    public function once($event, callable $listener)
    {
        $this->server->once(...func_get_args());
    }

    public function removeListener($event, callable $listener)
    {
        $this->server->removeListener(...func_get_args());
    }

    public function removeAllListeners($event = null)
    {
        $this->server->removeAllListeners(...func_get_args());
    }

    public function listeners($event = null)
    {
        return $this->server->listeners(...func_get_args());
    }

    public function emit($event, array $arguments = [])
    {
        $this->server->emit(...func_get_args());
    }
}
