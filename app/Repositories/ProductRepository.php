<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends Repository
{

    public function all()
    {
        return Product::all();
    }

    public function find($value)
    {
        return Product::find($value);
    }

    public function findBy($column, $value)
    {
        return Product::where($column, $value)->first();
    }

    public function findByAll($column, $value)
    {
        return Product::where($column, $value)->get();
    }

    public function findByAttributes($attributes)
    {
        $response = null;
        foreach ($attributes as $column => $value) {
            $response = $response == null ? Product::where($column, $value) : $response->where($column, $value);
        }
        return $response == null ? $response : $response->first();
    }

    public function findByAllAttributes($attributes)
    {
        $response = null;
        foreach ($attributes as $column => $value) {
            $response = $response == null ? Product::where($column, $value) : $response->where($column, $value);
        }
        return $response == null ? $response : $response->get();
    }

}
