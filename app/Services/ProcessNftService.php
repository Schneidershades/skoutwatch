<?php

namespace App\Services;

use App\Models\User;
use App\Models\Attribute;
use App\Models\PlayerAttribute;
use App\Traits\Web3Mint\Underdog;

class ProcessNftService
{
    public function playerProcess(User $user, $request)
    {
        $player = [
            'id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'nin' => $user->nin,
            'age' => $user->age,
            'description' => null,
            'image' => null,
            'attributes' => []
        ];

        foreach($request['attributes'] as $att){

            $attribute = Attribute::where('name', $att['attribute'])->first();

            $storeAttribute = PlayerAttribute::create([
                'player_id' => $user->id,
                'attribute_id' => $attribute->id,
                'score' => $att['score'],
            ]);

            $player['attributes'][] = [ $attribute->name => $storeAttribute->score ];

        }

        return $sendInfoToBlockchain = (new Underdog())->createNfts($player);

        $user->update(['nft_id' => $sendInfoToBlockchain->id]);
    }
}
