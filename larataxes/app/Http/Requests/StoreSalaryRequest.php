<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalaryRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'oklad' => 'required',
            'norma_in_month' => 'required',
            'otrabotano_days' => 'required',
            'nalog_vichet' => 'required',
            'calendar_god' => 'required',
            'calendar_month' => 'required',
            'is_pensioner' => 'required',
            'is_disabled_person' => 'required',
        ];
    }
}
