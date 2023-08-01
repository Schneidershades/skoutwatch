<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory, HasUuids;
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
