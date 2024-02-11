<?php

namespace App\Repositories;

use App\Models\ShippingMethod;

class ShippingMethodRepository extends Repository
{

    public function all()
    {
        return ShippingMethod::all();
    }

    public function find($value)
    {
        return ShippingMethod::find($value);
    }

    public function findBy($column, $value)
    {
        return ShippingMethod::where($column, $value)->first();
    }

    public function findByAll($column, $value)
    {
        return ShippingMethod::where($column, $value)->get();
    }

    public function findByAttributes($attributes)
    {
        $response = null;
        foreach ($attributes as $column => $value) {
            $response = $response == null ? ShippingMethod::where($column, $value) : $response->where($column, $value);
        }
        return $response == null ? $response : $response->first();
    }

    public function findByAllAttributes($attributes)
    {
        $response = null;
        foreach ($attributes as $column => $value) {
            $response = $response == null ? ShippingMethod::where($column, $value) : $response->where($column, $value);
        }
        return $response == null ? $response : $response->get();
    }

}
