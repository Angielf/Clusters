<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index($id)
    {
        $bid = Bid::where('id', $id)->first();

        return view('program', compact('bid'));
    }

    public function add(Request $request, $id)
    {
        if($request->hasFile('program')) {
            $file = $request->file('program');
            $file_name = $id . time() . '.' . $request->program->extension();
            $file->move(public_path() . '/files/programs/', $file_name);

            $program = new Program([
                'filename' => $file_name,
                'bid_id' => $id,
            ]);

            $program->save();

            $bid = Bid::where('id', $id)->first();
            $bid->status = 1;
            $bid->save();

        }
        return redirect('/')->with('success', 'Программа добавленар добавлена!');
    }
}
