<?php

namespace PHPPM\Interop\Socket;

class ConnectionTransformer
{
    public static function transform($connection): ConnectionInterface
    {
        if ($connection instanceof \React\Socket\ConnectionInterface) {
            return new React\Connection($connection);
        }

        throw new \InvalidArgumentException('Unknown connection interface ' . get_class($connection));
    }
}
