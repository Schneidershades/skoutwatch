<?php

namespace App\Services;

use App\Models\User;
use App\Models\Attribute;
use App\Traits\Api\ApiResponder;
use App\Traits\Web3Mint\Holaplex;

class ProcessNftService
{
    use ApiResponder;

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
            'symbol' => 'nini',
            'description' => "This process will mint the attributes of $fullName",
            'image' => $storeImageValue ? stripslashes($storeImageValue) : stripslashes("https://www.canada.ca/etc/designs/canada/wet-boew/assets/sig-blk-en.svg"),
            'attributes' =>  []
        ];


        foreach($request['attributes'] as $att){
            $player['attributes'][] = [ "traitType" => $att['attribute'], "value" => (string)$att['score'] ];
        }

        $mintAsset = (new Holaplex())->mintCollection($player);

        if($mintAsset['success'] == false){
            return $this->errorResponse('Unable to process minting service', 400);
        }

        $user->playerMints()->create([
            'mint_id' => $mintAsset['mint_id'],
            'blockchain_source' => 'Holaplex',
        ]);

        $this->processMintTraces($user, $request, $mintAsset['mint_id']);

        return $this->showMessage('Minted Successfully');

    }


    public function processMintTraces(User $user, $request, $mint_id)
    {
        foreach($request['attributes'] as $att){
            $attribute = Attribute::where('name', $att['attribute'])->first();

            $user->attributes()->create([
                'attribute_id' => $attribute->id,
                'score' => (string)$att['score'],
                'mint_id' => $mint_id,
                'attribute_category_id' => $attribute->attributeCategory->id
            ]);
        }
    }
}
