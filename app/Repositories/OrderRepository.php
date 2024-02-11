<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository extends Repository
{

    public function all()
    {
        return Order::all();
    }

    public function find($value)
    {
        return Order::find($value);
    }

    public function findBy($column, $value)
    {
        return Order::where($column, $value)->first();
    }

    public function findByAll($column, $value)
    {
        return Order::where($column, $value)->get();
    }

    public function findByAttributes($attributes)
    {
        $response = null;
        foreach ($attributes as $column => $value) {
            $response = $response == null ? Order::where($column, $value) : $response->where($column, $value);
        }
        return $response == null ? $response : $response->first();
    }

    public function findByAllAttributes($attributes)
    {
        $response = null;
        foreach ($attributes as $column => $value) {
            $response = $response == null ? Order::where($column, $value) : $response->where($column, $value);
        }
        return $response == null ? $response : $response->get();
    }

    public function allComplete()
    {
        return Order::with('cart.items', 'items')
                    ->with('customer', 'customer')
                    ->with('cart', 'cart')
                    ->with('payment_method', 'payment_method')
                    ->with('shipping_method', 'shipping_method')
                    ->get();
    }
}
