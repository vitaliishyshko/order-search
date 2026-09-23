<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Order;

use App\Actions\Order\FindOrderByIdAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\FindOrderRequest;
use App\Http\Resources\Order\OrderResource;

final class ShowController extends Controller
{
    public function __invoke(FindOrderRequest $request, FindOrderByIdAction $action): OrderResource
    {
        $order = $action->execute($request->validated('id'));

        return new OrderResource($order);
    }
}
