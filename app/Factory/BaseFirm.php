<?php

namespace App\Factory;

use Exception;
use App\Factory\Contracts\IFirm;

abstract class BaseFirm implements IFirm
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->getModelClass();
    }

    /**
     * @param array $customerPayload
     */
    public abstract function record(array $customerPayload);

    /**
     * @return mixed
     *
     * @throws Exception
     */
    protected function getModelClass(): mixed
    {
        if (!method_exists($this, 'model')) {
            throw new Exception('No model defined');
        }

        return $this->model();
    }
}
