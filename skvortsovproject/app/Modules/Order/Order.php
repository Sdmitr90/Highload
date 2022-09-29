<?php

namespace App\Modules\Order;

class Order
{
    /**
     * Order
     *  - id: int
     *  - name: varchar
     *  - date: datetime
     *  - user_id: int
     *  - sum: float
     */
    public $id;
    public $name;
    public $date;
    public $user_id;
    public $sum;

    public function __construct($name, $date, $user_id, $sum) {
        $this->name = $name;
        $this->date = $date;
        $this->user_id = $user_id;
        $this->sum = $sum;
    }
}
