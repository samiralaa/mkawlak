<?php

namespace App\Http\Resources\Company;

use Illuminate\Http\Request;
use App\Http\Resources\Project\ProjectResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'name_company'                 => $this->name_company,
            'address'                      => $this->address,
            'address_company'              => $this->address_company,
            'email'                        => $this->email,
            'id_personal'                  => $this->id_personal,
            'company_type'                 => $this->company_type,
            'commercial_register'          => $this->commercial_register,
            'citys'                        => $this->citys,
            'majors'                       => $this->majors,
            'personal_photos'              => $this->getFirstMediaUrl('default'),
            'id_photo'                     => $this->getFirstMediaUrl('id_photo'),
            'commercial_registration_file' => $this->getFirstMediaUrl('commercial_registration_file'),
            'company_profile'              => $this->getFirstMediaUrl('company_profile'),
            'updated_at'                   => $this->updated_at->format('Y m d'),
            'created_at'                   => $this->created_at->format('Y m d'),
            'projects'                     => ProjectResource::collection($this->whenLoaded('projects')),
        ];
    }
}
