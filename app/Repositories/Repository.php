<?php

namespace App\Repositories;

class Repository
{
    public function save($model)
    {
        $model->save();
        return $model;
    }

    public function update($model)
    {
        return $this->save($model);
    }

    public function delete($model)
    {
        $model->delete();
    }
}
