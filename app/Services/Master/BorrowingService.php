<?php

namespace App\Services\Master;

use App\Models\Master\Borrowing;
use App\Models\Master\Book;
use Illuminate\Http\Request;

class BorrowingService
{
    public function preRequisite(): array
    {
        $list = Book::get();
        $book = [];
        foreach ($list as $item => $value) {
            $book[] = [
                'value' => $value->id, 
                'label' => $value->title,
                'label' => $value->name,
                'label' => $value->number,
                'label' => $value->publisher,
                'label' => $value->description,
            ];
        }
        return compact('book');
    }
    
    public function create(Request $request): Borrowing
    {
        $borrowing = Borrowing::forceCreate($this->formatParams($request));


        return $borrowing;
    }

    private function formatParams(Request $request, ?Borrowing $borrowing = null): array
    {
        return [
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ','-',$request->name)),
            'book_id' => $request->book,
            'date' => $request->date,
        ];
    }

    public function update(Request $request, Borrowing $borrowing): void
    {
        $borrowing->forceFill($this->formatParams($request, $borrowing))->save();
    }

    public function deletable(Borrowing $borrowing): void
    {
    }
}
