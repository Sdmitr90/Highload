<?php

namespace App\Services;

use App\Modules\Order\Order;

interface OrderStorageInterface
{
//    public function __construct(private ShardingStragegyInterace $shardingStragegy);

    public function insert(Order $order);

    public function update(Order $order);

    public function delete(Order $order);
}
