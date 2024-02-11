<?php

namespace App\Repositories;

use App\Models\Cart;

class CartRepository extends Repository
{

    public function all()
    {
        return Cart::all();
    }

    public function find($value)
    {
        return Cart::find($value);
    }

    public function findBy($column, $value)
    {
        return Cart::where($column, $value)->first();
    }

    public function findByAll($column, $value)
    {
        return Cart::where($column, $value)->get();
    }

    public function findByAttributes($attributes)
    {
        $response = null;
        foreach ($attributes as $column => $value) {
            $response = $response == null ? Cart::where($column, $value) : $response->where($column, $value);
        }
        return $response == null ? $response : $response->first();
    }

    public function findByAllAttributes($attributes)
    {
        $response = null;
        foreach ($attributes as $column => $value) {
            $response = $response == null ? Cart::where($column, $value) : $response->where($column, $value);
        }
        return $response == null ? $response : $response->get();
    }

}
