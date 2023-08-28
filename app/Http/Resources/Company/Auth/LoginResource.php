<?php

namespace App\Http\Resources\Company\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                           => $this->id,
            'name'                         => $this->name,
            'email'                        => $this->email,
            'address'                      => $this->address,
            'id_personal'                  => $this->id_personal,
            'company_type'                 => $this->company_type,
            'personal_photos'              => $this->getFirstMediaUrl('default'),
            'id_photo'                     => $this->getFirstMediaUrl('id_photo'),
            'commercial_registration_file' => $this->getFirstMediaUrl('commercial_registration_file'),
            'company_profile'              => $this->getFirstMediaUrl('company_profile'),
            'updated_at'                   => $this->updated_at->format('Y m d'),
            'created_at'                   => $this->created_at->format('Y m d'),
            'expiration_token'             => $this->expiration_token,
            'token'                        => $this->token,
        ];
    }
}
