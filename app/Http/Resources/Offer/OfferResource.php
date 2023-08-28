<?php

namespace App\Http\Resources\Offer;

use App\Http\Resources\Company\CompanyResource;
use App\Http\Resources\Post\PostResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'price'             => $this->price,
            'expected_duration' => $this->expected_duration,
            'Work_details'      => $this->Work_details,
            'note'              => $this->note,
            "updated_at"        => $this->updated_at->format('Y m d'),
            'created_at'        => $this->created_at->format('Y m d'),
            'post'              => PostResource::make($this->whenLoaded('post')),
            'company'           => CompanyResource::make($this->whenLoaded('company')),
        ];
    }
}
