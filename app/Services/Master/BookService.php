<?php

namespace App\Services\Master;

use App\Models\Master\Book;
use Illuminate\Http\Request;

class BookService
{
    public function create(Request $request): Book
    {
        $book = Book::forceCreate($this->formatParams($request));

        return $book;
    }

    private function formatParams(Request $request, ?Book $book = null): array
    {
        return [
            'title' => $request->title,
            'name' => $request->name,
            'publisher' => $request->publisher,
            'description' => $request->description,
            'number' => $request->number,
            'slug' => strtolower(str_replace(' ','-',$request->title)),
        ];
    }

    public function update(Request $request, Book $book): void
    {
        $book->forceFill($this->formatParams($request, $book))->save();

    }

    public function deletable(Book $book): void
    {
    }
}
