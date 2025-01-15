<?php

namespace Core\Crud;

use Core\Token\Token;

class InsertOrUpdate extends Insert
{
    protected $table = 'session';

    public function insertOrUpdate(array $input)
    {
        if (!$this->insert($input)->getResult()) {
            $update = new Update;
            $update->__invoke($this->table)->update($input)->getResult();
        }
        return $this;
    }
}
