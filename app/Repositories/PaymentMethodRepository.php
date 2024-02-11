<?php

namespace App\Repositories;

use App\Models\PaymentMethod;

class PaymentMethodRepository extends Repository
{

    public function all()
    {
        return PaymentMethod::all();
    }

    public function find($value)
    {
        return PaymentMethod::find($value);
    }

    public function findBy($column, $value)
    {
        return PaymentMethod::where($column, $value)->first();
    }

    public function findByAll($column, $value)
    {
        return PaymentMethod::where($column, $value)->get();
    }

    public function findByAttributes($attributes)
    {
        $response = null;
        foreach ($attributes as $column => $value) {
            $response = $response == null ? PaymentMethod::where($column, $value) : $response->where($column, $value);
        }
        return $response == null ? $response : $response->first();
    }

    public function findByAllAttributes($attributes)
    {
        $response = null;
        foreach ($attributes as $column => $value) {
            $response = $response == null ? PaymentMethod::where($column, $value) : $response->where($column, $value);
        }
        return $response == null ? $response : $response->get();
    }

}
