<?php

namespace App\Rules;

use App\Models\PortalCustomer;
use App\Models\StarbucksCustomer;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class HashedIdentityCheck implements Rule
{
    private string $firm;

    /**
     * HashedIdentityCheck constructor.
     *
     * @param string $firm
     */
    public function __construct(string $firm)
    {
        $this->firm = $firm;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed   $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $identities = match ($this->firm) {
            'starbucks' =>  $identities = StarbucksCustomer::pluck('identity_no'),
            'portal' =>  $identities = PortalCustomer::pluck('identity_no'),
        };

        foreach ($identities->all() as $identity) {
            if (Hash::check($value, $identity)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Bu kimlik numarası daha önce kayıt edilmiş!';
    }
}
