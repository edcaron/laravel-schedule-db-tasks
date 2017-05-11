<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
          'name' => 'required|max:200',
          'command' => 'required|max:500',
          'minute' => 'required|max:2',
          'hour' => 'required|max:2',
          'month' => 'required|max:2',
          'day_of_month' => 'required|max:2',
          'day_of_week' => 'required|max:2',
          'send_output_to' => 'max:200'
          ];
    }
}
