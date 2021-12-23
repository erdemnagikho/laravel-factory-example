<?php

namespace App\Factory\Contracts;

interface IFirm
{
    /**
     * @param array $customerPayload
     */
    public function record(array $customerPayload);
}
