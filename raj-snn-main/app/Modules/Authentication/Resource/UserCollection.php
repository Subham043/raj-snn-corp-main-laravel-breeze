<?php

namespace App\Modules\Authentication\Resource;

use Illuminate\Http\Resources\Json\JsonResource;

class UserCollection extends JsonResource
{

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->diffForHumans(),
            'email_verified_at' => $this->email_verified_at->diffForHumans(),
        ];
    }
}
