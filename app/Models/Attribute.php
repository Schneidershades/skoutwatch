<?php

namespace App\Models;

use App\Models\User;
use App\Models\AttributeCategory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Attribute\AttributeResource;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Http\Resources\Attribute\AttributeCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribute extends Model
{
    use HasFactory, HasUuids;

    public $oneItem = AttributeResource::class;

    public $allItems = AttributeCollection::class;

    protected $guarded = [];

    public function attributeCategory()
    {
        return $this->belongsTo(AttributeCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
