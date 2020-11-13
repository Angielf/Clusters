<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function add(Request $request)
    {
        if($request->hasFile('instruction')) {
            $file = $request->file('instruction');
            $file_name = $file;
            $file->move(public_path() . '/files/instructions/', $file_name);

            return redirect('/')->with('success', 'Файл добавлен!');
        }
    }

    public function add2(Request $request)
    {
        if($request->hasFile('public')) {
            $file = $request->file('public');
            $file_name = $file;
            $file->move(public_path() . '/', $file_name);

            return redirect('/')->with('success', 'Файл добавлен!');
        }
    }
}
