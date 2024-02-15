<?php

namespace App\Services\Master;

use App\Contracts\ListGenerator;
use App\Http\Resources\Master\BorrowingResource;
use App\Models\Master\Borrowing;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BorrowingListService extends ListGenerator
{
    protected $allowedSorts = ['created_at', 'name'];

    protected $defaultSort = 'name';

    public function getHeaders(): array
    {
        $headers = [
            [
                'key' => 'name',
                'label' => trans('master.borrowing.props.name'),
                'sortable' => true,
                'visibility' => true,
            ],
            [
                'key' => 'book',
                'label' => trans('master.book.book'),
                'print_label' => 'booktitle',
                'sortable' => false,
                'visibility' => true,
            ],
            [
                'key' => 'book',
                'label' => trans('master.book.book1'),
                'print_label' => 'bookname',
                'sortable' => false,
                'visibility' => true,
            ],
            [
                'key' => 'book',
                'label' => trans('master.book.book2'),
                'print_label' => 'booknumber',
                'sortable' => false,
                'visibility' => true,
            ],
            [
                'key' => 'book',
                'label' => trans('master.book.book3'),
                'print_label' => 'bookpublisher',
                'sortable' => false,
                'visibility' => true,
            ],
            [
                'key' => 'book',
                'label' => trans('master.book.book4'),
                'print_label' => 'bookdescription',
                'sortable' => false,
                'visibility' => true,
            ],
            [
                'key' => 'date',
                'label' => trans('master.borrowing.props.date'),
                'sortable' => false,
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
        $query = Borrowing::query()
            ->filter([
                'App\QueryFilters\LikeMatch:search,name,date',
            ]);
        return $query;

    }

    public function paginate(Request $request): AnonymousResourceCollection
    {
        $sort = $this->getSort($this->allowedSorts, $this->defaultSort);
        $order = $this->getOrder($this->defaultOrder);
        $perPage = $this->getPageLength();
        $currentPage = $this->getCurrentPage();

        return BorrowingResource::collection($this->filter($request)
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
