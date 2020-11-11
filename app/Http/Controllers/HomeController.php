<?php

namespace App\Http\Controllers;

use App\Appeal;
use App\Bid;
use App\Cluster;
use App\District;
use App\Program;
use App\RegionCluster;
use App\User;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    private const REGIONAL_COORD = 1;
    private const BASE_SCHOOL = 2;
    private const REGIONAL_CLUSTER = 100;
    private const REQUEST_BASE_SCHOOL = 5;

    private const MUN_COORD = 10;

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

        if ($user->status === self::REGIONAL_COORD) {
            // $clusters = Cluster::all();
            // $region_clusters = RegionCluster::all();
            // $request_base_schools = User::where('status', self::REQUEST_BASE_SCHOOL)->get();
            $bids = Bid::whereNull('cluster_id')
                ->WhereNull('rc_cluster_id')
                // ->where('status', '1')
                ->get();

            return view('clusters.index', ['bids' => $bids,]);

        // } elseif ($user->status === self::BASE_SCHOOL) {
        //     $district = District::where('id', $user->district)->first();
        //     $cluster = Cluster::where('user_id', $user->id)->first();
        //     $schools = json_decode($cluster->schools, true);
        //     $programs = Program::all();

        //     return view('base', ['user' => $user, 'cluster' => $cluster, 'district' => $district, 'programs' => $programs, 'schools' => $schools]);

        // } elseif ($user->status === self::REGIONAL_CLUSTER) {
        //     $region_clusters = RegionCluster::all();

        //     return view('region-cluster', ['user' => $user, 'region_clusters' => $region_clusters]);

        } elseif($user->status === self::MUN_COORD) {
            $bids = Bid::whereNull('cluster_id')
                ->WhereNull('rc_cluster_id')
                ->get();

            return view('mun-coord', ['user' => $user, 'bids' => $bids,]);

        } else {
            // $programs = Program::all();

            // $regional_cluster = RegionCluster::where('user_id', $user->id)->first();

            $bids_all = Bid::whereNull('cluster_id')
                ->WhereNull('rc_cluster_id')
                ->get();

            $students = Student::all();

            return view('school', ['user' => $user,
                                    // 'programs' => $programs,
                                    'bids_all' => $bids_all,
                                    'students' => $students]);

            // 'regional_cluster' => $regional_cluster,
        }
    }
}
