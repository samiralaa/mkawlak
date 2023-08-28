<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Request;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Offer\OfferResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'name'        => $this->name,
            'location'    => $this->location,
            'requirement' => $this->requirement,
            'note'        => $this->note,
            //'space'       => $this->space,
            'building_type' => $this->building_type,
            'client_type' => $this->client_type,
            'type_employment' => $this->type_employment,
            'width'       => $this->width,
            'length'       => $this->length,
            'floors'       => $this->floors,
            'plan'       => $this->plan,
            'updated_at'  => $this->updated_at->format('Y m d'),
            'created_at'  => $this->created_at->format('Y m d'),
            'image'       => getIamgesMediaUrl($this->getMedia()),
            'image_plan'  => getIamgesMediaUrl($this->getMedia('plan')),
            'category'    => CategoryResource::make($this->whenLoaded('category')),
            'user'        => UserResource::make($this->whenLoaded('user')),
            'offers'      => OfferResource::collection($this->whenLoaded('offers')),
        ];
    }
}
