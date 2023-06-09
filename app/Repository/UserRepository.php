<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository
{
    protected Model $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function get(array $data = [])
    {
        $query = $this->model;
        if (isset($data['email'])){
            $query = $query->where('email',$data['email']);
        }
        if (isset($data['name'])){
            $query = $query->where('name','like','%'.$data['name'].'%');
        }

        return $query->get();
    }
}
