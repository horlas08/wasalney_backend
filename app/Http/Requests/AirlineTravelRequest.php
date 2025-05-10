<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AirlineTravelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Assuming we're using controller policies for authorization
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'departure_city' => ['required', 'string', 'max:100'],
            'arrival_city' => ['required', 'string', 'max:100', 'different:departure_city'],
            'departure_date' => ['required', 'date', 'after_or_equal:today'],
            'number_of_passengers' => ['required', 'integer', 'min:1', 'max:20'],
            'travel_class' => ['required', Rule::in(['economy', 'business', 'first'])],
            'trip_type' => ['required', Rule::in(['one_way', 'round_trip'])],
            'special_requirements' => ['nullable', 'string', 'max:1000'],
        ];

        // Add return_date validation only if it's a round trip
       if ($this->input('trip_type') === 'round_trip') {
            $rules['return_date'] = ['required', 'date', 'after_or_equal:departure_date'];
        } else {
            $rules['return_date'] = ['nullable', 'date'];
        }

        return $rules;
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'departure_city.required' => 'مدينة المغادرة مطلوبة',
            'arrival_city.required' => 'مدينة الوصول مطلوبة',
            'arrival_city.different' => 'يجب أن تكون مدينة الوصول مختلفة عن مدينة المغادرة',
            'departure_date.required' => 'تاريخ المغادرة مطلوب',
            'departure_date.after_or_equal' => 'يجب أن يكون تاريخ المغادرة اليوم أو في المستقبل',
            'return_date.required' => 'تاريخ العودة مطلوب للرحلات ذهاب وعودة',
            'return_date.after_or_equal' => 'يجب أن يكون تاريخ العودة بعد أو يساوي تاريخ المغادرة',
            'number_of_passengers.required' => 'عدد الركاب مطلوب',
            'number_of_passengers.min' => 'يجب أن يكون عدد الركاب على الأقل :min',
            'number_of_passengers.max' => 'عدد الركاب لا يمكن أن يتجاوز :max',
            'travel_class.required' => 'درجة السفر مطلوبة',
            'travel_class.in' => 'درجة السفر يجب أن تكون اقتصادية، رجال أعمال، أو درجة أولى',
            'trip_type.required' => 'نوع الرحلة مطلوب',
            'trip_type.in' => 'نوع الرحلة يجب أن يكون ذهاب فقط أو ذهاب وعودة',
            'special_requirements.max' => 'المتطلبات الخاصة لا يمكن أن تتجاوز :max حرف',
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        // Convert empty strings to null for nullable fields
        $this->merge([
            'special_requirements' => $this->special_requirements ?: null,
            'return_date' => $this->return_date ?: null,
        ]);
    }

    /**
     * Handle a failed validation attempt for API requests.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        // If this is an API request, return JSON error response instead of redirecting
        if ($this->expectsJson() || $this->is('api/*')) {
            throw new HttpResponseException(response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors()
            ], 422));
        }

        // Otherwise, let the parent handle it (which will likely redirect)
        parent::failedValidation($validator);
    }
}
