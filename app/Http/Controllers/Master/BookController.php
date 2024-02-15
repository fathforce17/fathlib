<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\BookRequest;
use App\Http\Resources\Master\BookResource;
use App\Models\Master\Book;

use App\Services\Master\BookListService;
use App\Services\Master\BookService;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request, BookListService $service)
    {
        return $service->paginate($request);
    }

    public function store(BookRequest $request, BookService $service)
    {
        $book = $service->create($request);

        return response()->success([
            'message' => trans('global.created', ['attribute' => trans('master.book.book')]),
            'book' => BookResource::make($book),
        ]);
    }

    public function show(Book $book): BookResource
    {
        return BookResource::make($book);
    }

    public function update(BookRequest $request, Book $book, BookService $service)
    {
        $service->update($request, $book);

        return response()->success([
            'message' => trans('global.updated', ['attribute' => trans('master.book.book')]),
        ]);
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return response()->success([
            'message' => trans('global.deleted', ['attribute' => trans('master.book.book')]),
        ]);
    }

    public function download(Book $book, $uuid)
    {
    }
}
