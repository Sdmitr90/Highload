<?php

namespace App\Modules\Order;

use App\Services\OrderStorageInterface;
use App\Services\ShardingStragegyInterace;

class OrderStorage implements OrderStorageInterface
{

    private ShardingStragegyInterace $shardingStragegy;

    public function __construct(ShardingStragegyInterace $shardingStragegy)
    {
        $this->shardingStragegy = $shardingStragegy;
    }

    protected function runQuery($query, Order $order) {
        /** @var PDO $connection */
        $connection = $this->shardingStragegy->getConnection($order);
        $connection->query($query);
    }

    public function insert(Order $order) {
        //добавить запись и вернуть объект с id
        $this->runQuery("INSERT INTO highload.`order` (name, date, user_id, sum) VALUES ('$order->name', $order->date, $order->user_id, $order->sum);", $order);
//        return mysql_insert_id();
    }

    public function update(Order $order) {
        //обновить объект
        $this->runQuery("update lalala", $order);
    }

    public function delete(Order $order) {
        //удалить объект
        $this->runQuery("delete lalalal", $order);
    }
}
