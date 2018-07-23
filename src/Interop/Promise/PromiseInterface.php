<?php

namespace PHPPM\Interop\Promise;

interface PromiseInterface
{
    public function then(callable $onSuccess = null, callable $onError = null);

    public function done(callable $onSuccess = null, callable $onError = null);
}
