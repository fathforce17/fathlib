<?php

namespace App\Services\Master;

use App\Concerns\ItemImport;
use App\Imports\Master\BorrowingImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BorrowingImportService
{
    use ItemImport;

    public function import(Request $request)
    {
        $this->deleteLogFile('borrowing');

        $this->validateFile($request);

        Excel::import(new BorrowingImport, $request->file('file'));

        $this->reportError('borrowing');
    }
}
