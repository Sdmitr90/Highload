<?php

namespace App\Http\Controllers;

use App\Modules\Order\Order;
use App\Services\OrderStorageInterface;
use Illuminate\Routing\Controller as BaseController;

class OrderStorageController extends BaseController
{
    private OrderStorageInterface $orderStorage;


    public function __construct(OrderStorageInterface $orderStorage)
    {
        $this->orderStorage = $orderStorage;
    }

    public function insertValueToShard()
    {
        for( $i = 1; $i <= 10000; $i++ ) {
            $someOrder = new Order('Тестовый'.$i, date('Ymd'), 2+$i, 100*$i);
            $this->orderStorage->insert($someOrder);
        }
    }


}
