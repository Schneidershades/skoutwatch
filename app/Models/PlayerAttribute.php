<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerAttribute extends Model
{
    use HasFactory, HasUuids;

    public $oneItem = PlayerAttributeResource::class;

    public $allItems = PlayerAttributeCollection::class;

    protected $guarded = [];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function attributeCategory()
    {
        return $this->belongsTo(AttributeCategory::class);
    }

    public function player()
    {
        return $this->belongsTo(User::class);
    }
}
