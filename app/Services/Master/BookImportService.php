<?php

namespace App\Services\Master;

use App\Concerns\ItemImport;
use App\Imports\Master\BookImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BookImportService
{
    use ItemImport;

    public function import(Request $request)
    {
        $this->deleteLogFile('book');

        $this->validateFile($request);

        Excel::import(new BookImport, $request->file('file'));

        $this->reportError('book');
    }
}
