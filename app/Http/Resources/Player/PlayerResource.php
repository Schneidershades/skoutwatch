<?php

namespace App\Http\Resources\Player;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Attribute\PlayerAttributeResource;

class PlayerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'initials' => substr($this->first_name, 0, 1).''.substr($this->last_name, 0, 1),
            'Pacing' => (int)$this->playerAttributePace(),
            'Shooting' => (int)$this->playerAttributeShooting(),
            'Passing' => (int)$this->playerAttributePassing(),
            'Dribbling' => (int)$this->playerAttributeDribbling(),
            'Defending' => (int)$this->playerAttributeDefending(),
            'Physicality' => (int)$this->playerAttributePhysicality(),
        ];
    }
}
