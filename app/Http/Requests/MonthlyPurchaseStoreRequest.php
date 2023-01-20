<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;



class MonthlyPurchaseStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'description' => 'required',
            'price' =>  'required|regex:/^\d+(\.\d{1,2})?$/',
            'tags' => 'required',
            'is_paid' => 'required',
            'paid_by' => 'required',
            'same_price' => 'required',
            'start_date' => 'required'
        ];
    }

    public function prepareForValidation()
    {
        $price = $this->get('price');

        $this->merge([
            'price' => Str::replace(',', '.', $price)
        ]);
    }
}
