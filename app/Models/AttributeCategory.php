<?php

namespace App\Models;

use App\Models\User;
use App\Models\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Http\Resources\Attribute\AttributeCategoryResource;
use App\Http\Resources\Attribute\AttributeCategoryCollection;

class AttributeCategory extends Model
{
    use HasFactory, HasUuids;

    public $oneItem = AttributeCategoryResource::class;

    public $allItems = AttributeCategoryCollection::class;

    protected $guarded = [];

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function playerAttributeCategories()
    {
        return $this->hasMany(PlayerAttribute::class, 'attribute_category_id');
    }
}
