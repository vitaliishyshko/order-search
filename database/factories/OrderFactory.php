<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\Order\OrderStatus;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
final class OrderFactory extends Factory
{
    private const string LOCALE = 'uk_UA';

    public function definition(): array
    {
        return [
            'customer_name' => fake(self::LOCALE)->name(),
            'total_amount' => fake()->randomNumber(),
            'status' => fake()->randomElement(OrderStatus::cases()),
            'items_description' => fake(self::LOCALE)->randomElement([
                'Насос вібраційний WETRON верхній забір 0.25кВт H 75м Q 18л/хв Ø100мм 10м кабеля',
                'Колонка газова АТЕМ ВПГ-20ТМ (з модуляцією)',
                'Труба STALAR STANDART MONO AISI 304 ø100 1м 0,5 мм',
                'Камін повітряний ALFA-PLAM FORMA 7.5 кВт 470*512*1100',
                'Котел газовий димохідний АТЕМ Житомир-3 КС-Г-007СН одноконтурний (димохід назад)',
                'Котел електричний TEKNIX ESPRO/RS-7.5 кВт',
                'Водонагрівач електричний ELDOM STYLE DRY 80 SLIM з сухими тенами',
                'Кран кульовий PROFACTOR 3/4" ВВ з ручкою "метелик"',
                'Американка ASG INOX 18х3/4" З',
                'Конвектор електричний ELDOM з вентилятором 2000W білий',
            ]),
        ];
    }
}
