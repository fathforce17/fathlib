<?php

namespace App\Services\Master;

use App\Contracts\ListGenerator;
use App\Http\Resources\Master\BookResource;
use App\Models\Master\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BookListService extends ListGenerator
{
    protected $allowedSorts = ['created_at', 'title'];

    protected $defaultSort = 'title';

    public function getHeaders(): array
    {
        $headers = [
            [
                'key' => 'title',
                'label' => trans('master.book.props.title'),
                'sortable' => true,
                'visibility' => true,
            ],
            [
                'key' => 'name',
                'label' => trans('master.book.props.name'),
                'sortable' => true,
                'visibility' => true,
            ],
            [
                'key' => 'number',
                'label' => trans('master.book.props.number'),
                'sortable' => true,
                'visibility' => true,
            ],
            [
                'key' => 'publisher',
                'label' => trans('master.book.props.publisher'),
                'sortable' => true,
                'visibility' => true,
            ],
            [
                'key' => 'description',
                'label' => trans('master.book.props.description'),
                'sortable' => true,
                'visibility' => true,
            ],
        ];

        if (request()->ajax()) {
            $headers[] = $this->actionHeader;
        }

        return $headers;
    }

    public function filter(Request $request): Builder
    {
        return Book::query()
            ->filter([
                'App\QueryFilters\LikeMatch:search,title,',
            ]);
    }

    public function paginate(Request $request): AnonymousResourceCollection
    {
        $sort = $this->getSort($this->allowedSorts, $this->defaultSort);
        $order = $this->getOrder($this->defaultOrder);
        $perPage = $this->getPageLength();
        $currentPage = $this->getCurrentPage();

        return BookResource::collection($this->filter($request)
                ->orderBy($sort, $order)
                ->paginate((int) $perPage, ['*'], 'current_page'))
        ->additional([
            'headers' => $this->getHeaders(),
        ]);
    }

    public function list(Request $request): AnonymousResourceCollection
    {
        return $this->paginate($request);
    }
}
