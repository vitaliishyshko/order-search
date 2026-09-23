<?php

declare(strict_types=1);

namespace App\Exceptions\Order;

use Exception;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class OrderNotFoundException extends Exception
{
    public function __construct(string $id)
    {
        parent::__construct("Order with ID: {$id} not found");
    }

    public function render(): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $this->getMessage(),
        ], Response::HTTP_NOT_FOUND);
    }
}
