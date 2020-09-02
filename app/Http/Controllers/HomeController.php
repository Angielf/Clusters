<?php

namespace App\Http\Controllers;

use App\Appeal;
use App\Cluster;
use App\District;
use App\Program;
use App\RegionCluster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->status === 1) {
            $clusters = Cluster::all();
            return view('clusters.index', compact('clusters'));

        } elseif ($user->status === 2) {
            $districts = District::where('id', $user->district)->get();
            $cluster = Cluster::where('user_id', $user->id)->first();
            $programs = Program::all();

            return view('base', ['user' => $user, 'cluster' => $cluster, 'districts' => $districts, 'programs' => $programs]);

        } elseif ($user->status === 100) {
            $region_clusters = RegionCluster::all();

            return view('region-cluster', ['user' => $user, 'region_clusters' => $region_clusters]);

        } else {
            $programs = Program::all();

            $regional_cluster = RegionCluster::where('user_id', $user->id)->first();

            return view('school', ['user' => $user, 'programs' => $programs, 'regional_cluster' => $regional_cluster]);
        }
    }
}
