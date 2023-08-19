<?php

namespace App\Http\Resources\Attribute;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayerAttributeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "score" => $this->score,
            "attribute" => $this->attribute->name,
            "category" => $this->attribute->attributeCategory->name,
        ];
    }
}
