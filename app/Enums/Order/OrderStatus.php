<?php

declare(strict_types=1);

namespace App\Enums\Order;

enum OrderStatus: string
{
    case New = 'NEW';
    case Processing = 'PROCESSING';
    case Shipped = 'SHIPPED';
    case Delivered = 'DELIVERED';
}
