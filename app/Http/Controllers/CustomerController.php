<?php

namespace App\Http\Controllers;

use App\Factory\Portal;
use App\Factory\Starbucks;
use App\Factory\FirmFactory;
use Illuminate\Http\Request;
use App\Rules\HashedIdentityCheck;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $tableUnique = match ($request->firm) {
            'starbucks' => 'unique:starbucks_customers',
            'portal' => 'unique:portal_customers'
        };
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:50',
            'surname' => 'required|string|min:3|max:50',
            'identity_no' => ['required', 'string', 'min:11', 'max:11', $tableUnique, new HashedIdentityCheck($request->firm)],
            'birth_year' => 'required|integer',
        ], [
            'name.required' => 'Ad boş geçilemez',
            'surname.required' => 'Soyad boş geçilemez',
            'identity_no.min' => 'TC 11 haneli olmalı',
            'identity_no.unique' => 'Bu TC daha önce kaydedilmiş',
            'birth_year.required' => 'Doğum yılı boş geçilemez',
        ]);

        if ($validator->fails()) {
            return redirect('/customers')->withErrors($validator);
        }

        $class = match ($request->firm) {
          'starbucks' => new Starbucks(),
          'portal' => new Portal()
        };

        $firmFactory = new FirmFactory();
        $model = $firmFactory->create($class);
        $customer = $model->record($request->all());

        if (is_null($customer)) {
            return redirect('/customers')->with('error', 'Müşteri kayıt edilemedi');
        }

        return redirect('/customers')->with('success', 'Müşteri başarıyla kayıt edildi');
    }
}
