<?php

namespace App\Http\Controllers;

use App\Appeal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appeals = Appeal::all()->where('user_id', Auth::user()->id);

        return view('appeals.index', compact('appeals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appeals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fio'=>'required',
            'class'=>'required',
            'subject'=>'required'
        ]);

        if (Auth::check()) {
            $user_id = Auth::user()->id;
        }

        $appeal = new Appeal([
            'fio' => $request->post('fio'),
            'class' => $request->post('class'),
            'subject' => $request->post('subject'),
            'status' => 'Рассмотрение',
//            'date_of_appeal' => date('Y-m-d H:i:s'),
            'comment' => $request->post('comment'),
            'user_id' => $user_id,
        ]);
        $appeal->save();
        return redirect('/appeals')->with('success', 'Аппеляция добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appeal  $appeal
     * @return \Illuminate\Http\Response
     */
    public function show(Appeal $appeal)
    {
        return view('appeals.show',compact('appeal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appeal  $appeal
     * @return \Illuminate\Http\Response
     */
    public function edit(Appeal $appeal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appeal  $appeal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appeal $appeal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appeal  $appeal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appeal $appeal)
    {
        //
    }
}
