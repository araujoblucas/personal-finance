<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class PurchaseListRequest extends FormRequest
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
            'month' => 'nullable|integer',
            'year' => 'nullable|integer'
        ];
    }

    public function prepareForValidation()
    {
        $month_year = $this->get('month-year');

        if (empty($month_year)) {
            return;
        }

        list($year, $month) = (explode('-', $month_year));

        if($month && $year) {
            $this->merge([
                'year' => (int)$year,
                'month' => (int)$month,
            ]);
        }

    }
}
