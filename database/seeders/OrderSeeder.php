<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

final class OrderSeeder extends Seeder
{
    private const int COUNT = 10;

    public function run(): void
    {
        Order::factory()->count(self::COUNT)->create();

        if ($this->command) {
            $this->command->info(sprintf("Successfully created %d orders.", self::COUNT));

            Order::query()
                ->latest()
                ->take(self::COUNT)
                ->get(['id', 'customer_name', 'total_amount', 'status', 'items_description'])
                ->each(function (Order $order): void {
                    $this->command->line(sprintf(
                        'ID: %s | Customer: %s | Amount: %s | Status: %s | Item: %s',
                        $order->id,
                        $order->customer_name,
                        $order->total_amount,
                        $order->status->value,
                        $order->items_description,
                    ));
                });
        }
    }
}
