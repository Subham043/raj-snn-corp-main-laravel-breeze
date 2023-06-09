<?php

namespace App\Modules\Profile\Request;

use App\Modules\Authentication\Model\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Stevebauman\Purify\Facades\Purify;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }

    /**
     * Attempt to create the banner's information.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateProfile(): void
    {
        $this->user()->fill(
            Purify::clean($this->validated())
        );

        // if ($this->user()->isDirty('email')) {
        //     $this->user()->email_verified_at = null;
        // }

        $this->user()->save();
    }
}
