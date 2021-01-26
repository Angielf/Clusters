<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\User;
use App\MonthsHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonthsHourController extends Controller
{
    public function index($id)
    {
        $schedule = Schedule::where('id', $id)->first();

        return view('months_hours', compact('schedule'));
    }

    public function add(Request $request, $id)
    {

        $id_of_user = Auth::user()->id;
        $user_of_amount = User::where('id', $id_of_user)->first();
        $school_schedule_id = $user_of_amount->id;

        $months_hours = new MonthsHour([
            'schedule_id' => $id,
            'month_1' => $request->post('month_1'),
            'estimated_1' => $request->post('estimated_1'),
            'month_2' => $request->post('month_2'),
            'estimated_2' => $request->post('estimated_2'),
            'month_3' => $request->post('month_3'),
            'estimated_3' => $request->post('estimated_3'),
            'month_4' => $request->post('month_4'),
            'estimated_4' => $request->post('estimated_4'),
            'month_5' => $request->post('month_5'),
            'estimated_5' => $request->post('estimated_5'),
            'month_6' => $request->post('month_6'),
            'estimated_6' => $request->post('estimated_6'),
            'month_7' => $request->post('month_7'),
            'estimated_7' => $request->post('estimated_7'),
            'month_8' => $request->post('month_8'),
            'estimated_8' => $request->post('estimated_8'),
            'month_9' => $request->post('month_9'),
            'estimated_9' => $request->post('estimated_9'),
            'month_10' => $request->post('month_10'),
            'estimated_10' => $request->post('estimated_10'),
            'month_11' => $request->post('month_11'),
            'estimated_11' => $request->post('estimated_11'),
            'month_12' => $request->post('month_12'),
            'estimated_12' => $request->post('estimated_12'),
            'school_schedule_id' => $school_schedule_id,
        ]);

        $months_hours->save();

        return redirect('/')->with('success', 'месяц добавлен!');

    }

    public function delete(MonthsHour $months_hour)
    {
        $months_hour->delete();

        return redirect('/');
    }

    public function show_update(MonthsHour $months_hour)
    {
        return view('m_h_update', compact('months_hour'));
    }

    public function update_real_1(Request $request, MonthsHour $months_hour)
    {
        $real_1 = $request->input('real_1');
        $months_hour->update(['real_1' => $real_1]);
        $months_hour->update(['status_1' => 9]);

        return view('m_h_update', compact('months_hour'));
    }

    public function update_real_2(Request $request, MonthsHour $months_hour)
    {
        $real_2 = $request->input('real_2');
        $months_hour->update(['real_2' => $real_2]);
        $months_hour->update(['status_2' => 9]);

        return view('m_h_update', compact('months_hour'));
    }

    public function update_real_3(Request $request, MonthsHour $months_hour)
    {
        $real_3 = $request->input('real_3');
        $months_hour->update(['real_3' => $real_3]);
        $months_hour->update(['status_3' => 9]);

        return view('m_h_update', compact('months_hour'));
    }

    public function update_real_4(Request $request, MonthsHour $months_hour)
    {
        $real_4 = $request->input('real_4');
        $months_hour->update(['real_4' => $real_4]);
        $months_hour->update(['status_4' => 9]);

        return view('m_h_update', compact('months_hour'));
    }

    public function update_real_5(Request $request, MonthsHour $months_hour)
    {
        $real_5 = $request->input('real_5');
        $months_hour->update(['real_5' => $real_5]);
        $months_hour->update(['status_5' => 9]);

        return view('m_h_update', compact('months_hour'));
    }

    public function update_real_6(Request $request, MonthsHour $months_hour)
    {
        $real_6 = $request->input('real_6');
        $months_hour->update(['real_6' => $real_6]);
        $months_hour->update(['status_6' => 9]);

        return view('m_h_update', compact('months_hour'));
    }

    public function update_real_7(Request $request, MonthsHour $months_hour)
    {
        $real_7 = $request->input('real_7');
        $months_hour->update(['real_7' => $real_7]);
        $months_hour->update(['status_7' => 9]);

        return view('m_h_update', compact('months_hour'));
    }

    public function update_real_8(Request $request, MonthsHour $months_hour)
    {
        $real_8 = $request->input('real_8');
        $months_hour->update(['real_8' => $real_8]);
        $months_hour->update(['status_8' => 9]);

        return view('m_h_update', compact('months_hour'));
    }

    public function update_real_9(Request $request, MonthsHour $months_hour)
    {
        $real_9 = $request->input('real_9');
        $months_hour->update(['real_9' => $real_9]);
        $months_hour->update(['status_9' => 9]);

        return view('m_h_update', compact('months_hour'));
    }

    public function update_real_10(Request $request, MonthsHour $months_hour)
    {
        $real_10 = $request->input('real_10');
        $months_hour->update(['real_10' => $real_10]);
        $months_hour->update(['status_10' => 9]);

        return view('m_h_update', compact('months_hour'));
    }

    public function update_real_11(Request $request, MonthsHour $months_hour)
    {
        $real_11 = $request->input('real_11');
        $months_hour->update(['real_11' => $real_11]);
        $months_hour->update(['status_11' => 9]);

        return view('m_h_update', compact('months_hour'));
    }

    public function update_real_12(Request $request, MonthsHour $months_hour)
    {
        $real_12 = $request->input('real_12');
        $months_hour->update(['real_12' => $real_12]);
        $months_hour->update(['status_12' => 9]);

        return view('m_h_update', compact('months_hour'));
    }

    public function show_update_rez(MonthsHour $months_hour)
    {
        return view('m_h_update_rez', compact('months_hour'));
    }

    public function show_hours()
    {
        $months_hours = MonthsHour::all();
        return view('clusters.months_hours_list_reg', compact('months_hours'));
    }

    public function approve_1(MonthsHour $months_hour)
    {
        $months_hour->status_1 = 1;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function approve_2(MonthsHour $months_hour)
    {
        $months_hour->status_2 = 1;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function approve_3(MonthsHour $months_hour)
    {
        $months_hour->status_3 = 1;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function approve_4(MonthsHour $months_hour)
    {
        $months_hour->status_4 = 1;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function approve_5(MonthsHour $months_hour)
    {
        $months_hour->status_5 = 1;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function approve_6(MonthsHour $months_hour)
    {
        $months_hour->status_6 = 1;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function approve_7(MonthsHour $months_hour)
    {
        $months_hour->status_7 = 1;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function approve_8(MonthsHour $months_hour)
    {
        $months_hour->status_8 = 1;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function approve_9(MonthsHour $months_hour)
    {
        $months_hour->status_9 = 1;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function approve_10(MonthsHour $months_hour)
    {
        $months_hour->status_10 = 1;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function approve_11(MonthsHour $months_hour)
    {
        $months_hour->status_11 = 1;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function approve_12(MonthsHour $months_hour)
    {
        $months_hour->status_12 = 1;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function not_1(MonthsHour $months_hour)
    {
        $months_hour->status_1 = 2;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function not_2(MonthsHour $months_hour)
    {
        $months_hour->status_2 = 2;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function not_3(MonthsHour $months_hour)
    {
        $months_hour->status_3 = 2;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function not_4(MonthsHour $months_hour)
    {
        $months_hour->status_4 = 2;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function not_5(MonthsHour $months_hour)
    {
        $months_hour->status_5 = 2;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function not_6(MonthsHour $months_hour)
    {
        $months_hour->status_6 = 2;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function not_7(MonthsHour $months_hour)
    {
        $months_hour->status_7 = 2;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function not_8(MonthsHour $months_hour)
    {
        $months_hour->status_8 = 2;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function not_9(MonthsHour $months_hour)
    {
        $months_hour->status_9 = 2;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function not_10(MonthsHour $months_hour)
    {
        $months_hour->status_10 = 2;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function not_11(MonthsHour $months_hour)
    {
        $months_hour->status_11 = 2;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function not_12(MonthsHour $months_hour)
    {
        $months_hour->status_12 = 2;
        $months_hour->save();

        return view('m_h_update_rez', compact('months_hour'));
    }

    public function show_inf(MonthsHour $months_hour)
    {
        return view('m_h_inf', compact('months_hour'));
    }

}
