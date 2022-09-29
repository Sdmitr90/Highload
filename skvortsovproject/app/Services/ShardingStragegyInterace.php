<?php

namespace App\Services;

use App\Modules\Order\Order;
use PDO;

interface ShardingStragegyInterace
{
    public function __construct();

    public function getConnection(Order $order): PDO;
}
