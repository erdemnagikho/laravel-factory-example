<?php

namespace App\Factory;

use App\Models\PortalCustomer;
use Illuminate\Support\Facades\Hash;

class Portal extends BaseFirm
{
    /**
     * @param array $customerPayload
     *
     * @return PortalCustomer|null
     */
    public function record(array $customerPayload): ?PortalCustomer
    {
        $customerPayload['identity_no'] = Hash::make($customerPayload['identity_no']);

        $customer = new PortalCustomer();
        $customer->create($customerPayload);

        return $customer;
    }

    /**
     * @return string
     */
    public function model(): string
    {
        return Portal::class;
    }
}
