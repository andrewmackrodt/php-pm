<?php

namespace PHPPM\Interop\Http;

use PHPPM\Interop\Socket\ServerInterface as SocketServer;

interface ServerInterface
{
    public function listen(SocketServer $server);
}
