<?php

namespace App\Factory;

use App\Services\GlobalService;
use App\Models\StarbucksCustomer;
use Illuminate\Support\Facades\Hash;

class Starbucks extends BaseFirm
{
    /**
     * @param array $customerPayload
     *
     * @return StarbucksCustomer|null
     */
    public function record(array $customerPayload): ?StarbucksCustomer
    {
        $isChecked = GlobalService::checkTCIdentity($customerPayload);

        if (!$isChecked) {
            return null;
        }

        $customerPayload['identity_no'] = Hash::make($customerPayload['identity_no']);

        $customer = new StarbucksCustomer();
        $customer->create($customerPayload);

        return $customer;
    }

    /**
     * @return string
     */
    public function model(): string
    {
        return Starbucks::class;
    }
}
