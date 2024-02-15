<?php

namespace App\Http\Resources\Master;

use App\Helpers\CalHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductCategoryResource extends JsonResource
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
            'title' => $this->title,
            'is_createtable' => $this->isEditable() && Auth::user()->can('productcategory:create'),
            'is_editable' => $this->isEditable() && Auth::user()->can('productcategory:edit'),
            'is_deletable' => $this->isEditable() && Auth::user()->can('productcategory:delete'),
            'is_readtable' => $this->isEditable() && Auth::user()->can('productcategory:read'),
            'created_at' => CalHelper::toDateTime($this->created_at),
            'updated_at' => CalHelper::toDateTime($this->updated_at),
        ];
    }
}
