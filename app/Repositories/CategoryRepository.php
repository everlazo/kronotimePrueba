<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends Repository
{

    public function all()
    {
        return Category::all();
    }

    public function find($value)
    {
        return Category::find($value);
    }

    public function findBy($column, $value)
    {
        return Category::where($column, $value)->first();
    }

    public function findByAll($column, $value)
    {
        return Category::where($column, $value)->get();
    }

    public function findByAttributes($attributes)
    {
        $response = null;
        foreach ($attributes as $column => $value) {
            $response = $response == null ? Category::where($column, $value) : $response->where($column, $value);
        }
        return $response == null ? $response : $response->first();
    }

    public function findByAllAttributes($attributes)
    {
        $response = null;
        foreach ($attributes as $column => $value) {
            $response = $response == null ? Category::where($column, $value) : $response->where($column, $value);
        }
        return $response == null ? $response : $response->get();
    }

}
