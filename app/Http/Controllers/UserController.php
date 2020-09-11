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
}
