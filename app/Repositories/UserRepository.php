<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends Repository
{

    public function all()
    {
        return User::all();
    }

    public function find($value)
    {
        return User::find($value);
    }

    public function findBy($column, $value)
    {
        return User::where($column, $value)->first();
    }

    public function findByAll($column, $value)
    {
        return User::where($column, $value)->get();
    }

    public function findByAttributes($attributes)
    {
        $response = null;
        foreach ($attributes as $column => $value) {
            $response = $response == null ? User::where($column, $value) : $response->where($column, $value);
        }
        return $response == null ? $response : $response->first();
    }

    public function findByAllAttributes($attributes)
    {
        $response = null;
        foreach ($attributes as $column => $value) {
            $response = $response == null ? User::where($column, $value) : $response->where($column, $value);
        }
        return $response == null ? $response : $response->get();
    }

}
