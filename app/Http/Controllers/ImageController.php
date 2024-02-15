<?php

namespace App\Http\Controllers;

use App\Concerns\HasStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    use HasStorage;

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // $imageName = (string) Str::uuid().'.'.$request->image->extension();

        $url = $this->uploadFile(
            visibility: 'public',
            path: 'images',
            input: 'image',
            url: true
        );

        return response()->success(['url' => $url]);
    }
}
