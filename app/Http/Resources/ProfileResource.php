<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'address' => $this->address,
            'gender'=>$this->gender,
            'dob'=>$this->dob,
            'experince'=>$this->experince,
            'description'=>$this->description,
            'bio'=>$this->bio,
            'resume'=>$this->resume,
            'avatr'=>$this->avatr,
            'coverPhoto'=>$this->coverPhoto,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
            'user'=> new CatogryResource($this->whenLoaded('user'))
        ];
    }
}
