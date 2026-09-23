<?php

declare(strict_types=1);

namespace App\Actions\Order;

use App\Exceptions\Order\OrderNotFoundException;
use App\Models\Order;

final class FindOrderByIdAction
{
    public function execute(string $id): Order
    {
        $order = Order::find($id);

        if (!$order) {
            throw new OrderNotFoundException($id);
        }

        return $order;
    }
}
