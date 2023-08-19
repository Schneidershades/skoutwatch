<?php

namespace App\Services;

use App\Models\User;
use App\Models\Attribute;
use App\Traits\Web3Mint\Holaplex;

class ProcessNftService
{
    public function playerProcess(User $user, $request)
    {
        $fullName = $user->first_name .' '.$user->last_name;

        $storeImageValue =  null;

        if ($request['image']) {
            $imageAttributes = 'data:image/jpg;base64,'.$request['image'];
            $imageValue = (new DocumentConversionService())->fileStorage($imageAttributes, $user);
            $storeImageValue = (new DocumentConversionService())->storeImage($imageValue['storage']);
        }

        $player = [
            'name' => $fullName,
            'symbol' => 'cece',
            'description' => "This process will mint the attributes of $fullName",
            'image' => $storeImageValue ? $storeImageValue : "https://www.canada.ca/etc/designs/canada/wet-boew/assets/sig-blk-en.svg",
            'attributes' =>  []
        ];


        foreach($request['attributes'] as $att){

            $attribute = Attribute::where('name', $att['attribute'])->first();

            $player['attributes'][] = [ "traitType" => $att['attribute'], "value" => (string)$att['score'] ];

        }

        return $sendInfoToBlockchain = (new Holaplex())->mintCollection($player);

        $user->attributes()->create([
            'mint_id' => $sendInfoToBlockchain['mint_id'],
            'blockchain_source' => $sendInfoToBlockchain['blockchain_source'],
        ]);

    }
}
