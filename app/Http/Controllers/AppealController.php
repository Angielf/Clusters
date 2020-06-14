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
        if (Auth::user()->id === 1) {
            return view('appeals.edit', compact('appeal'));
        }
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
        $request->validate([
            'date_of_appeal' => 'required',
            'status' => 'required',
        ]);

        $appeal->update($request->all());


        return redirect()->route('home')
            ->with('success','Аппеляция изменена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appeal $appeal
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Appeal $appeal)
    {
        $appeal->delete();

        return redirect()->route('appeals.index')
            ->with('success','Аппеляция удалена');
    }
}
