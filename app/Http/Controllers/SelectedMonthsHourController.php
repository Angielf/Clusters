<?php

namespace App\Http\Controllers;

use App\SelectedSchedule;
use App\User;
use App\SelectedMonthsHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SelectedMonthsHourController extends Controller
{
    public function index($id)
    {
        $selected_schedule = SelectedSchedule::where('id', $id)->first();

        return view('proposed.selected_months_hours', compact('selected_schedule'));
    }

    public function add(Request $request, $id)
    {

        $id_of_user = Auth::user()->id;
        $user_of_amount = User::where('id', $id_of_user)->first();
        $school_selected_schedule_id = $user_of_amount->id;

        $selected_months_hours = new SelectedMonthsHour([
            'selected_schedule_id' => $id,
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
            'school_selected_schedule_id' => $school_selected_schedule_id,
        ]);

        $selected_months_hours->save();

        return redirect('/')->with('success', 'месяц добавлен!');

    }

    public function delete(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->delete();

        return redirect('/');
    }

    public function show_update(SelectedMonthsHour $selected_months_hour)
    {
        return view('proposed.selected_m_h_update', compact('selected_months_hour'));
    }

    public function update_real_1(Request $request, SelectedMonthsHour $selected_months_hour)
    {
        $real_1 = $request->input('real_1');
        $selected_months_hour->update(['real_1' => $real_1]);
        $selected_months_hour->update(['status_1' => 9]);

        return view('proposed.selected_m_h_update', compact('selected_months_hour'));
    }

    public function update_real_2(Request $request, SelectedMonthsHour $selected_months_hour)
    {
        $real_2 = $request->input('real_2');
        $selected_months_hour->update(['real_2' => $real_2]);
        $selected_months_hour->update(['status_2' => 9]);

        return view('proposed.selected_m_h_update', compact('selected_months_hour'));
    }

    public function update_real_3(Request $request, SelectedMonthsHour $selected_months_hour)
    {
        $real_3 = $request->input('real_3');
        $selected_months_hour->update(['real_3' => $real_3]);
        $selected_months_hour->update(['status_3' => 9]);

        return view('proposed.selected_m_h_update', compact('selected_months_hour'));
    }

    public function update_real_4(Request $request, SelectedMonthsHour $selected_months_hour)
    {
        $real_4 = $request->input('real_4');
        $selected_months_hour->update(['real_4' => $real_4]);
        $selected_months_hour->update(['status_4' => 9]);

        return view('proposed.selected_m_h_update', compact('selected_months_hour'));
    }

    public function update_real_5(Request $request, SelectedMonthsHour $selected_months_hour)
    {
        $real_5 = $request->input('real_5');
        $selected_months_hour->update(['real_5' => $real_5]);
        $selected_months_hour->update(['status_5' => 9]);

        return view('proposed.selected_m_h_update', compact('selected_months_hour'));
    }

    public function update_real_6(Request $request, SelectedMonthsHour $selected_months_hour)
    {
        $real_6 = $request->input('real_6');
        $selected_months_hour->update(['real_6' => $real_6]);
        $selected_months_hour->update(['status_6' => 9]);

        return view('proposed.selected_m_h_update', compact('selected_months_hour'));
    }

    public function update_real_7(Request $request, SelectedMonthsHour $selected_months_hour)
    {
        $real_7 = $request->input('real_7');
        $selected_months_hour->update(['real_7' => $real_7]);
        $selected_months_hour->update(['status_7' => 9]);

        return view('proposed.selected_m_h_update', compact('selected_months_hour'));
    }

    public function update_real_8(Request $request, SelectedMonthsHour $selected_months_hour)
    {
        $real_8 = $request->input('real_8');
        $selected_months_hour->update(['real_8' => $real_8]);
        $selected_months_hour->update(['status_8' => 9]);

        return view('proposed.selected_m_h_update', compact('selected_months_hour'));
    }

    public function update_real_9(Request $request, SelectedMonthsHour $selected_months_hour)
    {
        $real_9 = $request->input('real_9');
        $selected_months_hour->update(['real_9' => $real_9]);
        $selected_months_hour->update(['status_9' => 9]);

        return view('proposed.selected_m_h_update', compact('selected_months_hour'));
    }

    public function update_real_10(Request $request, SelectedMonthsHour $selected_months_hour)
    {
        $real_10 = $request->input('real_10');
        $selected_months_hour->update(['real_10' => $real_10]);
        $selected_months_hour->update(['status_10' => 9]);

        return view('proposed.selected_m_h_update', compact('selected_months_hour'));
    }

    public function update_real_11(Request $request, SelectedMonthsHour $selected_months_hour)
    {
        $real_11 = $request->input('real_11');
        $selected_months_hour->update(['real_11' => $real_11]);
        $selected_months_hour->update(['status_11' => 9]);

        return view('proposed.selected_m_h_update', compact('selected_months_hour'));
    }

    public function update_real_12(Request $request, SelectedMonthsHour $selected_months_hour)
    {
        $real_12 = $request->input('real_12');
        $selected_months_hour->update(['real_12' => $real_12]);
        $selected_months_hour->update(['status_12' => 9]);

        return view('proposed.selected_m_h_update', compact('selected_months_hour'));
    }

    public function show_update_rez(SelectedMonthsHour $selected_months_hour)
    {
        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function show_hours()
    {
        $selected_months_hours = SelectedMonthsHour::all();
        return view('proposed.selected_months_hours_list_reg', compact('selected_months_hours'));
    }

    public function approve_1(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_1 = 1;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function approve_2(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_2 = 1;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function approve_3(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_3 = 1;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function approve_4(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_4 = 1;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function approve_5(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_5 = 1;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function approve_6(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_6 = 1;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function approve_7(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_7 = 1;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function approve_8(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_8 = 1;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function approve_9(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_9 = 1;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function approve_10(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_10 = 1;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function approve_11(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_11 = 1;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function approve_12(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_12 = 1;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function not_1(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_1 = 2;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function not_2(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_2 = 2;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function not_3(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_3 = 2;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function not_4(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_4 = 2;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function not_5(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_5 = 2;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function not_6(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_6 = 2;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function not_7(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_7 = 2;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function not_8(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_8 = 2;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function not_9(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_9 = 2;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function not_10(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_10 = 2;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function not_11(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_11 = 2;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function not_12(SelectedMonthsHour $selected_months_hour)
    {
        $selected_months_hour->status_12 = 2;
        $selected_months_hour->save();

        return view('proposed.selected_m_h_update_rez', compact('selected_months_hour'));
    }

    public function show_inf(SelectedMonthsHour $selected_months_hour)
    {
        return view('proposed.selected_m_h_inf', compact('selected_months_hour'));
    }

}
