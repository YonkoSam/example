<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class OrderShippedEvent
{
    use Dispatchable;

    public function __construct()
    {
    }
}
