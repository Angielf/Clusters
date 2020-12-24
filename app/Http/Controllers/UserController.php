<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    private const BASE_SCHOOL = 3;
    private const RECIPIENT_SCHOOL = 0;

    public function approve($id)
    {
        $user = User::where('id', $id)->first();
        $user->status = self::BASE_SCHOOL;

        $user->save();

        return redirect('/');
    }

    public function reject($id)
    {
        $user = User::where('id', $id)->first();
        $user->status = self::RECIPIENT_SCHOOL;

        $user->save();

        return redirect('/');
    }

    public function show_users()
    {
        $users = User::all()
        ->where('name', '!=', 'admin')
        ->where('name', '!=', 'admin2')
        ->where('fullname', '!=', 'Муниципальный координатор')
        ->where('district', '!=', '100');
        return view('clusters.organizations_list_reg', compact('users'));
    }

    public function show_user(User $user_org)
    {
        return view('clusters.org_inf', compact('user_org'));
    }

    public function update_inn(Request $request, User $user_org)
    {
        $inn = $request->input('inn');
        $user_org->update(['inn' => $inn]);

        return view('clusters.org_inf', compact('user_org'));
    }

    public function update_add(Request $request, User $user_org)
    {
        $add = $request->input('add');
        $user_org->update(['address' => $add]);

        return view('clusters.org_inf', compact('user_org'));
    }

    public function update_tel(Request $request, User $user_org)
    {
        $tel = $request->input('tel');
        $user_org->update(['tel' => $tel]);

        return view('clusters.org_inf', compact('user_org'));
    }

    public function update_email_real(Request $request, User $user_org)
    {
        $email_real = $request->input('email_real');
        $user_org->update(['email_real' => $email_real]);

        return view('clusters.org_inf', compact('user_org'));
    }

    public function update_web(Request $request, User $user_org)
    {
        $web = $request->input('website');
        $user_org->update(['website' => $web]);

        return view('clusters.org_inf', compact('user_org'));
    }
}
