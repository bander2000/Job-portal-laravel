<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'status'=>$this->status,
            'minSalary'=>$this->minSalary,
            'maxSalary'=>$this->maxSalary,
            'type'=>$this->type,
            'description'=>$this->description,
            'location'=>$this->location,
            'education'=>$this->education,
            'lastDate'=>$this->lastDate,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at
        ];
    }
}
