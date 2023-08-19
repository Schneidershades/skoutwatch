<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Attribute;
use App\Models\AttributeCategory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserCollection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    public $oneItem = UserResource::class;

    public $allItems = UserCollection::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function attributes()
    {
        return $this->hasMany(PlayerAttribute::class, 'user_id');
    }

    public function attributeCategories()
    {
        return $this->hasMany(AttributeCategory::class);
    }

    public function playerAttributes()
    {
        return $this->belongsToMany(Attribute::class, 'player_attributes');
    }

    public function playerMints()
    {
        return $this->hasMany(PlayerMint::class, 'user_id');
    }
    public function playerAttributePace()
    {
        return $this->hasMany(PlayerAttribute::class, 'user_id')
                    ->where('attribute_category_id', AttributeCategory::where('name', 'Pace')->first()->id)
                    ->avg('score');
    }

    public function playerAttributeShooting()
    {
        return $this->hasMany(PlayerAttribute::class, 'user_id')->where('attribute_category_id', AttributeCategory::where('name', 'Shooting')->first()->id)->avg('score');
    }

    public function playerAttributePassing()
    {
        return $this->hasMany(PlayerAttribute::class, 'user_id')->where('attribute_category_id', AttributeCategory::where('name', 'Passing')->first()->id)->avg('score');
    }

    public function playerAttributeDribbling()
    {
        return $this->hasMany(PlayerAttribute::class, 'user_id')->where('attribute_category_id', AttributeCategory::where('name', 'Dribbling')->first()->id)->avg('score');
    }

    public function playerAttributeDefending()
    {
        return $this->hasMany(PlayerAttribute::class, 'user_id')->where('attribute_category_id', AttributeCategory::where('name', 'Defending')->first()->id)->avg('score');
    }

    public function playerAttributePhysicality()
    {
        return $this->hasMany(PlayerAttribute::class, 'user_id')->where('attribute_category_id', AttributeCategory::where('name', 'Physicality')->first()->id)->avg('score');
    }

}
