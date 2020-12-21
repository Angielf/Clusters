<?php

namespace App\Http\Controllers;

use App\Bid;
use App\Program;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    private const BID_AOPROVED = 1;
    private const PROGRAM_NEW = 9;

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

            // $user_of_program = $request->program->sender();
            $id_of_user = Auth::user()->id;
            $user_of_program = User::where('id', $id_of_user)->first();
            $school_program_id = $user_of_program->id;


            $program = new Program([
                'filename' => $file_name,
                'bid_id' => $id,
                'school_program_id' => $school_program_id,
            ]);

            $program->save();

            $bid = Bid::where('id', $id)->first();
            // $bid->status = self::BID_AOPROVED;
            $bid->status = self::PROGRAM_NEW;
            if ($cluster = $user->cluster) {
                $bid->cluster_id = $cluster->id;
            }

            $bid->save();

        }
        return redirect('/')->with('success', 'Программа добавлена!');
    }


    public function delete(Program $program)
    {
        $program->delete();

        return redirect('/');
    }

    public function approve(Program $program)
    {
        $program->status = 1;

        $bid = Bid::where('id', $program->bid->id)->first();
        $bid->status = 1;
        $program->save();
        $bid->save();

        return redirect('/');
    }
}
