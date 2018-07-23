<?php

namespace PHPPM\Interop\Http;

use PHPPM\Interop\EventLoop\LoopInterface;
use PHPPM\Interop\EventLoop\React\Loop as ReactLoop;
use PHPPM\Interop\Stream\React;
use Psr\Http\Message\ResponseInterface;

class ResponseFactory
{
    public static function create(
        LoopInterface $loop,
        $status = 200,
        array $headers = array(),
        $body = null,
        $version = '1.1',
        $reason = null
    ): ResponseInterface {
        if ($loop instanceof ReactLoop) {
            if ($body instanceof React\ReadableResourceStream) {
                $body = new \React\Http\Io\HttpBodyStream($body->getStream(), null);
            }

            return new \React\Http\Response($status, $headers, $body, $version, $reason);
        }

        throw new \InvalidArgumentException('Unknown loop interface ' . get_class($loop));
    }
}
