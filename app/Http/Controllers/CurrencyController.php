<?php

namespace App\Http\Controllers;

use App\Models\Currencies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CurrencyController extends Controller
{
    public function get()
    {
        $currencies = Currencies::all();

        return response()->json($currencies);
    }

    public function create(Request $request)
    {
        $currency = new Currencies();
        $currency->iso3 = $request->iso3;
        $currency->status = $request->status;
        $currency->save();

        return response("Currency " . $request->iso3 . " added");
    }

    public function delete(int $id)
    {
        $currency = Currencies::findOrFail($id);
        $currency->delete();
        return response('Currency with id ' . $id . ' deleted');
    }

    public function modify(int $id, Request $request)
    {
        $currency = Currencies::findOrFail($id);

        $validator = Validator::make(
            $request->all(),
            [
                'iso3' => 'required|size:3',
                'status' => 'required|integer|min:0|max:1'
            ],
            [
                'iso3.size' => 'ISO symbol must be 3 characters',
                'iso3.max' => 'ISO symbol must be 3 characters',
                'status.min' => 'status must be either 0 or 1',
                'status.max' => 'status must be either 0 or 1',
            ]
        )->validate();

        $currency->iso3 = $request->iso3;
        $currency->status = $request->status;
        $currency->save();
        return response('Currency updated successfully');
    }
}
