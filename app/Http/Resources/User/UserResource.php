<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'               => $this->id,
            'name'             => $this->name,
            'email'            => $this->email,
            'address'          => $this->address,
            'id_personal'      => $this->id_personal,
            'personal_photos'  => $this->getFirstMediaUrl('default'),
            'id_photo'         => $this->getFirstMediaUrl('id_photo'),
            'updated_at'       => $this->updated_at->format('Y m d'),
            'created_at'       => $this->created_at->format('Y m d'),
        ];
    }
}
