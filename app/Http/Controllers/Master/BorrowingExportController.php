<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Services\Master\BorrowingListService;
use Illuminate\Http\Request;

class BorrowingExportController extends Controller
{
    public function __invoke(Request $request, BorrowingListService $service)
    {
        $list = $service->list($request);

        return $service->export($list);
    }
}
