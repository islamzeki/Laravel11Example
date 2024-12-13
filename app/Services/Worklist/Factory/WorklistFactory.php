<?php

namespace App\Services\Worklist\Factory;

use App\Services\Worklist\Contracts\WorklistContract;
use App\Services\Worklist\Providers\MockOneProvider;
use App\Services\Worklist\Providers\MockTwoProvider;

class WorklistFactory
{
    public static function create(string $provider): WorklistContract
    {
        return match($provider) {
            'One' => new MockOneProvider(),
            'Two' => new MockTwoProvider(),
            default => throw new \InvalidArgumentException("Can not create '{$provider}'")
        };
    }
}
