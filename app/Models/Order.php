<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Order\OrderStatus;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property string $id
 * @property string $customer_name
 * @property int $total_amount
 * @propery OrderStatus $status
 * @property string $items_description
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Order extends Model
{
    use HasUuids;

    protected $fillable = [
        'customer_name',
        'total_amount',
        'status',
        'items_description',
    ];

    protected function casts(): array
    {
        return [
            'status' => OrderStatus::class,
            'total_amount' => 'integer',
        ];
    }
}
