<?php

namespace App\Http\Resources\Project;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Company\CompanyResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                  => $this->id,
            'city'                => $this->city,
            'description'         => $this->description,
            'project_duration'    => $this->project_duration,
            'customer_evaluation' => $this->customer_evaluation,
            'updated_at'          => $this->updated_at->format('Y m d'),
            'created_at'          => $this->created_at->format('Y m d'),
            'image'               => getIamgesMediaUrl($this->getMedia()),
            'company'             => CompanyResource::make($this->whenLoaded('company')),
            'category'            => CategoryResource::make($this->whenLoaded('category')),
        ];
    }
}
