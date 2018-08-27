<?php

namespace App\Http\Repositories\Base;

abstract class BaseRepository
{

    abstract public function getModel();

    public function create(array $data)
    {
        return $this->getModel()->create($data);
    }

    /**
     * BUSCA UN REGISTRO DE LA BASE DE DATOS QUE COINCIDA CON EL ATRIBUTO Y EL VALOR PASADO!
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = array('*'))
    {
        return $this->getModel()->where($attribute, '=', $value)->first();
    }

}
