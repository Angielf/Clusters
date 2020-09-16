<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Program;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    private const BID_AOPROVED = 1;

    public function index($id)
    {
        $bid = Bid::where('id', $id)->first();

        return view('program', compact('bid'));
    }

    public function add(Request $request, $id)
    {
        $user = Auth::user();

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
            $bid->status = self::BID_AOPROVED;
            if ($cluster = $user->cluster) {
                $bid->cluster_id = $cluster->id;
            }

            $bid->save();

        }
        return redirect('/')->with('success', 'Программа добавленар добавлена!');
    }
}
