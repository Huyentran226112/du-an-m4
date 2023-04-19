<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);
        $data['price'] = number_format($this->price);
        $data['image'] = 'http://127.0.0.1:8000/public/assets/product/'.$this->image;
        return $data;
    }
}
