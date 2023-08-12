<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeCategory;
use Illuminate\Database\Seeder;

class AttributeCategoryAndAttributesTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Pace', 'Shooting', 'Passing', 'Dribbling', 'Defending', 'Physicality'];

        foreach ($categories as $cat) {
            $cat = AttributeCategory::create([
                'name' => $cat,
            ]);

            $types = match ($cat->name) {
                'Pace' => ['Acceleration', 'Sprint Speed'],
                'Shooting' => ['Vision', 'Crossing', 'Freekick Accuracy', 'Short Passing', 'Long Passing', 'Curving'],
                'Passing' => ['Positioning', 'Finishing', 'Shot Power', 'Long Shots', 'Volleys', 'Penalties'],
                'Dribbling' => ['Agility', 'Balance', 'Reactions', 'Ball Control', 'Dribbling'],
                'Defending' => ['Interception', 'Head Accuracy', 'Defence Awareness', 'Standing Tackle', 'Sliding Tackle'],
                'Physicality' => ['Jumping', 'Stamina', 'Strength', 'Aggression'],
            };

            foreach ($types as $type) {
                Attribute::create([
                    'name' => $type,
                    'attribute_category_id' => $cat->id,
                ]);
            }
        }
    }
}
