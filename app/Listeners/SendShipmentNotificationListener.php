<?php

namespace App\Listeners;

use App\Events\OrderShippedEvent;

class SendShipmentNotificationListener
{
    public function __construct()
    {
    }

    public function handle(OrderShippedEvent $event): void
    {

    }
}
