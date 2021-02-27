<?php


class OrderService
{
    const STATUS_NEW = 0;
    const STATUS_IN_PROCESS = 1;
    const STATUS_COMPLETE = 3;
    const STATUS_CANCELED = 4;

    public function getStatus()
    {
        return [
            self::STATUS_NEW => 'New',
            self::STATUS_IN_PROCESS => 'In process',
            self::STATUS_COMPLETE => 'Complete',
            self::STATUS_CANCELED => 'Canceled'
        ];
    }
}
