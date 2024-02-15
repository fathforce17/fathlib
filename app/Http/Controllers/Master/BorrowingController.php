<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\BorrowingRequest;
use App\Http\Resources\Master\BorrowingResource;
use App\Models\Master\Borrowing;
use App\Services\Master\BorrowingListService;
use App\Services\Master\BorrowingService;
use Illuminate\Http\Request;

class BorrowingController extends Controller
{
    public function preRequisite(Request $request, BorrowingService $service)
    {
        return response()->ok($service->preRequisite($request));
    }

    public function index(Request $request, BorrowingListService $service)
    {
        return $service->paginate($request);
    }

    public function store(BorrowingRequest $request, BorrowingService $service)
    {
        $borrowing = $service->create($request);

        return response()->success([
            'message' => trans('global.created', ['attribute' => trans('master.borrowing.borrowing')]),
            'borrowing' => BorrowingResource::make($borrowing),
        ]);
    }

    public function show(Borrowing $borrowing): BorrowingResource
    {
        return BorrowingResource::make($borrowing);
    }

    public function update(BorrowingRequest $request, Borrowing $borrowing, BorrowingService $service)
    {
        $service->update($request, $borrowing);

        return response()->success([
            'message' => trans('global.updated', ['attribute' => trans('master.borrowing.borrowing')]),
        ]);
    }

    public function destroy(Borrowing $borrowing)
    {
        $borrowing->delete();

        return response()->success([
            'message' => trans('global.deleted', ['attribute' => trans('master.borrowing.borrowing')]),
        ]);
    }

    public function download(Borrowing $borrowing, $uuid)
    {
        return $borrowing->downloadMedia($uuid);
    }
}
