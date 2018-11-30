<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class API_Articles extends JsonResource
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

            "id"=>$this->id,
            "title"=>$this->title,
            "content"=>$this->content,
            "created_at"=>$this->created_at

        ];
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function with($request)
    {
        return [

            "Version"=>"1.0.0",
            "Author"=>"Yasser Ameur El Idrissi"

        ];
    }


}
