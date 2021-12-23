<?php

namespace App\Factory;

class FirmFactory
{
    public function create($class)
    {
        return new $class;
    }
}
