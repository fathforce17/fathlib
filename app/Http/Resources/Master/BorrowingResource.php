<?php

namespace App\Http\Resources\Master;

use App\Helpers\CalHelper;
use App\Models\Master\Book;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class BorrowingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $book = Book::where('id', $this->book_id)->first();
        return [
            'uuid' => $this->uuid,
            'book' => $book->id,
            'booktitle' => $book->title,
            'bookname' => $book->name,
            'booknumber' => $book->number,
            'bookpublisher' => $book->publisher,
            'bookdescription' => $book->description,
            'name' => $this->name,
            'date' => $this->date,
            'is_createtable' => $this->isEditable() && Auth::user()->can('borrowing:create'),
            'is_editable' => $this->isEditable() && Auth::user()->can('borrowing:edit'),
            'is_deletable' => $this->isEditable() && Auth::user()->can('borrowing:delete'),
            'is_readtable' => $this->isEditable() && Auth::user()->can('borrowing:read'),
            'created_at' => CalHelper::toDateTime($this->created_at),
            'updated_at' => CalHelper::toDateTime($this->updated_at),
        ];
    }
}
