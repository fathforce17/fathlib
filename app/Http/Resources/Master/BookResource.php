<?php

namespace App\Http\Resources\Master;

use App\Helpers\CalHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'uuid' => $this->uuid,
            'name' => $this->name,
            'title' => $this->title,
            'number' => $this->number,
            'publisher' => $this->publisher,
            'description' => $this->description,
            'is_createtable' => $this->isEditable() && Auth::user()->can('book:create'),
            'is_editable' => $this->isEditable() && Auth::user()->can('book:edit'),
            'is_deletable' => $this->isEditable() && Auth::user()->can('book:delete'),
            'is_readtable' => $this->isEditable() && Auth::user()->can('book:read'),
            'created_at' => CalHelper::toDateTime($this->created_at),
            'updated_at' => CalHelper::toDateTime($this->updated_at),
        ];
    }
}
