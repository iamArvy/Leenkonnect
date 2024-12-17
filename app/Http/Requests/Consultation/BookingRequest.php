<?php

namespace App\Http\Requests\Consultation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class BookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'nullable|string|max:255',
            'specialisation_id' => 'required|exists:specialisations,id',
            'date' => 'required|date',
            'time' => [
                'required',
                'date_format:H:i',
                'after:09:59',
                'before:17:01',
                Rule::unique('bookings')->where(function ($query) {
                    return $query->where('specialisation_id', $this->specialisation_id)
                                 ->where('date', $this->date);
                }),
            ],
        ];
    }

    public function messages()
    {
        return [
            'time.unique' => 'This time slot is already booked for the selected specialisation.',
        ];
    }
}
