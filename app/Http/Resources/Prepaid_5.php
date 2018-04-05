<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Prepaid_5 extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' =>$this->id,
            'serial_number' =>$this->serial_number,
            'pin' =>$this->pin,
            'availability' =>$this->availability,
            'purchased_date' =>$this->purchased_date,
            'email' =>$this->email,
            'created_at' =>$this->created_at,
            'updated_at' =>$this->updated_at,
        ];
    }
}
