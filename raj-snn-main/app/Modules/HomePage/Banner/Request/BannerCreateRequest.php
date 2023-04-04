<?php

namespace App\Modules\HomePage\Banner\Request;

use App\Modules\HomePage\Banner\Model\HomeBanner;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Purify\Facades\Purify;

class BannerCreateRequest extends FormRequest
{
    private $homeBannerModel;

    public function __construct(HomeBanner $homeBannerModel)
    {
        $this->homeBannerModel = $homeBannerModel;
    }
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
            'title' => ['required', 'string', 'max:200'],
            'sub_title' => ['required', 'string', 'max:500'],
            'image' => ['required', 'image'],
        ];
    }

    /**
     * Attempt to create the banner's information.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(): void
    {
        $validated = Purify::clean($this->only('title', 'sub_title'));
        if($this->hasFile('image') && $this->file('image')->isValid()){
            $image = $this->file('image');
            $image_name = $image->hashName();
            $this->image->storeAs($this->homeBannerModel->image_path,$image_name);
        }
        $data = $this->homeBannerModel->create([
            ...$validated,
            'image' => $image_name
        ]);
        $data->user_id = $this->user()->id;
        $data->save();
    }
}
