<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'inn', 'address', 'tel', 'email_real', 'website',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getDistrict()
    {
        return $this->belongsTo(District::class, 'district' );
    }

    public function bids()
    {
        if ($bids = Bid::where('user_id', $this->id)->WhereNull('rc_cluster_id')->get()) {
            return $bids;
        } else return false;

    }

    public function regionBids()
    {
        if ($bids = Bid::where('user_id', $this->id)->WhereNotNull('rc_cluster_id')->get()) {
            return $bids;
        } else return false;

    }

    public function cluster()
    {
        return $this->hasOne(Cluster::class);
    }

    public function getClusters()
    {
        $clusters = Cluster::all();
        foreach ($clusters as $cluster) {
            $schools = json_decode($cluster->schools, true);
            foreach ($schools as $value) {
                if ($value['school_id'] == $this->id) {
                    return $cluster->User->fullname;
                }
            }
        }
        return "Вы не состоите в муниципальных кластерах";
    }


    // public function sender() {
    //     return $this->belongsTo('Program', 'school_program_id');
    // }

    public function programs_send()
    {
        if ($programs = Program::where('school_program_id', $this->id)->get()) {
            return $programs;
        } else return false;

    }

    public function programs_1_send()
    {
        if ($programs = Program::where('school_program_id', $this->id)->where('status', 1)->get()) {
            return $programs;
        } else return false;

    }

    public function months_hours_send()
    {
        if ($months_hours = MonthsHour::where('school_schedule_id', $this->id)->get()) {
            return $months_hours;
        } else return false;

    }

    public function selected_months_hours_send()
    {
        if ($selected_months_hours = SelectedMonthsHour::where('school_selected_schedule_id', $this->id)->get()) {
            return $selected_months_hours;
        } else return false;

    }

    public function amount_of_bids()
    {
        $i = 0;
        if($this->bids() !== false){
            $i = $this->bids()->count();
        }
        return $i;
    }

    public function amount_of_programs_1()
    {
        $i = 0;
        if($this->programs_1_send() !== false){
            $i = $this->programs_1_send()->count();
        }
        return $i;
    }

    public function amount_of_months_hours()
    {
        $i = 0;
        if($this->months_hours_send() !== false){
            $i = $this->months_hours_send()->count();
        }
        return $i;
    }

    public function amount_estimated_per_1()
    {
        $i = 0;
        if($this->months_hours_send() !== false){
            foreach($this->months_hours_send() as $mh){
                if($mh->month_1 == '2021-01'){
                    $i += intval($mh->estimated_1);
                }
                elseif($mh->month_2 == '2021-01'){
                    $i += intval($mh->estimated_2);
                }
                elseif($mh->month_3 == '2021-01'){
                    $i += intval($mh->estimated_3);
                }
                elseif($mh->month_4 == '2021-01'){
                    $i += intval($mh->estimated_4);
                }
                elseif($mh->month_5 == '2021-01'){
                    $i += intval($mh->estimated_5);
                }
            }
        }
        return $i;
    }

    public function amount_estimated_per_2()
    {
        $i = 0;
        if($this->months_hours_send() !== false){
            foreach($this->months_hours_send() as $mh){
                if($mh->month_1 == '2021-02'){
                    $i += intval($mh->estimated_1);
                }
                elseif($mh->month_2 == '2021-02'){
                    $i += intval($mh->estimated_2);
                }
                elseif($mh->month_3 == '2021-02'){
                    $i += intval($mh->estimated_3);
                }
                elseif($mh->month_4 == '2021-02'){
                    $i += intval($mh->estimated_4);
                }
                elseif($mh->month_5 == '2021-02'){
                    $i += intval($mh->estimated_5);
                }
            }
        }
        return $i;
    }

    public function amount_estimated_per_3()
    {
        $i = 0;
        if($this->months_hours_send() !== false){
            foreach($this->months_hours_send() as $mh){
                if($mh->month_1 == '2021-03'){
                    $i += intval($mh->estimated_1);
                }
                elseif($mh->month_2 == '2021-03'){
                    $i += intval($mh->estimated_2);
                }
                elseif($mh->month_3 == '2021-03'){
                    $i += intval($mh->estimated_3);
                }
                elseif($mh->month_4 == '2021-03'){
                    $i += intval($mh->estimated_4);
                }
                elseif($mh->month_5 == '2021-03'){
                    $i += intval($mh->estimated_5);
                }
            }
        }
        return $i;
    }

    public function amount_estimated_per_4()
    {
        $i = 0;
        if($this->months_hours_send() !== false){
            foreach($this->months_hours_send() as $mh){
                if($mh->month_1 == '2021-04'){
                    $i += intval($mh->estimated_1);
                }
                elseif($mh->month_2 == '2021-04'){
                    $i += intval($mh->estimated_2);
                }
                elseif($mh->month_3 == '2021-04'){
                    $i += intval($mh->estimated_3);
                }
                elseif($mh->month_4 == '2021-04'){
                    $i += intval($mh->estimated_4);
                }
                elseif($mh->month_5 == '2021-04'){
                    $i += intval($mh->estimated_5);
                }
            }
        }
        return $i;
    }

    public function amount_estimated_per_5()
    {
        $i = 0;
        if($this->months_hours_send() !== false){
            foreach($this->months_hours_send() as $mh){
                if($mh->month_1 == '2021-05'){
                    $i += intval($mh->estimated_1);
                }
                elseif($mh->month_2 == '2021-05'){
                    $i += intval($mh->estimated_2);
                }
                elseif($mh->month_3 == '2021-05'){
                    $i += intval($mh->estimated_3);
                }
                elseif($mh->month_4 == '2021-05'){
                    $i += intval($mh->estimated_4);
                }
                elseif($mh->month_5 == '2021-05'){
                    $i += intval($mh->estimated_5);
                }
            }
        }
        return $i;
    }

    public function amount_real_per_1()
    {
        $i = 0;
        if($this->months_hours_send() !== false){
            foreach($this->months_hours_send() as $mh){
                if(($mh->month_1 == '2021-01') and ($mh->status_1 == 1)){
                    $i += intval($mh->real_1);
                }
                elseif(($mh->month_2 == '2021-01') and ($mh->status_2 == 1)){
                    $i += intval($mh->real_2);
                }
                elseif(($mh->month_3 == '2021-01') and ($mh->status_3 == 1)){
                    $i += intval($mh->real_3);
                }
                elseif(($mh->month_4 == '2021-01') and ($mh->status_4 == 1)){
                    $i += intval($mh->real_4);
                }
                elseif(($mh->month_5 == '2021-01') and ($mh->status_5 == 1)){
                    $i += intval($mh->real_5);
                }
            }
        }
        return $i;
    }

    public function amount_real_per_2()
    {
        $i = 0;
        if($this->months_hours_send() !== false){
            foreach($this->months_hours_send() as $mh){
                if(($mh->month_1 == '2021-02') and ($mh->status_1 == 1)){
                    $i += intval($mh->real_1);
                }
                elseif(($mh->month_2 == '2021-02') and ($mh->status_2 == 1)){
                    $i += intval($mh->real_2);
                }
                elseif(($mh->month_3 == '2021-02') and ($mh->status_3 == 1)){
                    $i += intval($mh->real_3);
                }
                elseif(($mh->month_4 == '2021-02') and ($mh->status_4 == 1)){
                    $i += intval($mh->real_4);
                }
                elseif(($mh->month_5 == '2021-02') and ($mh->status_5 == 1)){
                    $i += intval($mh->real_5);
                }
            }
        }
        return $i;
    }

    public function amount_real_per_3()
    {
        $i = 0;
        if($this->months_hours_send() !== false){
            foreach($this->months_hours_send() as $mh){
                if(($mh->month_1 == '2021-03') and ($mh->status_1 == 1)){
                    $i += intval($mh->real_1);
                }
                elseif(($mh->month_2 == '2021-03') and ($mh->status_2 == 1)){
                    $i += intval($mh->real_2);
                }
                elseif(($mh->month_3 == '2021-03') and ($mh->status_3 == 1)){
                    $i += intval($mh->real_3);
                }
                elseif(($mh->month_4 == '2021-03') and ($mh->status_4 == 1)){
                    $i += intval($mh->real_4);
                }
                elseif(($mh->month_5 == '2021-03') and ($mh->status_5 == 1)){
                    $i += intval($mh->real_5);
                }
            }
        }
        return $i;
    }

    public function amount_real_per_4()
    {
        $i = 0;
        if($this->months_hours_send() !== false){
            foreach($this->months_hours_send() as $mh){
                if(($mh->month_1 == '2021-04') and ($mh->status_1 == 1)){
                    $i += intval($mh->real_1);
                }
                elseif(($mh->month_2 == '2021-04') and ($mh->status_2 == 1)){
                    $i += intval($mh->real_2);
                }
                elseif(($mh->month_3 == '2021-04') and ($mh->status_3 == 1)){
                    $i += intval($mh->real_3);
                }
                elseif(($mh->month_4 == '2021-04') and ($mh->status_4 == 1)){
                    $i += intval($mh->real_4);
                }
                elseif(($mh->month_5 == '2021-04') and ($mh->status_5 == 1)){
                    $i += intval($mh->real_5);
                }
            }
        }
        return $i;
    }

    public function amount_real_per_5()
    {
        $i = 0;
        if($this->months_hours_send() !== false){
            foreach($this->months_hours_send() as $mh){
                if(($mh->month_1 == '2021-05') and ($mh->status_1 == 1)){
                    $i += intval($mh->real_1);
                }
                elseif(($mh->month_2 == '2021-05') and ($mh->status_2 == 1)){
                    $i += intval($mh->real_2);
                }
                elseif(($mh->month_3 == '2021-05') and ($mh->status_3 == 1)){
                    $i += intval($mh->real_3);
                }
                elseif(($mh->month_4 == '2021-05') and ($mh->status_4 == 1)){
                    $i += intval($mh->real_4);
                }
                elseif(($mh->month_5 == '2021-05') and ($mh->status_5 == 1)){
                    $i += intval($mh->real_5);
                }
            }
        }
        return $i;
    }

    public function proposed_programs()
    {
        if ($proposed_programs = Proposed::where('user_id', $this->id)->get()) {
            return $proposed_programs;
        } else return false;

    }

    public function selected_programs()
    {
        if ($selected_programs = SelectedProgram::where('school_id', $this->id)->get()) {
            return $selected_programs;
        } else return false;

    }


    public function amount_of_selected_programs()
    {
        $i = 0;
        if($this->selected_programs() !== false){
            $i = $this->selected_programs()->count();
        }
        return $i;
    }

    public function amount_of_proposed_programs()
    {
        $i = 0;
        if($this->proposed_programs() !== false){
            $i = $this->proposed_programs()->count();
        }
        return $i;
    }



    public function amount_of_selected_months_hours()
    {
        $i = 0;
        if($this->selected_months_hours_send() !== false){
            $i = $this->selected_months_hours_send()->count();
        }
        return $i;
    }

    public function amount_selected_estimated_per_1()
    {
        $i = 0;
        if($this->selected_months_hours_send() !== false){
            foreach($this->selected_months_hours_send() as $mh){
                if($mh->month_1 == '2021-01'){
                    $i += intval($mh->estimated_1);
                }
                elseif($mh->month_2 == '2021-01'){
                    $i += intval($mh->estimated_2);
                }
                elseif($mh->month_3 == '2021-01'){
                    $i += intval($mh->estimated_3);
                }
                elseif($mh->month_4 == '2021-01'){
                    $i += intval($mh->estimated_4);
                }
                elseif($mh->month_5 == '2021-01'){
                    $i += intval($mh->estimated_5);
                }
            }
        }
        return $i;
    }

    public function amount_selected_estimated_per_2()
    {
        $i = 0;
        if($this->selected_months_hours_send() !== false){
            foreach($this->selected_months_hours_send() as $mh){
                if($mh->month_1 == '2021-02'){
                    $i += intval($mh->estimated_1);
                }
                elseif($mh->month_2 == '2021-02'){
                    $i += intval($mh->estimated_2);
                }
                elseif($mh->month_3 == '2021-02'){
                    $i += intval($mh->estimated_3);
                }
                elseif($mh->month_4 == '2021-02'){
                    $i += intval($mh->estimated_4);
                }
                elseif($mh->month_5 == '2021-02'){
                    $i += intval($mh->estimated_5);
                }
            }
        }
        return $i;
    }

    public function amount_selected_estimated_per_3()
    {
        $i = 0;
        if($this->selected_months_hours_send() !== false){
            foreach($this->selected_months_hours_send() as $mh){
                if($mh->month_1 == '2021-03'){
                    $i += intval($mh->estimated_1);
                }
                elseif($mh->month_2 == '2021-03'){
                    $i += intval($mh->estimated_2);
                }
                elseif($mh->month_3 == '2021-03'){
                    $i += intval($mh->estimated_3);
                }
                elseif($mh->month_4 == '2021-03'){
                    $i += intval($mh->estimated_4);
                }
                elseif($mh->month_5 == '2021-03'){
                    $i += intval($mh->estimated_5);
                }
            }
        }
        return $i;
    }

    public function amount_selected_estimated_per_4()
    {
        $i = 0;
        if($this->selected_months_hours_send() !== false){
            foreach($this->selected_months_hours_send() as $mh){
                if($mh->month_1 == '2021-04'){
                    $i += intval($mh->estimated_1);
                }
                elseif($mh->month_2 == '2021-04'){
                    $i += intval($mh->estimated_2);
                }
                elseif($mh->month_3 == '2021-04'){
                    $i += intval($mh->estimated_3);
                }
                elseif($mh->month_4 == '2021-04'){
                    $i += intval($mh->estimated_4);
                }
                elseif($mh->month_5 == '2021-04'){
                    $i += intval($mh->estimated_5);
                }
            }
        }
        return $i;
    }

    public function amount_selected_estimated_per_5()
    {
        $i = 0;
        if($this->selected_months_hours_send() !== false){
            foreach($this->selected_months_hours_send() as $mh){
                if($mh->month_1 == '2021-05'){
                    $i += intval($mh->estimated_1);
                }
                elseif($mh->month_2 == '2021-05'){
                    $i += intval($mh->estimated_2);
                }
                elseif($mh->month_3 == '2021-05'){
                    $i += intval($mh->estimated_3);
                }
                elseif($mh->month_4 == '2021-05'){
                    $i += intval($mh->estimated_4);
                }
                elseif($mh->month_5 == '2021-05'){
                    $i += intval($mh->estimated_5);
                }
            }
        }
        return $i;
    }

    public function amount_selected_real_per_1()
    {
        $i = 0;
        if($this->selected_months_hours_send() !== false){
            foreach($this->selected_months_hours_send() as $mh){
                if(($mh->month_1 == '2021-01') and ($mh->status_1 == 1)){
                    $i += intval($mh->real_1);
                }
                elseif(($mh->month_2 == '2021-01') and ($mh->status_2 == 1)){
                    $i += intval($mh->real_2);
                }
                elseif(($mh->month_3 == '2021-01') and ($mh->status_3 == 1)){
                    $i += intval($mh->real_3);
                }
                elseif(($mh->month_4 == '2021-01') and ($mh->status_4 == 1)){
                    $i += intval($mh->real_4);
                }
                elseif(($mh->month_5 == '2021-01') and ($mh->status_5 == 1)){
                    $i += intval($mh->real_5);
                }
            }
        }
        return $i;
    }

    public function amount_selected_real_per_2()
    {
        $i = 0;
        if($this->selected_months_hours_send() !== false){
            foreach($this->selected_months_hours_send() as $mh){
                if(($mh->month_1 == '2021-02') and ($mh->status_1 == 1)){
                    $i += intval($mh->real_1);
                }
                elseif(($mh->month_2 == '2021-02') and ($mh->status_2 == 1)){
                    $i += intval($mh->real_2);
                }
                elseif(($mh->month_3 == '2021-02') and ($mh->status_3 == 1)){
                    $i += intval($mh->real_3);
                }
                elseif(($mh->month_4 == '2021-02') and ($mh->status_4 == 1)){
                    $i += intval($mh->real_4);
                }
                elseif(($mh->month_5 == '2021-02') and ($mh->status_5 == 1)){
                    $i += intval($mh->real_5);
                }
            }
        }
        return $i;
    }

    public function amount_selected_real_per_3()
    {
        $i = 0;
        if($this->selected_months_hours_send() !== false){
            foreach($this->selected_months_hours_send() as $mh){
                if(($mh->month_1 == '2021-03') and ($mh->status_1 == 1)){
                    $i += intval($mh->real_1);
                }
                elseif(($mh->month_2 == '2021-03') and ($mh->status_2 == 1)){
                    $i += intval($mh->real_2);
                }
                elseif(($mh->month_3 == '2021-03') and ($mh->status_3 == 1)){
                    $i += intval($mh->real_3);
                }
                elseif(($mh->month_4 == '2021-03') and ($mh->status_4 == 1)){
                    $i += intval($mh->real_4);
                }
                elseif(($mh->month_5 == '2021-03') and ($mh->status_5 == 1)){
                    $i += intval($mh->real_5);
                }
            }
        }
        return $i;
    }

    public function amount_selected_real_per_4()
    {
        $i = 0;
        if($this->selected_months_hours_send() !== false){
            foreach($this->selected_months_hours_send() as $mh){
                if(($mh->month_1 == '2021-04') and ($mh->status_1 == 1)){
                    $i += intval($mh->real_1);
                }
                elseif(($mh->month_2 == '2021-04') and ($mh->status_2 == 1)){
                    $i += intval($mh->real_2);
                }
                elseif(($mh->month_3 == '2021-04') and ($mh->status_3 == 1)){
                    $i += intval($mh->real_3);
                }
                elseif(($mh->month_4 == '2021-04') and ($mh->status_4 == 1)){
                    $i += intval($mh->real_4);
                }
                elseif(($mh->month_5 == '2021-04') and ($mh->status_5 == 1)){
                    $i += intval($mh->real_5);
                }
            }
        }
        return $i;
    }

    public function amount_selected_real_per_5()
    {
        $i = 0;
        if($this->selected_months_hours_send() !== false){
            foreach($this->selected_months_hours_send() as $mh){
                if(($mh->month_1 == '2021-05') and ($mh->status_1 == 1)){
                    $i += intval($mh->real_1);
                }
                elseif(($mh->month_2 == '2021-05') and ($mh->status_2 == 1)){
                    $i += intval($mh->real_2);
                }
                elseif(($mh->month_3 == '2021-05') and ($mh->status_3 == 1)){
                    $i += intval($mh->real_3);
                }
                elseif(($mh->month_4 == '2021-05') and ($mh->status_4 == 1)){
                    $i += intval($mh->real_4);
                }
                elseif(($mh->month_5 == '2021-05') and ($mh->status_5 == 1)){
                    $i += intval($mh->real_5);
                }
            }
        }
        return $i;
    }
}
