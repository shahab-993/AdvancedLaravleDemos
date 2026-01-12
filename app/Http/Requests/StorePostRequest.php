<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'firstnaem'=>['required','string','min:5','max:15'],
            'lastname'=>['required','string','min:3','max:50','uppercase'],
            'middlename'=>['required','string','min:3','max:50','regex:/^[a-zA-Z\s]*$/'],
            'password'=>['requird','min:5','max:15','confirmed'],
            'password_confirmation'=>['requird','min:5','max:15'],
            'gender'=>['required'],
            'birthdate'=>['required','date','befor:today'],
            'hire_date'=>['required','date','after:today','date_format::Y-m-d'],
            'email'=>['required','email','unique:canidate','ends_with:@gmail.com'],
            'phone'=>['required','numeric','digits_between:10,13','unique:candidate'],
            'postalcode'=>['required','numeric','min:4','max:7'],
            'websiteurl'=>['required','url'],
            'termsandconditions'=>['required','accepted'],
            'role'=>['required','in:admin,moderator,rehular'],
            'age'=>['required','integer','digits_between:2,2'],
            'salary'=>['nullable','numric','decimal:2','min:10000','max:100000'],
            'profile_picture'=>['nullable','image','mimes:jpeg,png,jpg'],
            'amount'=>['nullable','numeric','multipale_of:5'],
            'secondary-email'=>['nullable','email','different:email'],

        ];
    }
    public function messages(): array
    {
        return [
            'firstname.required'=>'The name field is required.',
            'lastname.requird'=>'The username field is requird.',
            'email.unique'=>'The email has already been taken.'
        ];
    }
}
